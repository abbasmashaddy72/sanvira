<div>
    <x-frontend.index-container containerTitle="Categories List">
        <div class="grid grid-cols-5 gap-[30px] mt-8">
            @foreach ($categoriesList as $item)
                <div
                    class="flex items-center p-3 transition-all duration-500 ease-in-out bg-white rounded-md shadow-md hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                    <div
                        class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full mr-3">
                        <img class="w-5 h-5 rotate-45" src="{{ asset('storage/' . $item->image) }}" />
                    </div>
                    <a href="{{ route('products_category', ['product_category' => $item->id]) }}" class="flex-1">
                        <h4 class="mb-0 text-lg font-medium">{{ $item->name }}<span
                                class="ml-2 text-indigo-600">{{ '(' . $item->products_count . ')' }}</span>
                        </h4>
                    </a>
                </div>
            @endforeach
        </div>
    </x-frontend.index-container>
    <x-frontend.index-container containerTitle="Supplier Products List">
        <div class="grid grid-cols-5 gap-[30px] mt-8">
            @foreach ($supplierProductsList as $item)
                <div
                    class="flex items-center p-3 transition-all duration-500 ease-in-out bg-white rounded-md shadow-md hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                    <div
                        class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full mr-3">
                        <img class="w-5 h-5 rotate-45" src="{{ asset('storage/' . $item->image) }}" />
                    </div>
                    <a href="{{ route('products_category', ['product_category' => $item->id]) }}" class="flex-1">
                        <h4 class="mb-0 text-lg font-medium">{{ $item->name }}<span
                                class="ml-2 text-indigo-600">{{ '(' . $item->products_count . ')' }}</span>
                        </h4>
                    </a>
                </div>
            @endforeach
        </div>
    </x-frontend.index-container>
    <x-frontend.index-container containerTitle="Supplier List">
        <div class="grid grid-cols-5 gap-[30px] mt-8">
            @foreach ($supplierList as $item)
                <div
                    class="flex items-center p-3 transition-all duration-500 ease-in-out bg-white rounded-md shadow-md hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                    <div
                        class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full mr-3">
                        <img class="w-5 h-5 rotate-45" src="{{ asset('storage/' . $item->image) }}" />
                    </div>
                    <a href="{{ route('products_category', ['product_category' => $item->id]) }}" class="flex-1">
                        <h4 class="mb-0 text-lg font-medium">{{ $item->name }}<span
                                class="ml-2 text-indigo-600">{{ '(' . $item->products_count . ')' }}</span>
                        </h4>
                    </a>
                </div>
            @endforeach
        </div>
    </x-frontend.index-container>
    <x-frontend.index-container containerTitle="Brand List">
        <div class="grid grid-cols-5 gap-[30px] mt-8">
            @foreach ($brandList as $item)
                <div
                    class="flex items-center p-3 transition-all duration-500 ease-in-out bg-white rounded-md shadow-md hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                    <div
                        class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full mr-3">
                        <img class="w-5 h-5 rotate-45" src="{{ asset('storage/' . $item->image) }}" />
                    </div>
                    <a href="{{ route('products_category', ['product_category' => $item->id]) }}" class="flex-1">
                        <h4 class="mb-0 text-lg font-medium">{{ $item->name }}<span
                                class="ml-2 text-indigo-600">{{ '(' . $item->products_count . ')' }}</span>
                        </h4>
                    </a>
                </div>
            @endforeach
        </div>
    </x-frontend.index-container>
</div>
