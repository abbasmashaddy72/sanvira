<div>
    @if ($type == 'Category Page' || $type == 'All Category Page')
        @if (count($sub_product_category) != 0)
            <x-frontend.index-container>
                <div class="grid grid-cols-5 gap-[30px] mt-8">
                    @foreach ($sub_product_category as $item)
                        <x-frontend.supplier-product-category :item="$item" />
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
                        <div class="flex justify-between m-2">
                            <button wire:click="clearFilters"
                                class="px-2 py-2 font-bold text-white bg-red-500 rounded-lg hover:bg-red-700">Clear</button>
                            <button wire:click="apply"
                                class="px-2 py-2 font-bold text-white bg-blue-500 rounded-lg hover:bg-blue-700">Apply</button>
                        </div>
                        <h5
                            class="p-2 text-lg font-semibold text-center rounded-md shadow bg-gray-50 dark:bg-slate-800 dark:shadow-gray-800">
                            Brand Name</h5>
                        <div class="m-8">
                            <x-select label="Select Brand" wire:model.defer="brand_id" placeholder="Select Brand"
                                :async-data="route('api.admin.brands')" option-label="name" option-value="id" multiselect />
                        </div>
                        <h5
                            class="p-2 text-lg font-semibold text-center rounded-md shadow bg-gray-50 dark:bg-slate-800 dark:shadow-gray-800">
                            Manufacturer Name</h5>
                        <div class="m-8">
                            <x-select label="Select Manufacturer" wire:model.defer="manufacturer_id"
                                placeholder="Select Manufacturer" :async-data="route('api.admin.manufacturers')" option-label="name"
                                option-value="id" multiselect />
                        </div>
                        <h5
                            class="p-2 text-lg font-semibold text-center rounded-md shadow bg-gray-50 dark:bg-slate-800 dark:shadow-gray-800">
                            Category Name</h5>
                        <div class="m-8">
                            <x-select label="Select Parent Category" wire:model.defer="supplier_product_category_id"
                                placeholder="Select Parent Category" :async-data="route('api.admin.supplier_categories')" option-label="name"
                                option-value="id" multiselect />
                        </div>
                        <h5
                            class="p-2 text-lg font-semibold text-center rounded-md shadow bg-gray-50 dark:bg-slate-800 dark:shadow-gray-800">
                            Min Max Order Quantity</h5>
                        <div class="flex justify-between m-8 space-x-5">
                            <x-input label="Minimum" placeholder="Min." type='number' wire:model.defer='min_oq' />
                            <x-input label="Maximum" placeholder="Max." type='number' wire:model.defer='max_oq' />
                        </div>
                        <h5
                            class="p-2 text-lg font-semibold text-center rounded-md shadow bg-gray-50 dark:bg-slate-800 dark:shadow-gray-800">
                            Min Max Price</h5>
                        <div class="flex justify-between m-8 space-x-5">
                            <x-input label="Minimum" placeholder="Min." type='number' wire:model.defer='min_price' />
                            <x-input label="Maximum" placeholder="Max." type='number' wire:model.defer='max_price' />
                        </div>
                        <h5
                            class="p-2 text-lg font-semibold text-center rounded-md shadow bg-gray-50 dark:bg-slate-800 dark:shadow-gray-800">
                            Estimate Delivery Time in Days</h5>
                        <div class="flex justify-between m-8 space-x-5">
                            <x-input label="Minimum" placeholder="Min." type='number' wire:model.defer='min_edt' />
                            <x-input label="Maximum" placeholder="Max." type='number' wire:model.defer='max_edt' />
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-9 md:col-span-6">
                    <section class="relative py-16 lg:pt-0 lg:py-24">
                        <div class="container">
                            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                                @foreach ($supplier_products as $item)
                                    <x-frontend.supplier-product :item="$item" :rfqProducts="$rfqProducts"
                                        :cartProducts="$cartProducts" />
                                @endforeach
                            </div>
                            @if ($supplier_products != [])
                                <div class="mt-8">
                                    {{ $supplier_products->links() }}
                                </div>
                            @endif
                        </div>
                    </section>
                </div>
        </x-frontend.index-container>
    @endif
</div>
