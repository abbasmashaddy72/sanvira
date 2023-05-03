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
    <section class="relative pb-16 mt-20 md:pb-24">
        <div class="container-fluid">
            <div class="grid grid-cols-4 gap-2">
                @foreach ($data->images as $item)
                    <div class="">
                        <a href="{{ asset('storage/' . $item) }}" data-lightbox="supplier_products">
                            <img class="object-cover w-full rounded-lg h-72" src="{{ asset('storage/' . $item) }}" />
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <!--end container fluid-->

        <div class="container mt-16 md:mt-24">
            <div class="md:flex">
                <div class="px-3 lg:w-2/3 md:w-1/2 md:p-4">
                    <h4 class="text-2xl font-medium">{{ $data->name }}</h4>

                    <blockquote
                        class="p-4 my-4 border-l-4 border-indigo-300 rounded-lg bg-blue-60 dark:border-blue-600 dark:bg-indigo-800">
                        <div class="text-gray-900 dark:text-white ck-content">
                            {!! $data->description !!}
                        </div>
                    </blockquote>
                </div>

                <div class="px-3 mt-8 lg:w-1/3 md:w-1/2 md:p-4 md:mt-0">
                    <div class="sticky top-20">
                        <div class="rounded-md shadow bg-slate-50 dark:bg-slate-800 dark:shadow-gray-800">
                            <div class="p-6">
                                <ul class="mt-4 list-none">
                                    <li class="flex items-center justify-between">
                                        <span
                                            class="mr-2 font-semibold text-indigo-600">{{ __('Min Max Order Quantity:') }}</span>
                                        <span class="ml-2">{{ $data->min_oq }} - {{ $data->max_oq }}</span>
                                    </li>

                                    <li class="flex items-center justify-between">
                                        <span
                                            class="mr-2 font-semibold text-indigo-600">{{ __('Estimate Delivery Time in Days:') }}</span>
                                        <span class="ml-2">{{ $data->edt }}</span>
                                    </li>

                                    <li class="flex items-center justify-between">
                                        <span class="mr-2 font-semibold text-indigo-600">{{ __('Brand Name:') }}</span>
                                        <span class="ml-2">{{ $data->brand }}</span>
                                    </li>

                                    <li class="flex items-center justify-between">
                                        <span
                                            class="mr-2 font-semibold text-indigo-600">{{ __('Manufacturer Name:') }}</span>
                                        <span class="ml-2">{{ $data->manufacturer }}</span>
                                    </li>

                                    <li class="flex items-center justify-between">
                                        <span class="mr-2 font-semibold text-indigo-600">{{ __('Model Name:') }}</span>
                                        <span class="ml-2">{{ $data->model }}</span>
                                    </li>

                                    @foreach ($data_attributes as $item)
                                        <li class="flex items-center justify-between">
                                            <span
                                                class="mr-2 font-semibold text-indigo-600">{{ $item->name . ':' }}</span>
                                            <span class="ml-2">{{ $item->value }}</span>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                            <div class="flex">
                                <div class="w-1/2 p-1">
                                    <a href=""
                                        class="w-full text-white bg-indigo-600 rounded-md btn hover:bg-indigo-700">Add
                                        to Cart</a>
                                </div>
                                <div class="w-1/2 p-1">
                                    <a href=""
                                        class="w-full text-white bg-indigo-600 rounded-md btn hover:bg-indigo-700">Add
                                        to RFQ</a>
                                </div>
                            </div>
                        </div>

                        <div class="mt-12 text-center">
                            <h3 class="mb-6 text-xl font-medium leading-normal">Have Question ? Get in touch!</h3>

                            <div class="mt-6">
                                <a href="{{ route('contact_us') }}"
                                    class="text-indigo-600 bg-transparent border border-indigo-600 rounded-md btn hover:bg-indigo-600 hover:text-white"><i
                                        class="align-middle uil uil-phone"></i> Contact us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
