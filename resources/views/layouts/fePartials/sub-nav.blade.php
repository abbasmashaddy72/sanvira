<div class="dark-mode:text-gray-200 dark-mode:bg-gray-800 w-full bg-white text-gray-700">
    <div x-data="{ open: false }" class="container mx-auto flex flex-col md:flex-row md:items-center md:justify-between">
        <div class="p-1">
            <div @click.away="open = false" class="relative" x-data="{ open: false }">
                <button @click="open = !open"
                    class="dark-mode:bg-transparent dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:focus:bg-gray-600 dark-mode:hover:bg-gray-600 focus:shadow-outline mt-2 flex w-full flex-row items-center rounded-lg bg-transparent px-4 py-2 text-left text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0 md:inline md:w-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
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
                    class="absolute z-20 mt-2 w-full origin-top-right rounded-md shadow-lg md:w-48">
                    <div class="dark-mode:bg-gray-800 rounded-md bg-white px-2 py-2 shadow">
                        <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                            href="#">
                            Link #1
                        </a>
                        <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                            href="#">
                            Link #2
                        </a>
                        <a class="dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 focus:shadow-outline mt-2 block rounded-lg bg-transparent px-4 py-2 text-sm font-semibold hover:bg-gray-200 hover:text-gray-900 focus:bg-gray-200 focus:text-gray-900 focus:outline-none md:mt-0"
                            href="#">
                            Link #3
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <nav :class="{ 'flex': open, 'hidden': !open }"
            class="hidden flex-grow flex-col pb-4 md:flex md:flex-row md:justify-start md:pb-0">
            <a class="{{ Route::currentRouteNamed('all_products_category') ? 'text-blue-600' : '' }} px-4 py-2 text-sm font-semibold hover:text-blue-600"
                href="{{ route('all_products_category') }}">
                {{ __('View All Categories') }}
            </a>
            <a class="{{ Route::currentRouteNamed('all_supplier_profile') ? 'text-blue-600' : '' }} px-4 py-2 text-sm font-semibold hover:text-blue-600"
                href="{{ route('all_supplier_profile') }}">
                {{ __('View All Suppliers') }}
            </a>
            <a class="{{ Route::currentRouteNamed('all_products') ? 'text-blue-600' : '' }} px-4 py-2 text-sm font-semibold hover:text-blue-600"
                href="{{ route('all_products') }}">
                {{ __('View All Products') }}
            </a>
            <a class="{{ Route::currentRouteNamed('all_brands') ? 'text-blue-600' : '' }} px-4 py-2 text-sm font-semibold hover:text-blue-600"
                href="{{ route('all_brands') }}">
                {{ __('View All Brands') }}
            </a>
        </nav>
    </div>
</div>
