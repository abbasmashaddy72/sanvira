<a href="{{ route('products_category', ['product_category' => $item->id]) }}"
    class="flex items-center p-3 bg-white border-2 border-gray-200 rounded-md shadow-md dark:bg-slate-900 dark:shadow-gray-800 hover:border-blue-600 hover:border-2">
    <img class="w-16 h-16 rounded-lg" src="{{ asset('storage/' . $item->image) }}" />
    <div class="flex-1 ml-2">
        <h4 class="text-lg font-medium line-clamp-1">{{ $item->name }}
        </h4>
        <span class="text-sm font-medium text-gray-600 transition-all duration-500 ease-in-out">
            {{ $item->products_count }} Products
        </span>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
        class="text-blue-600" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
        class="feather feather-arrow-right">
        <line x1="5" y1="12" x2="19" y2="12"></line>
        <polyline points="12 5 19 12 12 19"></polyline>
    </svg>
</a>
