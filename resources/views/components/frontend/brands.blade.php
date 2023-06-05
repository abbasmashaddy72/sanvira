<a href="{{ route('brand_products', ['brand' => $item->id]) }}"
    class="group relative block overflow-hidden rounded-md border-2 border-gray-200 bg-white shadow hover:border-2 hover:border-blue-600 dark:bg-slate-900 dark:shadow-gray-800">
    <div class="block bg-white p-4 text-left dark:bg-slate-900">
        <img src="{{ asset('storage/' . $item->image) }}"
            class="mx-auto mb-3 h-32 w-full rounded-lg object-cover shadow-md" alt="{{ $item->name }}">
        <span
            class="line-clamp-1 text-xl font-medium transition-all duration-500 ease-in-out group-hover:text-blue-600">{{ $item->name }}
        </span>
        <div class="flex justify-between text-blue-600">
            <div class="text-sm font-medium text-gray-600 transition-all duration-500 ease-in-out">
                {{ $item->products_count }} Products
            </div>
            <div class="flex items-center text-sm font-medium transition-all duration-500 ease-in-out">
                View
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" width="24" height="24"
                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </div>
        </div>
    </div>
</a>
