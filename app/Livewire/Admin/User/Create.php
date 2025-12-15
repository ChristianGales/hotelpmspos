<?php

namespace App\Livewire\Admin\User;

use App\Models\User;
use App\Models\Staff;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('layouts.app')]
#[Title('Create User')]
class Create extends Component
{
    public $name = '';
    public $email = '';
    public $password = '';
    public $password_confirmation = '';
    public $user_type = 'cashier';
    public $is_active = true;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|string|min:8|confirmed',
        'user_type' => 'required|in:admin,cashier',
        'is_active' => 'boolean',
    ];

    protected $messages = [
        'name.required' => 'The name field is required.',
        'email.required' => 'The email field is required.',
        'email.email' => 'Please enter a valid email address.',
        'email.unique' => 'This email is already registered.',
        'password.required' => 'The password field is required.',
        'password.min' => 'The password must be at least 8 characters.',
        'password.confirmed' => 'The password confirmation does not match.',
        'user_type.required' => 'Please select a user role.',
    ];

    public function save()
    {
        $this->validate();

        // Create user
        $user = User::create([
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'user_type' => $this->user_type,
        ]);

        // Create staff
        Staff::create([
            'user_id' => $user->id,
            'name' => $this->name,
            'is_active' => $this->is_active,
        ]);

        session()->flash('message', 'User created successfully.');

        return redirect()->route('user.index');
    }

    public function render()
    {
        return view('livewire.admin.user.create');
    }
}