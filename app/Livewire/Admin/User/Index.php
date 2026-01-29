<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use App\Models\Staff;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;


class Index extends Component
{
    use WithPagination;

    public $searchQuery = '';
    public $roleFilter = '';

    protected $queryString = [
        'searchQuery' => ['except' => '', 'as' => 'search'],
        'roleFilter'  => ['except' => '', 'as' => 'role'],
    ];

    // ✅ Livewire v3 lifecycle hooks
    public function updatedSearchQuery()
    {
        $this->resetPage();
    }

    public function updatedRoleFilter()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->reset(['searchQuery', 'roleFilter']);
        $this->resetPage();
    }

    public function render()
    {
        $users = Staff::query()
            ->with('user')
            ->whereHas('user', function ($q) {
                $q->whereIn('user_type', ['admin', 'cashier']);

                if ($this->roleFilter) {
                    $q->where('user_type', $this->roleFilter);
                }
            })
            ->when($this->searchQuery, function ($q) {
                $search = $this->searchQuery;

                $q->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                      ->orWhereHas('user', function ($uq) use ($search) {
                          $uq->where('email', 'like', "%{$search}%");
                      });
                });
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.user.index', compact('users'));
    }
}
