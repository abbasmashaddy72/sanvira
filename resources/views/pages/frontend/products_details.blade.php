<x-guest-layout>
    @push('styles')
        <style>
            .ck-content>blockquote,
            .ck-content>dl,
            .ck-content>dd,
            .ck-content>h1,
            .ck-content>h2,
            .ck-content>h3,
            .ck-content>h4,
            .ck-content>h5,
            .ck-content>h6,
            .ck-content>hr,
            .ck-content>figure,
            .ck-content>p,
            .ck-content>pre {
                margin: revert;
            }

            .ck-content>ol,
            .ck-content>ul {
                list-style: revert;
                margin: revert;
                padding: revert;
            }

            .ck-content>table {
                border-collapse: revert;
            }

            .ck-content>h1,
            .ck-content>h2,
            .ck-content>h3,
            .ck-content>h4,
            .ck-content>h5,
            .ck-content>h6 {
                font-size: revert;
                font-weight: revert;
            }

            .ck-editor__editable_inline {
                min-height: 200px;
            }
        </style>
    @endpush

    <x-frontend.index-container containerTitle='{{ $data->title }}' class="py-14">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 rounded border-2 border-gray-200 bg-white p-4 shadow lg:col-span-8">
                <div class="relative">
                    <div class="tiny-single-item-products">
                        @foreach ($data->images as $item)
                            <div class="tiny-slide">
                                <a href="{{ asset('storage/' . $item) }}" data-lightbox="products">
                                    <img class="h-72 w-96 rounded-lg object-cover" src="{{ asset('storage/' . $item) }}"
                                        onerror="this.onerror=null; this.src='https://placehold.co/1280x625';" />
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
                <blockquote
                    class="bg-blue-60 rounded-lg border-l-4 border-blue-600 pl-4 dark:border-blue-600 dark:bg-blue-800 sm:pl-6 md:pl-8 md:pr-12 lg:pl-10 lg:pr-16 xl:pl-12 xl:pr-20">
                    <div class="ck-content text-gray-900 dark:text-white">
                        {!! $data->description !!}
                    </div>
                </blockquote>
                <div class="rounded border-2 border-blue-600 p-2 shadow">
                    <h2 class="text-lg font-semibold">{{ __('Data Sheets') }}</h2>
                    <ul class="ml-6 list-disc">
                        @foreach ($data->data_sheets as $item)
                            <a href="{{ asset($item) }}" target="__blank">
                                @livewire('frontend.filters.product-view', ['item' => $item, key($item->id)])
                                <li>Data Sheet {{ $loop->iteration }}</li>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-span-12 rounded border-2 border-gray-200 bg-white shadow lg:col-span-4">
                <div class="sticky top-20">
                    <div class="p-6">
                        <ul id="dynamic-list" class="list-none">
                            <li class="flex items-center justify-between p-1">
                                <span
                                    class="mr-2 font-medium text-blue-600">{{ __('Estimate Delivery Time in Days:') }}</span>
                                <span class="ml-2">{{ $data->edt }}</span>
                            </li>

                            {{-- <li class="flex items-center justify-between p-1">
                                <span class="mr-2 font-medium text-blue-600">{{ __('Brand Name:') }}</span>
                                <a class="text-blue-600"
                                    href="{{ route('brand_products', ['slug' => $data->brands->slug]) }}">
                                    <span class="ml-2">{{ $data->brands->name }}</span>
                                </a>
                            </li> --}}

                            {{-- <li class="flex items-center justify-between p-1">
                                <span class="mr-2 font-medium text-blue-600">{{ __('Stock Keeping Unit:') }}</span>
                                <span class="ml-2">{{ $data->sku }}</span>
                            </li> --}}

                            {{-- <li class="flex items-center justify-between p-1">
                                <span class="mr-2 font-medium text-blue-600">{{ __('Vendor Name:') }}</span>
                                <span class="ml-2">{{ $data->vendors->name }}</span>
                            </li>

                            <li class="flex items-center justify-between p-1">
                                <span class="mr-2 font-medium text-blue-600">{{ __('Model Name:') }}</span>
                                <span class="ml-2">{{ $data->model }}</span>
                            </li> --}}

                            <li class="line-clamp-1 flex items-center justify-between p-1">
                                <span class="mr-2 truncate font-medium text-blue-600">{{ __('Catygeory Name:') }}</span>
                                <a class="truncate text-blue-600"
                                    href="{{ route('products_category', ['slug' => $data->category->slug]) }}">
                                    <span class="ml-2">{{ $data->category->name }}</span>
                                </a>
                            </li>

                            {{-- <li class="flex items-center justify-between p-1 line-clamp-1">
                                <span
                                    class="mr-2 font-medium text-blue-600 truncate">{{ __('Length x Width x Breadth:') }}</span>
                                <span class="ml-2">{{ $data->length . $data->length_units }} x
                                    {{ $data->width . $data->width_units }} x
                                    {{ $data->breadth . $data->breadth_units }}</span>
                            </li> --}}

                            {{-- <li class="flex items-center justify-between p-1 line-clamp-1">
                                <span class="mr-2 font-medium text-blue-600 truncate">{{ __('Weight:') }}</span>
                                <span class="ml-2">{{ $data->weight . $data->weight_unit }}</span>
                            </li> --}}

                            @foreach ($data->productAttributes as $item)
                                <li class="flex items-center justify-between p-1">
                                    <span class="mr-2 font-medium text-blue-600">{{ $item->name . ':' }}</span>
                                    <span class="ml-2">{{ $item->value }}</span>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                    {{-- @livewire('frontend.filters.product-view', ['item' => $data, key($data->id), 'type' => 'Product Details Page']) --}}
                </div>
            </div>
            <div class="col-span-12 rounded border-2 border-gray-200 bg-white p-4 shadow">
                <h2 class="text-lg font-semibold">{{ __('Similar Products') }}</h2>{{ $data->category }}
                @livewire('frontend.filters.products', ['category' => [$data->category], 'type' => 'Product Details Similar Products'])
            </div>
        </div>
    </x-frontend.index-container>
    @push('scripts')
        <script>
            const list = document.getElementById('dynamic-list');
            const listItems = list.querySelectorAll('li');

            for (let i = 1; i < listItems.length; i++) {
                const listItem = listItems[i];
                if (i % 2 === 1) {
                    listItem.classList.add('bg-gray-100');
                } else {
                    listItem.classList.add('bg-gray-200');
                }
            }
        </script>
    @endpush
</x-guest-layout>
