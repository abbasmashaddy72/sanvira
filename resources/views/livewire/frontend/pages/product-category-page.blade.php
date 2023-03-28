<div>
    <section class="relative table w-full py-32 lg:py-20">
        <div class="container">
            <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px] mt-8">
                @forelse ($sub_product_category as $item)
                    <div class="lg:col-span-4 md:col-span-6">
                        <div
                            class="flex items-center p-3 transition-all duration-500 ease-in-out bg-white rounded-md shadow-md hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                            <div
                                class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full mr-3">
                                <img class="w-5 h-5 rotate-45" src="{{ asset($item->image) }}" />
                            </div>
                            <a href="{{ route('products_category', ['product_category' => $item->id]) }}" class="flex-1">
                                <h4 class="mb-0 text-lg font-medium">{{ $item->name }}</h4>
                            </a>
                        </div>
                    </div>
                @empty
                    <p class="col-span-12 text-lg font-bold text-center">No Sub Categories Available</p>
                @endforelse
            </div>
        </div>
    </section>

    <section class="relative py-16 lg:pt-0 lg:py-24">
        <div class="container">
            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-[30px]">
                @foreach ($category_based_products as $item)
                    <div
                        class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                        <div class="relative">
                            <img class="h-32" src="{{ asset($item->image) }}" alt="">
                        </div>

                        <div class="p-6">
                            <div class="pb-6">
                                <a href="{{ route('products_details', ['data' => $item->id]) }}"
                                    class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">{{ $item->name }}</a>
                            </div>

                            <ul
                                class="grid items-center grid-cols-1 gap-2 py-6 list-none border-gray-100 border-y dark:border-gray-800">
                                <li class="flex items-center mr-4">
                                    <span class="font-semibold">{{ __('Min Max Order Quantity:') }}</span>
                                    <span class="ml-2">{{ $item->min_max_oq }}</span>
                                </li>

                                <li class="flex items-center mr-4">
                                    <span class="font-semibold">{{ __('Estimate Delivery Time in Days:') }}</span>
                                    <span class="ml-2">{{ $item->edt }}</span>
                                </li>

                                <li class="flex items-center mr-4">
                                    <span class="font-semibold">{{ __('Brand Name:') }}</span>
                                    <span class="ml-2">{{ $item->brand }}</span>
                                </li>

                                <li class="flex items-center mr-4">
                                    <span class="font-semibold">{{ __('Manufacturer Name:') }}</span>
                                    <span class="ml-2">{{ $item->manufacturer }}</span>
                                </li>

                                <li class="flex items-center mr-4">
                                    <span class="font-semibold">{{ __('Model Name:') }}</span>
                                    <span class="ml-2">{{ $item->model }}</span>
                                </li>
                            </ul>

                            <ul class="flex items-center justify-between pt-6 list-none">
                                <li>
                                    <button class="text-lg font-medium">
                                        Add to RFQ
                                    </button>
                                </li>

                                <li>
                                    <button class="text-lg font-medium">
                                        Add to Cart
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach

            </div>

            <div class="mt-8">
                {{ $category_based_products->links() }}
            </div>

        </div>
    </section>
</div>
