<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;


class AuthController extends Controller
{
    // Show sign in form
    public function showSignInForm()
    {
        return view('livewire.admin.auth.signin');
    }

    // Handle sign in
    public function signIn(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Show sign up form
    public function showSignUpForm()
    {
        return view('livewire.admin.auth.signup');
    }

    // Handle sign up
    public function signUp(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', Password::min(8)],
        ]);

        // Create user 
        $user = User::create([
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'user_type' => 'admin', // or 'guest' default change to 'admin'
        ]);

        // Create staff record 
        Staff::create([
            'user_id' => $user->id,
            'name' => $validated['name'],
            'is_active' => true,
        ]);

        //  Log in user
        Auth::login($user);

        //redirect to dashboard
        return redirect()->route('dashboard');
    }

    // Handle logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('home');
    }
}