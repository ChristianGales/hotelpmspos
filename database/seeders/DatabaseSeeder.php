<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
{
    User::create([
        'email' => 'test1@example.com',
        'user_type' => 'admin',
        'password' => Hash::make('password'),
        'email_verified_at' => null, 
    ]);
}
}