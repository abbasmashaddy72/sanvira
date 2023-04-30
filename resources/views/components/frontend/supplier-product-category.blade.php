<div
    class="flex items-center p-3 transition-all duration-500 ease-in-out bg-white rounded-md shadow-md hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
    <img class="w-16 h-16 rounded-lg" src="{{ asset('storage/' . $item->image) }}" />
    <a href="{{ route('products_category', ['product_category' => $item->id]) }}" class="flex-1">
        <h4 class="mb-0 ml-2 text-lg font-medium">{{ $item->name }}<span
                class="ml-2 text-indigo-600">{{ '(' . $item->products_count . ')' }}</span>
        </h4>
    </a>
</div>