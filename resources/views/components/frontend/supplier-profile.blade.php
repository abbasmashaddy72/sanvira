<a href="{{ route('supplier_profile', ['profile' => $item->id]) }}"
    {{ $attributes->merge(['class' => 'relative block overflow-hidden bg-white border-2 border-gray-200 rounded-md shadow group dark:bg-slate-900 dark:shadow-gray-800 hover:border-blue-600 hover:border-2']) }}>
    <div class="block p-4 text-left bg-white dark:bg-slate-900">
        <img src="{{ asset('storage/' . $item->logo) }}"
            class="object-cover w-full h-32 mx-auto mb-3 rounded-lg shadow-md" alt="{{ $item->company_name }}">
        <span
            class="text-xl font-medium transition-all duration-500 ease-in-out group-hover:text-indigo-600 line-clamp-1">{{ $item->company_name }}
        </span>
        <div class="flex justify-between text-blue-600">
            <div class="text-sm font-medium text-gray-600 transition-all duration-500 ease-in-out">
                {{ $item->products_count }} Products
            </div>
            <div class="flex items-center text-sm font-medium transition-all duration-500 ease-in-out">
                View
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" width="24" height="24" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round">
                    <line x1="5" y1="12" x2="19" y2="12"></line>
                    <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
            </div>
        </div>
    </div>
</a>
