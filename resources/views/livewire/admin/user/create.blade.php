@extends('layouts.app')

@section('content')
<div>
    <x-common.page-breadcrumb pageTitle="Create User" />

    <div class="rounded-2xl border border-gray-200 bg-white p-6 dark:border-gray-800 dark:bg-white/[0.03]">
        <div class="mb-6">
            <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">User Information</h3>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Fill in the details to create a new user</p>
        </div>

        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="grid gap-6 md:grid-cols-2">
                <!-- Name -->
                <div>
                    <label for="name" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Name <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                        class="h-[42px] w-full rounded-lg border border-gray-300 bg-transparent px-4 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-blue-800"
                        placeholder="Enter full name">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label for="email" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Email <span class="text-red-500">*</span>
                    </label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="h-[42px] w-full rounded-lg border border-gray-300 bg-transparent px-4 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-blue-800"
                        placeholder="Enter email address">
                    @error('email')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password" id="password" name="password"
                        class="h-[42px] w-full rounded-lg border border-gray-300 bg-transparent px-4 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-blue-800"
                        placeholder="Enter password">
                    @error('password')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Confirmation -->
                <div>
                    <label for="password_confirmation" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Confirm Password <span class="text-red-500">*</span>
                    </label>
                    <input type="password" id="password_confirmation" name="password_confirmation"
                        class="h-[42px] w-full rounded-lg border border-gray-300 bg-transparent px-4 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-blue-800"
                        placeholder="Confirm password">
                </div>

                <!-- User Type -->
                <div>
                    <label for="user_type" class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Role <span class="text-red-500">*</span>
                    </label>
                    <select id="user_type" name="user_type"
                        class="h-[42px] w-full rounded-lg border border-gray-300 bg-white px-4 text-sm text-gray-700 shadow-theme-xs dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500/10 dark:focus:border-blue-800">
                        <option value="admin" {{ old('user_type') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="cashier" {{ old('user_type', 'cashier') == 'cashier' ? 'selected' : '' }}>Cashier</option>
                    </select>
                    @error('user_type')
                        <p class="mt-1 text-sm text-red-600 dark:text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status -->
                <div>
                    <label class="mb-2 block text-sm font-medium text-gray-700 dark:text-gray-300">
                        Status
                    </label>
                    <div class="flex items-center h-[42px]">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }} class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                            <span class="ms-3 text-sm font-medium text-gray-700 dark:text-gray-300">Active</span>
                        </label>
                    </div>
                </div>
            </div>

            <div class="mt-8 flex items-center gap-3">
                <button type="submit"
                    class="flex items-center justify-center gap-2 px-6 h-[42px] rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800 shadow-theme-xs">
                    Create User
                </button>
                <a href="{{ route('user.index') }}"
                    class="flex items-center justify-center gap-2 px-6 h-[42px] rounded-lg border border-gray-300 text-gray-700 text-sm font-medium hover:bg-gray-50 dark:border-gray-700 dark:text-gray-300 dark:hover:bg-gray-800 shadow-theme-xs">
                    Cancel
                </a>
            </div>
        </form>
    </div>
</div>
@endsection