<?php

namespace App\Livewire\Admin\User;

use App\Models\Staff;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.app')]
#[Title('Edit User')]
class Edit extends Component
{
    public $staffId;
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $user_type = 'cashier';
    public $is_active = true;

    public function mount($id)
    {
        $this->staffId = $id;
        $staff = Staff::with('user')->findOrFail($id);
        
        $this->name = $staff->name;
        $this->email = $staff->user->email;
        $this->user_type = $staff->user->user_type;
        $this->is_active = $staff->is_active;
    }

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . Staff::find($this->staffId)->user_id,
            'password' => 'nullable|string|min:8|confirmed',
            'user_type' => 'required|in:admin,cashier',
            'is_active' => 'boolean',
        ];
    }

    protected $messages = [
        'name.required' => 'The name field is required.',
        'email.required' => 'The email field is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email is already registered.',
        'password.min' => 'The password must be at least 8 characters.',
        'password.confirmed' => 'The password confirmation does not match.',
        'user_type.required' => 'Please select a user role.',
    ];

    public function update()
    {
        $this->validate();

        $staff = Staff::with('user')->findOrFail($this->staffId);

        // Update user
        $userData = [
            'email' => $this->email,
            'user_type' => $this->user_type,
        ];

        // Only update password if provided
        if ($this->password) {
            $userData['password'] = Hash::make($this->password);
        }

        $staff->user->update($userData);

        // Update staff
        $staff->update([
            'name' => $this->name,
            'is_active' => $this->is_active,
        ]);

        session()->flash('message', 'User updated successfully.');

        return redirect()->route('user.index');
    }

    public function render()
    {
        return view('livewire.admin.user.edit');
    }
}