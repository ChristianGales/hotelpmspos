<x-layouts.app>

<x-common.page-breadcrumb pageTitle="User Management" />
        
<div x-data="{
    transactions: [
        {
            id: 1,
            name: 'Bought PYPL',
            image: '/images/brand/brand-08.svg',
            date: 'Nov 23, 01:00 PM',
            price: '$2,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 2,
            name: 'Bought AAPL',
            image: '/images/brand/brand-07.svg',
            date: 'Nov 23, 01:00 PM',
            price: '$2,567.88',
            category: 'Finance',
            status: 'Pending',
        },
        {
            id: 3,
            name: 'Sell KKST',
            image: '/images/brand/brand-15.svg',
            date: 'Nov 23, 01:00 PM',
            price: '$2,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 4,
            name: 'Bought FB',
            image: '/images/brand/brand-02.svg',
            date: 'Nov 23, 01:00 PM',
            price: '$2,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 5,
            name: 'Sell AMZN',
            image: '/images/brand/brand-10.svg',
            date: 'Nov 23, 01:00 PM',
            price: '$2,567.88',
            category: 'Finance',
            status: 'Failed',
        },
        {
            id: 6,
            name: 'Bought MSFT',
            image: '/images/brand/brand-09.svg',
            date: 'Nov 22, 01:00 PM',
            price: '$1,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 7,
            name: 'Bought GOOG',
            image: '/images/brand/brand-01.svg',
            date: 'Nov 22, 01:00 PM',
            price: '$3,567.88',
            category: 'Finance',
            status: 'Pending',
        },
        {
            id: 8,
            name: 'Sell TSLA',
            image: '/images/brand/brand-12.svg',
            date: 'Nov 22, 01:00 PM',
            price: '$4,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 9,
            name: 'Bought NVDA',
            image: '/images/brand/brand-11.svg',
            date: 'Nov 22, 01:00 PM',
            price: '$5,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 10,
            name: 'Sell META',
            image: '/images/brand/brand-03.svg',
            date: 'Nov 22, 01:00 PM',
            price: '$6,567.88',
            category: 'Finance',
            status: 'Failed',
        },
        {
            id: 11,
            name: 'Bought DIS',
            image: '/images/brand/brand-04.svg',
            date: 'Nov 21, 01:00 PM',
            price: '$7,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 12,
            name: 'Bought NFLX',
            image: '/images/brand/brand-05.svg',
            date: 'Nov 21, 01:00 PM',
            price: '$8,567.88',
            category: 'Finance',
            status: 'Pending',
        },
        {
            id: 13,
            name: 'Sell CRM',
            image: '/images/brand/brand-06.svg',
            date: 'Nov 21, 01:00 PM',
            price: '$9,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 14,
            name: 'Bought TSLA',
            image: '/images/brand/brand-13.svg',
            date: 'Nov 21, 01:00 PM',
            price: '$10,567.88',
            category: 'Finance',
            status: 'Success',
        },
        {
            id: 15,
            name: 'Sell AAPL',
            image: '/images/brand/brand-14.svg',
            date: 'Nov 21, 01:00 PM',
            price: '$11,567.88',
            category: 'Finance',
            status: 'Failed',
        },
    ],
    itemsPerPage: 5,
    currentPage: 1,
    dropdownOpen: null,
    get totalPages() {
        return Math.ceil(this.transactions.length / this.itemsPerPage);
    },
    get paginatedTransactions() {
        const start = (this.currentPage - 1) * this.itemsPerPage;
        const end = start + this.itemsPerPage;
        return this.transactions.slice(start, end);
    },
    get displayedPages() {
        const range = [];
        for (let i = 1; i <= this.totalPages; i++) {
            if (
                i === 1 ||
                i === this.totalPages ||
                (i >= this.currentPage - 1 && i <= this.currentPage + 1)
            ) {
                range.push(i);
            } else if (range[range.length - 1] !== '...') {
                range.push('...');
            }
        }
        return range;
    },
    prevPage() {
        if (this.currentPage > 1) {
            this.currentPage--;
        }
    },
    nextPage() {
        if (this.currentPage < this.totalPages) {
            this.currentPage++;
        }
    },
    goToPage(page) {
        if (typeof page === 'number' && page >= 1 && page <= this.totalPages) {
            this.currentPage = page;
        }
    },
    getStatusClass(status) {
        const classes = {
            'Success': 'bg-green-50 text-green-600 dark:bg-green-500/15 dark:text-green-500',
            'Pending': 'bg-yellow-50 text-yellow-600 dark:bg-yellow-500/15 dark:text-orange-400',
            'Failed': 'bg-red-50 text-red-600 dark:bg-red-500/15 dark:text-red-500',
        };
        return classes[status] || '';
    },
    toggleDropdown(id) {
        this.dropdownOpen = this.dropdownOpen === id ? null : id;
    }
}">

    {{-- Search Bar and Filters --}}
    <div class="rounded-2xl border border-gray-200 bg-white p-5 mb-5 dark:border-gray-800 dark:bg-white/[0.03] lg:p-6">

        <div class="flex flex-col gap-4 lg:flex-row lg:items-center lg:justify-between">

            <!-- Search Bar -->
            <div class="w-full lg:w-[300px]">
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 20 20" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.5 3a5.5 5.5 0 015.5 5.5c0 1.4-.52 2.68-1.38 3.67l3.35 3.35a1 1 0 01-1.41 1.41l-3.35-3.35A5.5 5.5 0 118.5 3z" />
                        </svg>
                    </span>

                    <input type="text" placeholder="Search..."
                        class="h-[42px] w-full rounded-lg border border-gray-300 bg-transparent py-2.5 pl-10 pr-4 text-sm text-gray-800 shadow-theme-xs placeholder:text-gray-400 focus:border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500/10 dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 dark:placeholder:text-white/30 dark:focus:border-blue-800">
                </div>
            </div>

            <!-- Filters -->
            <div class="flex flex-col gap-3 sm:flex-row lg:items-center">

                <!-- Role Filter -->
                <select
                    class="h-[42px] rounded-lg border border-gray-300 bg-white px-4 text-sm text-gray-700 shadow-theme-xs dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500/10 dark:focus:border-blue-800">
                    <option value="">All Roles</option>
                    <option value="admin">Admin</option>
                    <option value="staff">Staff</option>
                    <option value="user">User</option>
                </select>

                <!-- Date Filter -->
                <input type="date"
                    class="h-[42px] rounded-lg border border-gray-300 bg-white px-4 text-sm text-gray-700 shadow-theme-xs dark:border-gray-700 dark:bg-gray-900 dark:text-white/90 focus:border-blue-300 focus:outline-none focus:ring-2 focus:ring-blue-500/10 dark:focus:border-blue-800">
            </div>
        </div>

    </div>


    <div class="rounded-2xl border border-gray-200 bg-white pt-4 dark:border-gray-800 dark:bg-white/[0.03]">
    
        <!-- Header -->
        <div class="flex flex-col gap-2 px-5 mb-4 sm:flex-row sm:items-center sm:justify-between sm:px-6">
            <div>
                <h3 class="text-lg font-semibold text-gray-800 dark:text-white/90">Users</h3>
            </div>

            <div class="flex flex-col gap-3 sm:flex-row sm:items-center">
                <button type="button"
                    class="flex items-center gap-2 px-4 h-[42px] rounded-lg bg-blue-600 text-white text-sm font-medium hover:bg-blue-700 dark:bg-blue-700 dark:hover:bg-blue-800 shadow-theme-xs">

                    <!-- Plus Icon -->
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 4v16m8-8H4" />
                    </svg>

                    Create User
                </button>
            </div>
        </div>


        <!-- Table -->
        <div class="overflow-hidden">
            <div class="max-w-full px-5 overflow-x-auto">
                <table class="min-w-full">
                    <thead>
                        <tr class="border-gray-200 border-y dark:border-gray-700">
                            <th scope="col" class="px-4 py-3 font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">Name</th>
                            <th scope="col" class="px-4 py-3 font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">Date</th>
                            <th scope="col" class="px-4 py-3 font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">Price</th>
                            <th scope="col" class="px-4 py-3 text-xs font-medium tracking-wider text-left text-gray-500 capitalize">Category</th>
                            <th scope="col" class="px-4 py-3 font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">Status</th>
                            <th scope="col" class="px-4 py-3 font-normal text-gray-500 text-start text-theme-sm dark:text-gray-400">Action</th>
                            
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        <template x-for="transaction in paginatedTransactions" :key="transaction.id">
                            <tr>
                                <td class="py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="shrink-0 w-8 h-8">
                                            <img class="w-8 h-8 rounded-full" :src="transaction.image" alt="">
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white" x-text="transaction.name"></div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500 dark:text-gray-400" x-text="transaction.date"></div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500 dark:text-gray-400" x-text="transaction.price"></div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500 dark:text-gray-400" x-text="transaction.category"></div>
                                </td>
                                <td class="px-4 py-4 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full" :class="getStatusClass(transaction.status)" x-text="transaction.status"></span>
                                </td>

                                <td class="px-4 sm:px-6 py-3.5">
                                    <button @click="deleteRow(row.id)">
                                        <svg class="text-gray-700 cursor-pointer size-5 hover:text-blue-500 dark:text-gray-400 dark:hover:text-blue-500"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5M18.5 2.5a2.121 2.121 0 013 3L12 15l-4 1 1-4 9.5-9.5z" />
                                        </svg>
                                    </button>

                                    <button @click="deleteRow(row.id)">
                                        <svg class="text-gray-700 cursor-pointer size-5 hover:text-red-500 dark:text-gray-400 dark:hover:text-red-500" 
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>

                                </td>

                                
                            </tr>
                        </template>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        <div class="px-6 py-4 border-t border-gray-200 dark:border-white/[0.05]">
            <div class="flex items-center justify-between">
                <button @click="prevPage" :disabled="currentPage === 1" :class="currentPage === 1 ? 'opacity-50 cursor-not-allowed' : ''" class="flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-3 py-3 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:px-3.5">
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M2.58301 9.99868C2.58272 10.1909 2.65588 10.3833 2.80249 10.53L7.79915 15.5301C8.09194 15.8231 8.56682 15.8233 8.85981 15.5305C9.15281 15.2377 9.15297 14.7629 8.86018 14.4699L5.14009 10.7472L16.6675 10.7472C17.0817 10.7472 17.4175 10.4114 17.4175 9.99715C17.4175 9.58294 17.0817 9.24715 16.6675 9.24715L5.14554 9.24715L8.86017 5.53016C9.15297 5.23717 9.15282 4.7623 8.85983 4.4695C8.56684 4.1767 8.09197 4.17685 7.79917 4.46984L2.84167 9.43049C2.68321 9.568 2.58301 9.77087 2.58301 9.99715C2.58301 9.99766 2.58301 9.99817 2.58301 9.99868Z" fill="currentColor"/>
                    </svg>
                    <span class="hidden sm:inline">Previous</span>
                </button>

                <span class="block text-sm font-medium text-gray-700 dark:text-gray-400 sm:hidden">
                    Page <span x-text="currentPage"></span> of <span x-text="totalPages"></span>
                </span>

                <ul class="hidden items-center gap-0.5 sm:flex">
                    <template x-for="page in displayedPages" :key="page">
                        <li>
                            <button x-show="page !== '...'" @click="goToPage(page)" :class="currentPage === page ? 'bg-blue-500 text-white' : 'text-gray-700 hover:bg-blue-500/[0.08] hover:text-blue-500 dark:text-gray-400 dark:hover:text-blue-500'" class="flex h-10 w-10 items-center justify-center rounded-lg text-theme-sm font-medium" x-text="page"></button>
                            <span x-show="page === '...'" class="flex h-10 w-10 items-center justify-center text-gray-500">...</span>
                        </li>
                    </template>
                </ul>

                <button @click="nextPage" :disabled="currentPage === totalPages" :class="currentPage === totalPages ? 'opacity-50 cursor-not-allowed' : ''" class="flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-3 py-3 text-theme-sm font-medium text-gray-700 shadow-theme-xs hover:bg-gray-50 hover:text-gray-800 dark:border-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-white/[0.03] dark:hover:text-gray-200 sm:px-3.5">
                    <span class="hidden sm:inline">Next</span>
                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M17.4175 9.9986C17.4178 10.1909 17.3446 10.3832 17.198 10.53L12.2013 15.5301C11.9085 15.8231 11.4337 15.8233 11.1407 15.5305C10.8477 15.2377 10.8475 14.7629 11.1403 14.4699L14.8604 10.7472L3.33301 10.7472C2.91879 10.7472 2.58301 10.4114 2.58301 9.99715C2.58301 9.58294 2.91879 9.24715 3.33301 9.24715L14.8549 9.24715L11.1403 5.53016C10.8475 5.23717 10.8477 4.7623 11.1407 4.4695C11.4336 4.1767 11.9085 4.17685 12.2013 4.46984L17.1588 9.43049C17.3173 9.568 17.4175 9.77087 17.4175 9.99715C17.4175 9.99763 17.4175 9.99812 17.4175 9.9986Z" fill="currentColor"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>

</x-layouts.app>