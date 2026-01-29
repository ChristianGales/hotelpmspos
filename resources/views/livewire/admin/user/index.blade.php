<div>
    <x-common.page-breadcrumb pageTitle="Staff Page" />

    <div class="mt-5">
        {{-- Search and Filter Section --}}
        <div class="rounded-2xl border border-gray-200 bg-white p-5 mb-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">
            <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">
                <div class="w-full lg:w-[300px]">
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 3a5.5 5.5 0 015.5 5.5c0 1.4-.52 2.68-1.38 3.67l3.35 3.35a1 1 0 01-1.41 1.41l-3.35-3.35A5.5 5.5 0 118.5 3z" />
                            </svg>
                        </span>

                        <input 
                            wire:model.live.debounce.300ms="searchQuery" 
                            type="text" 
                            placeholder="Search by name or email..." 
                            class="h-[42px] w-full rounded-lg border border-gray-300 bg-white py-2.5 pl-10 pr-4 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                    </div>
                </div>

                <div class="flex flex-col gap-3 sm:flex-row lg:items-center">
                    {{-- Role Filter --}}
                    <select 
                        wire:model.live="roleFilter" 
                        class="h-[42px] rounded-lg border border-gray-300 bg-white px-4 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90">
                        <option value="">All Staff Roles</option>
                        <option value="admin">Admin</option>
                        <option value="cashier">Cashier</option>
                    </select>

                    {{-- Clear Filters Button --}}
                    @if($searchQuery || $roleFilter)
                        <button 
                            wire:click="clearFilters" 
                            class="h-[42px] px-4 rounded-lg border border-gray-300 bg-white text-sm text-gray-700 hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:hover:bg-gray-800">
                            Clear Filters
                        </button>
                    @endif
                </div>
            </div>

            {{-- Results Count --}}
            {{-- <div class="mt-3 text-sm text-gray-500">
                Showing {{ $users->count() }} of {{ $users->total() }} staff members
            </div> --}}
        </div>

        {{-- Table Section --}}
        <div class="rounded-2xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">
            <div class="flex flex-col gap-2 px-5 mb-4 sm:flex-row sm:items-center sm:justify-between sm:px-6">
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Users</h3>
                <button wire:click="openCreateModal" class="flex items-center justify-center gap-2 px-4 h-[42px] rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 shadow-theme-xs">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Create Staff
                </button>
            </div>

            <div class="overflow-hidden">
                <div class="max-w-full px-5 overflow-x-auto">
                    @if($users->count() > 0)
                        <table class="min-w-full">
                            <thead>
                                <tr class="border-gray-200 border-y dark:border-gray-700">
                                    <th class="px-4 py-3 text-start text-sm font-normal text-gray-500">Name</th>
                                    <th class="px-4 py-3 text-start text-sm font-normal text-gray-500">Email</th>
                                    <th class="px-4 py-3 text-start text-sm font-normal text-gray-500">Role</th>
                                    <th class="px-4 py-3 text-start text-sm font-normal text-gray-500">Status</th>
                                    <th class="px-4 py-3 text-start text-sm font-normal text-gray-500">Created At</th>
                                    <th class="px-4 py-3 text-start text-sm font-normal text-gray-500">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($users as $staff) 
                                    <tr wire:key="staff-{{ $staff->id }}">
                                        <td class="px-4 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="shrink-0 w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                                                    <span class="text-sm font-medium text-blue-600 dark:text-blue-400">
                                                        {{ strtoupper(substr($staff->name ?? 'NA', 0, 2)) }}
                                                    </span>
                                                </div>
                                                <div class="ml-4 text-sm font-medium text-gray-900 dark:text-white">
                                                    {{ $staff->name ?? 'No Name' }}
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-400">
                                            {{ $staff->user->email ?? 'No Email' }}
                                        </td>
                                        <td class="px-4 py-4">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full 
                                                {{ ($staff->user->user_type ?? '') === 'admin' ? 'bg-indigo-100 text-indigo-800 dark:bg-indigo-900/30 dark:text-indigo-400' : '' }}
                                                {{ ($staff->user->user_type ?? '') === 'cashier' ? 'bg-emerald-100 text-emerald-800 dark:bg-emerald-900/30 dark:text-emerald-400' : '' }}
                                                {{ !in_array($staff->user->user_type ?? '', ['admin', 'cashier']) ? 'bg-gray-100 text-gray-800 dark:bg-gray-800 dark:text-gray-400' : '' }}">
                                                {{ ucfirst($staff->user->user_type ?? 'N/A') }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-4">
                                            <span class="px-2 py-1 text-xs font-semibold rounded-full {{ $staff->is_active ? 'bg-green-100 text-green-800 dark:bg-green-900/30 dark:text-green-400' : 'bg-red-100 text-red-800 dark:bg-red-900/30 dark:text-red-400' }}">
                                                {{ $staff->is_active ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-4 text-sm text-gray-500 dark:text-gray-400">
                                            {{ $staff->created_at->format('M d, Y') }}
                                        </td>
                                        <td class="px-4 py-4">
                                            <div class="flex items-center gap-2">
                                                <button wire:click="editModal({{ $staff->user_id }})" class="text-gray-700 hover:text-blue-500 dark:text-gray-400 dark:hover:text-blue-400">
                                                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                                    </svg>
                                                </button>

                                                <button wire:click="deleteModal({{ $staff->user_id }})" class="text-gray-700 hover:text-red-500 dark:text-gray-400 dark:hover:text-red-400">
                                                    <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="py-12 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">No staff members found</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                @if($searchQuery || $roleFilter)
                                    Try adjusting your search or filter criteria.
                                @else
                                    Get started by creating a new staff member.
                                @endif
                            </p>
                        </div>
                    @endif
                </div>
            </div>

            @if($users->count() > 0)
                <div class="px-6 py-4 border-t border-gray-200 dark:border-white/[0.05]">
                    {{ $users->links() }}
                </div>
            @endif
        </div>
    </div>
    
    {{-- Include your modal logic here inside the root div --}}
</div>