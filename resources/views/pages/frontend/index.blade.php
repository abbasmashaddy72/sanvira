<x-guest-layout>
    <section
        class="relative md:py-64 py-36 items-center bg-[url('../../assets/images/bg-seo.png')] bg-center bg-no-repeat">
        <div class="container">
            <div class="grid justify-center grid-cols-1 text-center">
                <div class="">
                    <h1 class="mb-5 text-4xl font-bold leading-normal lg:leading-normal lg:text-5xl">Your <span
                            class="text-indigo-600">SuperCharged</span>
                        Procurement Marketplace</h1>
                    <p class="max-w-xl mx-auto text-lg">Reinventing the way organization procure by digitizing
                        construction commerce using state of art technology</p>

                    <div class="mt-6 mb-3">
                        @livewire('frontend.form.search', ['type' => 'index'])
                    </div>

                    <span class="font-medium">Looking for help? <a href="{{ route('contact_us') }}"
                            class="text-indigo-600">Get in touch
                            with us</a></span>
                </div>
            </div>
        </div>
    </section>

    <x-frontend.index-container type="on_sale">
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
                                            class="h-32 mx-auto mb-3 rounded-sm shadow-md" alt="{{ $item->name }}">

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
            </div>
        </div>
    </x-frontend.index-container>

    <x-frontend.index-container containerTitle='Categories'>
        <div class="grid grid-cols-5 gap-[30px] mt-8">
            @foreach ($product_categories as $item)
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

        <div class="grid justify-center grid-cols-1">
            <div class="mt-6 text-center">
                <a href="{{ route('all_products_category') }}"
                    class="mt-2 mr-2 text-white bg-indigo-600 border-indigo-600 rounded-md btn hover:bg-indigo-700 hover:border-indigo-700">See
                    More <i class="uil uil-arrow-right"></i></a>
            </div>
        </div>
    </x-frontend.index-container>

    <x-frontend.index-container containerTitle='Supplier Stores'>
        <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
            @foreach ($suppliers as $item)
                <a href="{{ route('supplier_profile', ['profile' => $item->id]) }}">
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
                            <p
                                class="text-lg font-medium transition-all duration-500 ease-in-out group-hover:text-white">
                                {{ $item->company_name }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <div class="grid justify-center grid-cols-1">
            <div class="mt-6 text-center">
                <a href="{{ route('all_supplier_profile') }}"
                    class="mt-2 mr-2 text-white bg-indigo-600 border-indigo-600 rounded-md btn hover:bg-indigo-700 hover:border-indigo-700">See
                    More <i class="uil uil-arrow-right"></i></a>
            </div>
        </div>
    </x-frontend.index-container>

    <x-frontend.index-container containerTitle='Featured Products'>
        <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
            @foreach ($featured_products as $item)
                <x-backend.supplier-product :item="$item" />
            @endforeach
        </div>

        <div class="justify-center mt-6 text-center md:flex">
            <div class="md:w-full">
                <a href="{{ route('products') }}"
                    class="text-indigo-600 duration-500 ease-in-out btn btn-link hover:text-indigo-600 after:bg-indigo-600">View
                    More Products <i class="ml-1 uil uil-arrow-right"></i></a>
            </div>
        </div>
    </x-frontend.index-container>


    <x-frontend.index-container containerTitle='Some of our top brands'>
        <div class="grid md:grid-cols-6 grid-cols-2 justify-center gap-[30px]">
            @foreach ($top_suppliers as $item)
                <div class="py-4 mx-auto">
                    <img src="{{ asset('storage/' . $item->logo) }}" class="h-6" alt="">
                </div>
            @endforeach
        </div>
    </x-frontend.index-container>

    <x-frontend.index-container>
        <div class="grid grid-cols-1 text-center">
            <h3 class="mb-4 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">Have Question ?
                Get in touch!</h3>

            <div class="mt-6">
                <a href="{{ route('contact_us') }}"
                    class="text-white bg-indigo-600 border-indigo-600 rounded-md btn hover:bg-indigo-700 hover:border-indigo-700"><i
                        class="mr-2 align-middle uil uil-phone"></i> Contact us</a>
            </div>
        </div>
    </x-frontend.index-container>
</x-guest-layout>
