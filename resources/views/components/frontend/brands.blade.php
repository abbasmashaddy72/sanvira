<a href="{{ route('brand_products', ['slug' => $item->slug]) }}"
    class="relative block overflow-hidden bg-white border-2 border-gray-200 rounded-md shadow group hover:border-2 hover:border-blue-600 dark:bg-slate-900 dark:shadow-gray-800">
    <div class="block p-4 text-left bg-white dark:bg-slate-900">
        <img src="{{ asset('storage/' . $item->image) }}"
            onerror="this.onerror=null; this.src='https://placehold.co/1280x554';"
            class="object-cover w-full h-32 mx-auto mb-3 rounded-lg shadow-md" alt="{{ $item->name }}">
        <span data-tooltip-target="{{ strtolower(str_replace(' ', '_', $item->name)) }}"
            class="text-xl font-medium transition-all duration-500 ease-in-out line-clamp-1 group-hover:text-blue-600">{{ $item->name }}
        </span>
        <div id="{{ strtolower(str_replace(' ', '_', $item->name)) }}" role="tooltip"
            class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
            {{ $item->name }}
            <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
        <div class="flex justify-between text-blue-600">
            <div class="text-sm font-medium text-gray-600 transition-all duration-500 ease-in-out">
                {{ $item->products_count }} {{ __(' Products') }}
            </div>
            <div class="flex items-center text-sm font-medium transition-all duration-500 ease-in-out">
                {{ __('View') }}
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </div>
        </div>
    </div>
</a>
