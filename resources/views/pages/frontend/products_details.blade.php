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

    <x-frontend.index-container containerTitle='{{ $data->name }}' class="py-14">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12 rounded border-2 border-gray-200 bg-white p-4 shadow lg:col-span-8">
                <div class="relative">
                    <div class="tiny-single-item-products">
                        @foreach ($data->images as $item)
                            <div class="tiny-slide">
                                <a href="{{ asset('storage/' . $item) }}" data-lightbox="supplier_products">
                                    <img class="h-72 w-96 rounded-lg object-cover"
                                        src="{{ asset('storage/' . $item) }}" />
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
                                <li>Data Sheet {{ $loop->iteration }}</li>
                            </a>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-span-12 rounded border-2 border-gray-200 bg-white shadow lg:col-span-4">
                <div class="sticky top-20">
                    <div class="p-6">
                        <ul class="list-none">
                            <li class="mb-2 flex items-center justify-between border-b-2 border-gray-200 pb-2">
                                <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                    class="mr-2 h-8 w-8 fill-blue-600" viewBox="0 0 117.77 122.88">
                                    <path
                                        d="M19.81,113.35a7.89,7.89,0,0,1-1.74,3.45,5.87,5.87,0,0,1-2.46,1.31L0,122.88a16.13,16.13,0,0,1,2.51-3.75,11.83,11.83,0,0,1,3.72-2,12.16,12.16,0,0,1-2.93-2.41,3.47,3.47,0,0,1-.92-2.21A5.19,5.19,0,0,1,3,110.37,13.08,13.08,0,0,1,4.47,108c3.15-4.2,6.25-6.28,9.33-6.28a2.91,2.91,0,0,1,2.21.89,3.39,3.39,0,0,1,.82,2.36,5.39,5.39,0,0,1-.32,2,18.35,18.35,0,0,1-1.34,2.5q-3.59-1.78-4.89-1.78a5.82,5.82,0,0,0-2.58.64,6.66,6.66,0,0,0-1.59,1.17c0,.65,1.16,1.61,3.47,2.93s4,2,5,2a34.37,34.37,0,0,0,5.24-1ZM20,67.17A43.15,43.15,0,0,1,18.42,79a95.91,95.91,0,0,1-6,14.37L8,91.6A83,83,0,0,0,9.83,76.46c0-3-.25-7.3-.72-13S8,52.06,7.27,46.45s-1.91-12.29-3.57-20a33.76,33.76,0,0,1-.87-5.61c0-1.49.75-4,2.26-7.67S8.69,5.14,11.4,0l4.41,25.77q2.46,14.7,3.4,25.47c.5,5.53.75,10.85.75,15.93Zm15.91,42.45V89.22H56.28v20.4Zm81.9-21.3h-33c-3.21,0-5.66-.67-7.38-2-2.08-1.66-3.13-4.37-3.13-8.09,0-2.16.13-4.47.35-6.93s.55-5,1-7.52l3-.15a5.6,5.6,0,0,0,2.59,3.75A9.39,9.39,0,0,0,86,68.51h24.93q-1.68-10.71-5.81-17.1a30.44,30.44,0,0,0-9.54-9.18l5.29-22.72a38.18,38.18,0,0,1,13.31,18.2q3.61,10.27,3.6,27.23V88.32Z" />
                                </svg>
                                <span
                                    class="ml-2 text-lg font-semibold">{{ $data->price ? $data->price : $data->min_price . ' - ' . $data->max_price }}</span>
                            </li>
                            <li class="flex items-center justify-between">
                                <span class="mr-2 font-medium text-blue-600">{{ __('Min Max Order Quantity:') }}</span>
                                <span class="ml-2">{{ $data->min_oq }} - {{ $data->max_oq }}</span>
                            </li>

                            <li class="flex items-center justify-between">
                                <span
                                    class="mr-2 font-medium text-blue-600">{{ __('Estimate Delivery Time in Days:') }}</span>
                                <span class="ml-2">{{ $data->edt }}</span>
                            </li>

                            <li class="flex items-center justify-between">
                                <span class="mr-2 font-medium text-blue-600">{{ __('Brand Name:') }}</span>
                                <a class="text-blue-600"
                                    href="{{ route('brand_products', ['brand' => $data->brands->id]) }}">
                                    <span class="ml-2">{{ $data->brands->name }}</span>
                                </a>
                            </li>

                            <li class="flex items-center justify-between">
                                <span class="mr-2 font-medium text-blue-600">{{ __('Stock Keeping Unit:') }}</span>
                                <span class="ml-2">{{ $data->sku }}</span>
                            </li>

                            {{-- <li class="flex items-center justify-between">
                                <span class="mr-2 font-medium text-blue-600">{{ __('Manufacturer Name:') }}</span>
                                <span class="ml-2">{{ $data->manufacturers->name }}</span>
                            </li>

                            <li class="flex items-center justify-between">
                                <span class="mr-2 font-medium text-blue-600">{{ __('Model Name:') }}</span>
                                <span class="ml-2">{{ $data->model }}</span>
                            </li> --}}

                            <li class="line-clamp-1 flex items-center justify-between">
                                <span
                                    class="mr-2 truncate font-medium text-blue-600">{{ __('Catygeory Name:') }}</span>
                                <a class="truncate text-blue-600"
                                    href="{{ route('products_category', ['product_category' => $data->supplier_product_category_id]) }}">
                                    <span class="ml-2">{{ $data->supplierProductCategory->name }}</span>
                                </a>
                            </li>

                            @foreach ($data->productAttributes as $item)
                                <li class="flex items-center justify-between">
                                    <span class="mr-2 font-medium text-blue-600">{{ $item->name . ':' }}</span>
                                    <span class="ml-2">{{ $item->value }}</span>
                                </li>
                            @endforeach

                        </ul>
                        <div class="mt-4 flex flex-1 items-center justify-center px-5">
                            <div class="block">
                                <a href="{{ route('supplier_profile', ['profile' => $data->suppliers->id]) }}">
                                    <img alt="{{ $data->suppliers->company_name }}"
                                        class="h-24 w-52 rounded-md border-2 border-gray-200 object-cover shadow"
                                        src="{{ asset('storage/' . $data->suppliers->logo) }}">
                                </a>
                            </div>
                            <div class="block">

                            </div>
                        </div>
                    </div>
                    {{-- @livewire('frontend.filters.supplier-product-view', ['item' => $data, key($data->id), 'type' =>
                    'Product Details Page']) --}}
                </div>
            </div>
        </div>
    </x-frontend.index-container>
</x-guest-layout>
