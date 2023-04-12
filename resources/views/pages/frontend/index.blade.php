<x-guest-layout>
    <section class="relative table w-full py-36 lg:py-52">
        <div class="absolute inset-0" style="background-image: url({{ asset('storage/' . $home_image) }})"></div>
    </section>

    <section class="relative py-16 pt-5 pb-0 md:py-24">
        <div class="relative container-fluid">
            <div class="grid grid-cols-1">
                <div class="relative z-2 transition-all duration-500 ease-in-out sm:-mt-[200px] -mt-[140px] m-0">
                    <div class="grid grid-cols-1 mt-8">
                        <div class="tiny-six-item">

                            @foreach ($supplier_products_on_sale as $item)
                                <div class="tiny-slide">
                                    <a href="{{ route('supplier_products_sales', ['sales_id' => $item->id]) }}"
                                        class="relative block m-2 overflow-hidden bg-white rounded-md shadow group dark:bg-slate-900 dark:shadow-gray-800">
                                        <span class="block p-4 text-center bg-white dark:bg-slate-900">
                                            <img src="{{ asset('storage/' . $item->image) }}"
                                                class="h-32 mx-auto mb-3 rounded-sm shadow-md"
                                                alt="{{ $item->name }}">

                                            <span
                                                class="text-xl font-medium transition-all duration-500 ease-in-out group-hover:text-indigo-600">{{ $item->name }}</span>
                                        </span>

                                        @php
                                            $colors = ['bg-indigo-600', 'bg-emerald-600', 'bg-red-600', 'bg-sky-600', 'bg-amber-500', 'bg-orange-500', 'bg-yellow-500', 'bg-lime-500', 'bg-violet-500'];
                                        @endphp

                                        <span
                                            class="block p-4 text-center @if ($loop->index == count($colors)) {{ $colors[$loop->index - -count($colors)] }} @else {{ $colors[$loop->index] }} @endif">
                                            <span class="block font-medium text-white uppercase">On Sale</span>
                                        </span>
                                    </a>
                                </div>
                            @endforeach

                        </div>
                    </div>
                    <!--end grid-->
                </div>
            </div>
            <!--end grid-->
        </div>
    </section>

    <section class="relative py-16 md:py-24">
        <div class="container">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-6 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">Categories</h3>
            </div>

            <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px] mt-8">
                @foreach ($product_categories as $item)
                    <div class="lg:col-span-4 md:col-span-6">
                        <div
                            class="flex items-center p-3 transition-all duration-500 ease-in-out bg-white rounded-md shadow-md hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                            <div
                                class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full mr-3">
                                <img class="w-5 h-5 rotate-45" src="{{ asset('storage/' . $item->image) }}" />
                            </div>
                            <a href="{{ route('products_category', ['product_category' => $item->id]) }}"
                                class="flex-1">
                                <h4 class="mb-0 text-lg font-medium">{{ $item->name }}</h4>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="grid justify-center grid-cols-1">
                <div class="mt-6 text-center">
                    <a href="{{ route('all_products_category') }}"
                        class="mt-2 mr-2 text-white bg-indigo-600 border-indigo-600 rounded-md btn hover:bg-indigo-700 hover:border-indigo-700">See
                        More <i class="uil uil-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="relative py-16 md:py-24">
        <div class="container">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">Supplier Stores
                </h3>
            </div>
            <!--end grid-->

            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                @foreach ($suppliers as $item)
                    <div
                        class="relative p-6 overflow-hidden text-center transition-all duration-500 ease-in-out bg-white shadow group dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-xl dark:bg-slate-900">
                        <div class="relative -m-3 overflow-hidden text-transparent">
                            <i data-feather="hexagon"
                                class="w-24 h-24 mx-auto fill-indigo-600/5 group-hover:fill-white/10"></i>
                            <div
                                class="absolute left-0 right-0 flex items-center justify-center mx-auto text-3xl text-indigo-600 align-middle transition-all duration-500 ease-in-out top-2/4 -translate-y-2/4 rounded-xl group-hover:text-white">
                                <img class="w-24 h-24 mx-auto" src="{{ asset('storage/' . $item->logo) }}" />
                            </div>
                        </div>

                        <div class="mt-6">
                            <a href="{{ route('supplier_profile', ['profile' => $item->id]) }}"
                                class="text-lg font-medium transition-all duration-500 ease-in-out group-hover:text-white">{{ $item->company_name }}</a>
                            <p
                                class="mt-3 transition-all duration-500 ease-in-out text-slate-400 group-hover:text-white/50">
                                {{ $item->tagline }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="grid justify-center grid-cols-1">
                <div class="mt-6 text-center">
                    <a href="{{ route('all_supplier_profile') }}"
                        class="mt-2 mr-2 text-white bg-indigo-600 border-indigo-600 rounded-md btn hover:bg-indigo-700 hover:border-indigo-700">See
                        More <i class="uil uil-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="relative pb-16 md:pb-24">
        <div class="container mt-16 lg:mt-24">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">Featured Products
                </h3>
            </div>
            <!--end grid-->

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                @foreach ($featured_products as $item)
                    <div
                        class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                        <div class="relative">
                            <img class="h-32" src="{{ asset('storage/' . $item->image) }}" alt="">
                        </div>

                        <div class="p-6">
                            <div class="pb-6">
                                <a href="{{ route('products_details', ['data' => $item->id]) }}"
                                    class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">{{ $item->name }}</a>
                            </div>

                            <ul class="grid items-center grid-cols-1 gap-2 py-6 list-none">
                                <li class="flex items-center justify-between">
                                    <span
                                        class="mr-2 font-semibold text-indigo-600">{{ __('Min Max Order Quantity:') }}</span>
                                    <span class="ml-2">{{ $item->min_max_oq }}</span>
                                </li>

                                <li class="flex items-center justify-between">
                                    <span
                                        class="mr-2 font-semibold text-indigo-600">{{ __('Estimate Delivery Time in Days:') }}</span>
                                    <span class="ml-2">{{ $item->edt }}</span>
                                </li>

                                <li class="flex items-center justify-between">
                                    <span class="mr-2 font-semibold text-indigo-600">{{ __('Brand Name:') }}</span>
                                    <span class="ml-2">{{ $item->brand }}</span>
                                </li>

                                <li class="flex items-center justify-between">
                                    <span
                                        class="mr-2 font-semibold text-indigo-600">{{ __('Manufacturer Name:') }}</span>
                                    <span class="ml-2">{{ $item->manufacturer }}</span>
                                </li>

                                <li class="flex items-center justify-between">
                                    <span class="mr-2 font-semibold text-indigo-600">{{ __('Model Name:') }}</span>
                                    <span class="ml-2">{{ $item->model }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--en grid-->

            <div class="justify-center mt-6 text-center md:flex">
                <div class="md:w-full">
                    <a href="{{ route('products') }}"
                        class="text-indigo-600 duration-500 ease-in-out btn btn-link hover:text-indigo-600 after:bg-indigo-600">View
                        More Products <i class="ml-1 uil uil-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="relative pb-16 md:pb-24">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-4 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">Some of our top brands
            </h3>
        </div>
        <div class="container">
            <div class="grid md:grid-cols-6 grid-cols-2 justify-center gap-[30px]">
                @foreach ($top_suppliers as $item)
                    <div class="py-4 mx-auto">
                        <img src="{{ asset('storage/' . $item->logo) }}" class="h-6" alt="">
                    </div>
                @endforeach
            </div>
            <!--end grid-->
        </div>
    </section>

    <section class="relative pb-16 md:pb-24">
        <div class="container mt-16 lg:mt-24">
            <div class="grid grid-cols-1 text-center">
                <h3 class="mb-4 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">Have Question ?
                    Get in touch!</h3>

                <div class="mt-6">
                    <a href="{{ route('contact_us') }}"
                        class="text-white bg-indigo-600 border-indigo-600 rounded-md btn hover:bg-indigo-700 hover:border-indigo-700"><i
                            class="mr-2 align-middle uil uil-phone"></i> Contact us</a>
                </div>
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
    </section>

</x-guest-layout>
