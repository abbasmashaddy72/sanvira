<div>
    @if ($type == 'Category Page' || $type == 'All Category Page')
        @if (count($sub_product_category) != 0)
            <x-frontend.index-container>
                <div class="grid grid-cols-5 gap-[30px] mt-8">
                    @foreach ($sub_product_category as $item)
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
        @endif
    @endif

    @if ($type != 'All Category Page')
        <x-frontend.index-container containerTitle="{{ $page_title }}"
            containerSlot="{{ $supplier_products->total() }} Products">

            <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                <div class="lg:col-span-3 md:col-span-6">
                    <div class="sticky mt-8 top-20">
                        <h5
                            class="p-2 text-lg font-semibold text-center rounded-md shadow bg-gray-50 dark:bg-slate-800 dark:shadow-gray-800">
                            Min Max Order Quantity</h5>
                        <div class="flex justify-between m-8 space-x-5">
                            <x-input label="Minimum" placeholder="Min." type='number' wire:model='min_oq' />
                            <x-input label="Maximum" placeholder="Max." type='number' wire:model='max_oq' />
                        </div>
                        <h5
                            class="p-2 text-lg font-semibold text-center rounded-md shadow bg-gray-50 dark:bg-slate-800 dark:shadow-gray-800">
                            Estimate Delivery Time in Days</h5>
                        <div class="flex justify-between m-8 space-x-5">
                            <x-input label="Minimum" placeholder="Min." type='number' wire:model='min_edt' />
                            <x-input label="Maximum" placeholder="Max." type='number' wire:model='max_edt' />
                        </div>
                        <h5
                            class="p-2 text-lg font-semibold text-center rounded-md shadow bg-gray-50 dark:bg-slate-800 dark:shadow-gray-800">
                            Brand Name</h5>
                        <div class="m-8">
                            @foreach ($brand_name as $data)
                                <x-checkbox id="{{ str_replace(' ', '_', $data) }}" label="{{ $data }}"
                                    wire:model="brand.{{ str_replace(' ', '_', $data) }}" />
                            @endforeach
                        </div>
                        <h5
                            class="p-2 text-lg font-semibold text-center rounded-md shadow bg-gray-50 dark:bg-slate-800 dark:shadow-gray-800">
                            Manufacturer Name</h5>
                        <div class="m-8">
                            @foreach ($manufacturer_name as $data)
                                <x-checkbox id="{{ str_replace(' ', '_', $data) }}" label="{{ $data }}"
                                    wire:model="manufacturer.{{ str_replace(' ', '_', $data) }}" />
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-9 md:col-span-6">
                    <section class="relative py-16 lg:pt-0 lg:py-24">
                        @if ($type == 'Profile Page')
                            <div class="grid lg:grid-cols-2 mt-4 md:grid-cols-2 grid-cols-1 gap-[30px]">
                            @else
                                <div class="container">
                                    <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                        @endif
                        @foreach ($supplier_products as $item)
                            <x-backend.supplier-product :item="$item" :rfqProducts="$rfqProducts" :cartProducts="$cartProducts" />
                        @endforeach
                        @if ($type == 'Profile Page')
                </div>
            @else
            </div>
            @if ($supplier_products != [])
                <div class="mt-8">
                    {{ $supplier_products->links() }}
                </div>
            @endif
</div>
@endif
</div>
</x-frontend.index-container>
</div>
</div>
<!--end grid-->
</div>
<!--end container-->
</section>
@endif
</div>
