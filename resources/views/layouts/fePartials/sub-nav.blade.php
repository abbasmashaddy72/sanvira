<div class="w-full text-gray-700 bg-white dark-mode:text-gray-200 dark-mode:bg-gray-800">
    <div x-data="{ open: false }"
        class="flex flex-col mx-auto max-w-screen-2xl md:items-center md:justify-between md:flex-row">
        <div class="p-1">
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 md:w-auto md:inline md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-align-left">
                        <line x1="17" y1="10" x2="3" y2="10"></line>
                        <line x1="21" y1="6" x2="3" y2="6"></line>
                        <line x1="21" y1="14" x2="3" y2="14"></line>
                        <line x1="17" y1="18" x2="3" y2="18"></line>
                    </svg>
                </button>
                <div x-show="open" x-transition:enter="transition ease-out duration-100"
                    x-transition:enter-start="transform opacity-0 scale-95"
                    x-transition:enter-end="transform opacity-100 scale-100"
                    x-transition:leave="transition ease-in duration-75"
                    x-transition:leave-start="transform opacity-100 scale-100"
                    x-transition:leave-end="transform opacity-0 scale-95"
                    class="absolute z-20 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
                    <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="#">
                            Link #1
                        </a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="#">
                            Link #2
                        </a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="#">
                            Link #3
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <nav :class="{ 'flex': open, 'hidden': !open }"
            class="flex-col flex-grow hidden pb-4 md:pb-0 md:flex md:justify-start md:flex-row">
            <a class="px-4 py-2 text-sm font-semibold hover:text-blue-600 {{ Route::currentRouteNamed('all_products_category') ? 'text-blue-600' : '' }}"
                href="{{ route('all_products_category') }}">
                View All Categories
            </a>
            <a class="px-4 py-2 text-sm font-semibold hover:text-blue-600 {{ Route::currentRouteNamed('all_supplier_profile') ? 'text-blue-600' : '' }}"
                href="{{ route('all_supplier_profile') }}">
                View All Suppliers
            </a>
            <a class="px-4 py-2 text-sm font-semibold hover:text-blue-600 {{ Route::currentRouteNamed('all_products') ? 'text-blue-600' : '' }}"
                href="{{ route('all_products') }}">
                View All Products
            </a>
            <a class="px-4 py-2 text-sm font-semibold hover:text-blue-600 {{ Route::currentRouteNamed('all_brands') ? 'text-blue-600' : '' }}"
                href="{{ route('all_brands') }}">
                View All Brands
            </a>
        </nav>
    </div>
</div>
