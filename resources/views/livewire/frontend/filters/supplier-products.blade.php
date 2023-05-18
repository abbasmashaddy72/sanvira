<div>
    @if ($type == 'Category Page' || $type == 'All Category Page')
        @if (count($sub_product_category) != 0 || $this->type == 'All Category Page')
            <x-frontend.index-container class="py-14">
                @if ($type == 'All Category Page')
                    <div class="flex items-center justify-center w-full p-1 mb-4 space-x-4 bg-white rounded">
                        @foreach (range('A', 'Z') as $item)
                            @php
                                $disabled = !in_array($item, $availableLetters);
                            @endphp
                            <button wire:click='applyAlp("{{ $item }}")' {{ $disabled ? 'disabled' : '' }}
                                class="py-2 px-4 font-medium rounded @if ($alphabet == $item) text-blue-600 bg-gray-200 @elseif(!in_array($item, $availableLetters)) text-gray-400 @else  text-gray-600 hover:bg-gray-200 hover:text-blue-600 @endif">{{ $item }}</button>
                        @endforeach
                    </div>

                    <div wire:loading wire:target="applyAlp">
                        <div class="flex justify-center">
                            <svg aria-hidden="true"
                                class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                                viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                                    fill="currentColor" />
                                <path
                                    d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                                    fill="currentFill" />
                            </svg>
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                @endif

                <div class="grid grid-cols-5 gap-[30px]">
                    @foreach ($sub_product_category as $item)
                        <x-frontend.supplier-product-category :item="$item" />
                    @endforeach
                </div>
            </x-frontend.index-container>
        @endif
    @endif

    @if ($type != 'All Category Page')
        <x-frontend.index-container class="{{ $type != 'Profile Page' ? 'py-14' : '' }}"
            containerTitle="{{ $page_title }}" containerSlot="{{ $supplier_products->total() }} Products">

            <x-slot name='containerSlotData'>
                <div class="flex space-x-2">
                    <button wire:click="applyButton('onSale')" {{ $setButton == 'onSale' ? 'disabled' : '' }}
                        class="px-2 py-2 font-medium hover:text-blue-600 bg-white rounded-lg border-2 hover:border-2 hover:border-blue-600 @if ($setButton == 'highToLow') border-blue-600 text-blue-600
                        @else border-gray-200 text-gray-700 @endif">On
                        Sale</button>
                    <button wire:click="applyButton('relevance')" {{ $setButton == 'relevance' ? 'disabled' : '' }}
                        class="px-2 py-2 font-medium hover:text-blue-600 bg-white rounded-lg border-2 hover:border-2 hover:border-blue-600 @if ($setButton == 'relevance') border-blue-600 text-blue-600
                        @else border-gray-200 text-gray-700 @endif">Relevance</button>
                    <button wire:click="applyButton('lowToHigh')" {{ $setButton == 'lowToHigh' ? 'disabled' : '' }}
                        class="px-2 py-2 font-medium hover:text-blue-600 bg-white rounded-lg border-2 hover:border-2 hover:border-blue-600 @if ($setButton == 'lowToHigh') border-blue-600 text-blue-600
                        @else border-gray-200 text-gray-700 @endif">Price:
                        Low to High</button>
                    <button wire:click="applyButton('highToLow')" {{ $setButton == 'highToLow' ? 'disabled' : '' }}
                        class="px-2 py-2 font-medium hover:text-blue-600 bg-white rounded-lg border-2 hover:border-2 hover:border-blue-600 @if ($setButton == 'highToLow') border-blue-600 text-blue-600
                        @else border-gray-200 text-gray-700 @endif">Price:
                        High to Low</button>
                </div>
            </x-slot>

            <div wire:loading wire:target="applyButton">
                <div class="flex justify-center">
                    <svg aria-hidden="true"
                        class="w-8 h-8 mr-2 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600"
                        viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                            fill="currentColor" />
                        <path
                            d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                            fill="currentFill" />
                    </svg>
                    <span class="sr-only">Loading...</span>
                </div>
            </div>

            <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                <div class="lg:col-span-3 md:col-span-6">
                    <div class="sticky p-4 mt-8 bg-white border-2 border-gray-200 rounded-md shadow top-20">
                        <div class="flex justify-between">
                            <button wire:click="clearFilters"
                                class="px-2 py-2 font-bold text-white bg-red-600 rounded-lg hover:bg-red-700">Clear</button>
                            <button wire:click="apply"
                                class="px-2 py-2 font-bold text-white bg-blue-600 rounded-lg hover:bg-blue-700">Apply</button>
                        </div>
                        <div class="mt-4">
                            <h5 class="font-semibold text-left text-md dark:bg-slate-800 dark:shadow-gray-800">
                                Brand Name</h5>
                            <x-select wire:model.defer="brand_id" placeholder="Select Brand" :async-data="route('api.admin.brands')"
                                option-label="name" option-value="id" multiselect />
                        </div>
                        <div class="mt-4">
                            <h5 class="font-semibold text-left text-md dark:bg-slate-800 dark:shadow-gray-800">
                                Manufacturer Name</h5>
                            <x-select wire:model.defer="manufacturer_id" placeholder="Select Manufacturer"
                                :async-data="route('api.admin.manufacturers')" option-label="name" option-value="id" multiselect />
                        </div>
                        <div class="mt-4">
                            <h5 class="font-semibold text-left text-md dark:bg-slate-800 dark:shadow-gray-800">
                                Category Name</h5>
                            <x-select wire:model.defer="supplier_product_category_id"
                                placeholder="Select Parent Category" :async-data="route('api.admin.supplier_categories')" option-label="name"
                                option-value="id" multiselect />
                        </div>
                        <div class="mt-4">
                            <h5 class="font-semibold text-left text-md dark:bg-slate-800 dark:shadow-gray-800">
                                Min Max Order Quantity</h5>
                            <div class="flex justify-between space-x-5">
                                <x-input placeholder="Min." type='number' wire:model.defer='min_oq' />
                                <x-input placeholder="Max." type='number' wire:model.defer='max_oq' />
                            </div>
                        </div>
                        <div class="mt-4">
                            <h5 class="font-semibold text-left text-md dark:bg-slate-800 dark:shadow-gray-800">
                                Min Max Price</h5>
                            <div class="flex justify-between space-x-5">
                                <x-input placeholder="Min." type='number' wire:model.defer='min_price' />
                                <x-input placeholder="Max." type='number' wire:model.defer='max_price' />
                            </div>
                        </div>
                        <div class="mt-4">
                            <h5 class="font-semibold text-left text-md dark:bg-slate-800 dark:shadow-gray-800">
                                Estimate Delivery Time in Days</h5>
                            <div class="flex justify-between space-x-5">
                                <x-input placeholder="Min." type='number' wire:model.defer='min_edt' />
                                <x-input placeholder="Max." type='number' wire:model.defer='max_edt' />
                            </div>
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
