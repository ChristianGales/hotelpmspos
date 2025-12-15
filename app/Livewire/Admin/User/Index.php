<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;

class Index extends Component
{
    use WithPagination;

    // Search & Filter
    public $searchQuery = '';
    public $roleFilter = '';

    // Modal State
    public $showModal = false;
    public $showDeleteModal = false;
    public $modalMode = 'create'; // 'create' or 'edit'

    // Form Data
    public $userId;
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $user_type = 'cashier';
    public $is_active = true;

    protected $queryString = ['searchQuery', 'roleFilter'];

    protected function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'user_type' => 'required|in:admin,cashier',
            'is_active' => 'boolean',
        ];

        if ($this->modalMode === 'create') {
            $rules['email'] = 'required|email|unique:users,email';
            $rules['password'] = 'required|min:8|confirmed';
        } else {
            $rules['email'] = 'required|email|unique:users,email,' . $this->userId;
            $rules['password'] = 'nullable|min:8|confirmed';
        }

        return $rules;
    }

    public function render()
    {
        $users = User::with('staff')
            ->when($this->searchQuery, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->searchQuery . '%')
                      ->orWhere('email', 'like', '%' . $this->searchQuery . '%');
                });
            })
            ->when($this->roleFilter, function ($query) {
                $query->where('user_type', $this->roleFilter);
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.user.index', [
            'users' => $users
        ]);
    }

    public function openCreateModal()
    {
        $this->resetForm();
        $this->modalMode = 'create';
        $this->showModal = true;
    }

    public function openEditModal($userId)
    {
        $this->resetForm();
        $user = User::with('staff')->findOrFail($userId);
        
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->user_type = $user->user_type;
        $this->is_active = $user->staff ? $user->staff->is_active : true;
        
        $this->modalMode = 'edit';
        $this->showModal = true;
    }

    public function save()
    {
        $this->validate();

        if ($this->modalMode === 'create') {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
                'user_type' => $this->user_type,
            ]);

            Staff::create([
                'user_id' => $user->id,
                'name' => $this->name,
                'is_active' => $this->is_active,
            ]);

            session()->flash('message', 'User created successfully.');
        } else {
            $user = User::findOrFail($this->userId);
            
            $userData = [
                'name' => $this->name,
                'email' => $this->email,
                'user_type' => $this->user_type,
            ];

            if ($this->password) {
                $userData['password'] = Hash::make($this->password);
            }

            $user->update($userData);

            if ($user->staff) {
                $user->staff->update([
                    'name' => $this->name,
                    'is_active' => $this->is_active,
                ]);
            } else {
                Staff::create([
                    'user_id' => $user->id,
                    'name' => $this->name,
                    'is_active' => $this->is_active,
                ]);
            }

            session()->flash('message', 'User updated successfully.');
        }

        $this->closeModal();
    }

    public function confirmDelete($userId)
    {
        $this->userId = $userId;
        $this->showDeleteModal = true;
    }

    public function deleteUser()
    {
        $user = User::findOrFail($this->userId);
        
        // Delete related staff record
        if ($user->staff) {
            $user->staff->delete();
        }
        
        $user->delete();

        session()->flash('message', 'User deleted successfully.');
        $this->showDeleteModal = false;
        $this->userId = null;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->showDeleteModal = false;
        $this->resetForm();
        $this->resetValidation();
    }

    private function resetForm()
    {
        $this->userId = null;
        $this->name = '';
        $this->email = '';
        $this->password = '';
        $this->password_confirmation = '';
        $this->user_type = 'cashier';
        $this->is_active = true;
    }

    public function updatingSearchQuery()
    {
        $this->resetPage();
    }

    public function updatingRoleFilter()
    {
        $this->resetPage();
    }
}