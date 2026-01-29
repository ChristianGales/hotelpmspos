<?php

use App\Livewire\Admin\User\Index;
use App\Livewire\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\PasswordResetController;
// indicate what to use controller or livewire class
use App\Livewire\Admin\User\Index as UserIndex;

// Landing page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication Routes Admin
Route::get('/signin', [AuthController::class, 'showSignInForm'])->name('signin');
Route::post('/signin', [AuthController::class, 'signIn'])->name('signin.post');
    
Route::get('/signup', [AuthController::class, 'showSignUpForm'])->name('signup');
Route::post('/signup', [AuthController::class, 'signUp'])->name('signup.post');

Route::get('/forgot-password', [PasswordResetController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [PasswordResetController::class, 'sendResetLinkEmail'])->name('password.email');
    
Route::get('/reset-password/{token}', [PasswordResetController::class, 'showResetPasswordForm'])->name('password.reset');
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('password.update');


// Protected routes (Admin)
// change to admin when middleware is ready
// bootstrap/app.php
// ->withMiddleware(function (Middleware $middleware) {
//     $middleware->alias([
//         'admin' => \App\Http\Middleware\AdminMiddleware::class,
//     ]);
// })
// Route::middleware('auth')->group(function () {
//     Route::get('/dashboard', function () {
//         return view('livewire.admin.dashboard');
//     })->name('dashboard');

//     // //user index route
//     // Route::get('/user', function () {
//     //     return view('livewire.admin.user.index');
//     // })->name('user');

//     Route::middleware('auth')->group(function () {
//     Route::get('/user', UserIndex::class)->name('user.index'); 
//     });


    

//     // Route::get('/user', Index::class)->name('user.index');
//     // Route::resource('user', StaffController::class)->names('staff');
//     // pages.livewire.admin.user.index
    
//     Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
// });


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', fn() => view('livewire.admin.dashboard'))->name('dashboard');
    Route::get('/user', UserIndex::class)->name('user.index'); 
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});