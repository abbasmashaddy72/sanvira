<a href="{{ route('products_category', ['product_category' => $item->id]) }}"
    class="flex items-center rounded-md border-2 border-gray-200 bg-white p-3 shadow-md hover:border-2 hover:border-blue-600 dark:bg-slate-900 dark:shadow-gray-800">
    <img class="h-16 w-16 rounded-lg" src="{{ asset('storage/' . $item->image) }}" />
    <div class="ml-2 flex-1">
        <h4 class="line-clamp-1 text-lg font-medium">{{ $item->name }}
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
