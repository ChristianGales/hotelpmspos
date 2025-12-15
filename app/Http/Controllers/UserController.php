<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'user_type' => 'required|in:admin,cashier',
            'is_active' => 'boolean',
        ]);

        // Create user
        $user = User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'user_type' => $validated['user_type'],
        ]);

        // Create staff
        Staff::create([
            'user_id' => $user->id,
            'name' => $validated['name'],
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('user.index')->with('message', 'User created successfully.');
    }

    public function edit($id)
    {
        $staff = Staff::with('user')->findOrFail($id);
        return view('admin.user.edit', compact('staff'));
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::with('user')->findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $staff->user_id,
            'password' => 'nullable|string|min:8|confirmed',
            'user_type' => 'required|in:admin,cashier',
            'is_active' => 'boolean',
        ]);

        // Update user
        $userData = [
            'email' => $validated['email'],
            'user_type' => $validated['user_type'],
        ];

        if ($request->filled('password')) {
            $userData['password'] = Hash::make($validated['password']);
        }

        $staff->user->update($userData);

        // Update staff
        $staff->update([
            'name' => $validated['name'],
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('user.index')->with('message', 'User updated successfully.');
    }
}