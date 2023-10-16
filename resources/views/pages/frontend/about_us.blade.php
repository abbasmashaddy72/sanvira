<x-guest-layout>
    <x-slot name='topSection'>
        <section
            class="relative table w-full bg-[url('../../assets/images/company/aboutus.jpg')] bg-cover bg-center bg-no-repeat py-28">
            <div class="absolute inset-0 bg-black opacity-75"></div>
            <div class="container">
                <div class="mt-10 grid grid-cols-1 pb-8 text-center">
                    <div class="mb-2 inline-flex justify-center">
                        @foreach (range(1, 5) as $i)
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                class="h-7 w-7 fill-current text-yellow-400">
                                <path
                                    d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z">
                                </path>
                            </svg>
                        @endforeach
                    </div>
                    <h3 class="mb-6 text-3xl font-medium leading-normal text-white md:text-4xl md:leading-normal">
                        {{ __('Scale Your Business though Marketplace!') }}</h3>
                </div>
                <div class="mx-auto flex justify-center space-x-10">
                    <a href="{{ route('register') }}"
                        class="mt-4 flex justify-center rounded bg-blue-600 px-4 py-2 font-medium text-white hover:bg-blue-700">
                        {{ __('Get Started') }}</a>

                    <a href="{{ route('contact_us') }}"
                        class="mt-4 flex justify-center rounded bg-gray-600 px-4 py-2 font-medium text-white hover:bg-gray-700">
                        {{ __('Contact Us') }}</a>
                </div>
            </div>
        </section>
        <div class="relative">
            <div
                class="shape z-1 absolute -bottom-[2px] end-0 start-0 overflow-hidden text-white dark:text-slate-900 sm:-bottom-px">
                <svg class="h-auto w-full" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
    </x-slot>
    {{-- <x-frontend.index-container class="bg-white py-14">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">{{ __('How it works?') }}
            </h3>
        </div>

        <div class="grid grid-cols-1 gap-4 mt-8 md:grid-cols-3 lg:grid-cols-5">
            <div
                class="relative p-2 overflow-hidden text-center transition-all duration-500 ease-in-out border-2 rounded shadow order-gray-200 group">
                <div class="relative -m-3 overflow-hidden text-transparent">
                    <i data-feather="hexagon" class="mx-auto h-20 w-20 rotate-[30deg] fill-blue-600/5"></i>
                    <div
                        class="absolute flex items-center justify-center mx-auto text-3xl text-blue-600 align-middle transition duration-500 ease-in-out end-0 start-0 top-2/4 -translate-y-2/4 rounded-xl">
                        1
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-lg font-semibold duration-500 ease-in-out">Sign up to the Marketplace</p>
                    <p class="mt-3 transition duration-500 ease-in-out text-slate-400">Create an account with Kasper’s
                        Marketplace.</p>
                </div>
            </div>
            <div
                class="relative p-2 overflow-hidden text-center transition-all duration-500 ease-in-out border-2 rounded shadow order-gray-200 group">
                <div class="relative -m-3 overflow-hidden text-transparent">
                    <i data-feather="hexagon" class="mx-auto h-20 w-20 rotate-[30deg] fill-blue-600/5"></i>
                    <div
                        class="absolute flex items-center justify-center mx-auto text-3xl text-blue-600 align-middle transition duration-500 ease-in-out end-0 start-0 top-2/4 -translate-y-2/4 rounded-xl">
                        2
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-lg font-semibold duration-500 ease-in-out">Select your
                        product</p>
                    <p class="mt-3 transition duration-500 ease-in-out text-slate-400">Browse through & select the
                        product that suits your needs.</p>
                </div>
            </div>
            <div
                class="relative p-2 overflow-hidden text-center transition-all duration-500 ease-in-out border-2 rounded shadow order-gray-200 group">
                <div class="relative -m-3 overflow-hidden text-transparent">
                    <i data-feather="hexagon" class="mx-auto h-20 w-20 rotate-[30deg] fill-blue-600/5"></i>
                    <div
                        class="absolute flex items-center justify-center mx-auto text-3xl text-blue-600 align-middle transition duration-500 ease-in-out end-0 start-0 top-2/4 -translate-y-2/4 rounded-xl">
                        3
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-lg font-semibold duration-500 ease-in-out">Send RFQs & Purchase Orders</p>
                    <p class="mt-3 transition duration-500 ease-in-out text-slate-400">Easily request quotations and
                        place purchase orders.</p>
                </div>
            </div>
            <div
                class="relative p-2 overflow-hidden text-center transition-all duration-500 ease-in-out border-2 rounded shadow order-gray-200 group">
                <div class="relative -m-3 overflow-hidden text-transparent">
                    <i data-feather="hexagon" class="mx-auto h-20 w-20 rotate-[30deg] fill-blue-600/5"></i>
                    <div
                        class="absolute flex items-center justify-center mx-auto text-3xl text-blue-600 align-middle transition duration-500 ease-in-out end-0 start-0 top-2/4 -translate-y-2/4 rounded-xl">
                        4
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-lg font-semibold duration-500 ease-in-out">Compare & Negotiate</p>
                    <p class="mt-3 transition duration-500 ease-in-out text-slate-400">Review multiple offers and
                        negotiate terms.</p>
                </div>
            </div>
            <div
                class="relative p-2 overflow-hidden text-center transition-all duration-500 ease-in-out border-2 rounded shadow order-gray-200 group">
                <div class="relative -m-3 overflow-hidden text-transparent">
                    <i data-feather="hexagon" class="mx-auto h-20 w-20 rotate-[30deg] fill-blue-600/5"></i>
                    <div
                        class="absolute flex items-center justify-center mx-auto text-3xl text-blue-600 align-middle transition duration-500 ease-in-out end-0 start-0 top-2/4 -translate-y-2/4 rounded-xl">
                        5
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-lg font-semibold duration-500 ease-in-out">Delivery & Payments</p>
                    <p class="mt-3 transition duration-500 ease-in-out text-slate-400">Receive your products/services
                        & make secure payments.</p>
                </div>
            </div>
        </div>
    </x-frontend.index-container> --}}

    <x-frontend.index-container class="py-14">

        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">{{ __('Who is it for?') }}
            </h3>
        </div>
        <div class="mt-4 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            <div
                class="group relative mt-4 overflow-hidden rounded border-2 border-gray-300 p-2 text-center transition duration-500 ease-in-out">
                <div class="-3 relative overflow-hidden text-transparent">
                    <i data-feather="hexagon" class="mx-auto h-28 w-28 rotate-[30deg] fill-blue-600/5"></i>
                    <div
                        class="absolute end-0 start-0 top-2/4 mx-auto flex -translate-y-2/4 items-center justify-center rounded-xl align-middle text-3xl text-blue-600 transition duration-500 ease-in-out">
                        <i class="uil uil-hard-hat"></i>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-xl font-semibold duration-500 ease-in-out">Contractors</p>
                    <p class="mt-3 text-slate-400 transition duration-500 ease-in-out">Compare several products and
                        offers quickly and with assurance on pricing.</p>
                </div>
            </div>
            <div
                class="group relative mt-4 overflow-hidden rounded border-2 border-gray-300 p-2 text-center transition duration-500 ease-in-out">
                <div class="-3 relative overflow-hidden text-transparent">
                    <i data-feather="hexagon" class="mx-auto h-28 w-28 rotate-[30deg] fill-blue-600/5"></i>
                    <div
                        class="absolute end-0 start-0 top-2/4 mx-auto flex -translate-y-2/4 items-center justify-center rounded-xl align-middle text-3xl text-blue-600 transition duration-500 ease-in-out">
                        <i class="uil uil-building"></i>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-xl font-semibold duration-500 ease-in-out">Consultants / Developers</p>
                    <p class="mt-3 text-slate-400 transition duration-500 ease-in-out">Using your design, specify
                        products and establish connections with the suppliers available.</p>
                </div>
            </div>
            <div
                class="group relative mt-4 overflow-hidden rounded border-2 border-gray-300 p-2 text-center transition duration-500 ease-in-out">
                <div class="-3 relative overflow-hidden text-transparent">
                    <i data-feather="hexagon" class="mx-auto h-28 w-28 rotate-[30deg] fill-blue-600/5"></i>
                    <div
                        class="absolute end-0 start-0 top-2/4 mx-auto flex -translate-y-2/4 items-center justify-center rounded-xl align-middle text-3xl text-blue-600 transition duration-500 ease-in-out">
                        <i class="uil uil-store-alt"></i>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-xl font-semibold duration-500 ease-in-out">Suppliers</p>
                    <p class="mt-3 text-slate-400 transition duration-500 ease-in-out">Connect with clients besides
                        your
                        traditional marketing, and reach before projects go out to bid.</p>
                </div>
            </div>
            <div
                class="group relative mt-4 overflow-hidden rounded border-2 border-gray-300 p-2 text-center transition duration-500 ease-in-out">
                <div class="-3 relative overflow-hidden text-transparent">
                    <i data-feather="hexagon" class="mx-auto h-28 w-28 rotate-[30deg] fill-blue-600/5"></i>
                    <div
                        class="absolute end-0 start-0 top-2/4 mx-auto flex -translate-y-2/4 items-center justify-center rounded-xl align-middle text-3xl text-blue-600 transition duration-500 ease-in-out">
                        <i class="uil uil-setting"></i>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-xl font-semibold duration-500 ease-in-out">Manufacturers</p>
                    <p class="mt-3 text-slate-400 transition duration-500 ease-in-out">Promote your local suppliers
                        while integrating your product data into the contractor's workflow.</p>
                </div>
            </div>
        </div>
    </x-frontend.index-container>
    <x-frontend.index-container class="bg-white py-14">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">
                {{ __('Some of our Clients') }}
            </h3>
        </div>
        <div class="relative mt-8 transition-all duration-500 ease-in-out">
            <div class="grid grid-cols-1">
                <div class="tiny-five-item">
                    @foreach ($featured_brands as $item)
                        <div class="tiny-slide">
                            <a href="{{ route('brand_products', ['slug' => $item->slug]) }}"
                                class='group relative block overflow-hidden p-3'>
                                <img src="{{ asset('storage/' . $item->logo) }}"
                                    class="mx-auto h-32 w-full rounded-lg object-cover shadow-md"
                                    alt="{{ $item->name }}">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-frontend.index-container>
</x-guest-layout>
