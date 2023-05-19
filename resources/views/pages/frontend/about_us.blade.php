<x-guest-layout>
    <x-slot name='topSection'>
        <section
            class="relative table w-full py-28 bg-[url('../../assets/images/company/aboutus.jpg')] bg-no-repeat bg-center bg-cover">
            <div class="absolute inset-0 bg-black opacity-75"></div>
            <div class="container">
                <div class="grid grid-cols-1 pb-8 mt-10 text-center">
                    <div class="inline-flex justify-center mb-2">
                        @foreach (range(1, 5) as $i)
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                class="text-yellow-400 fill-current w-7 h-7">
                                <path
                                    d="M8.128 19.825a1.586 1.586 0 0 1-1.643-.117 1.543 1.543 0 0 1-.53-.662 1.515 1.515 0 0 1-.096-.837l.736-4.247-3.13-3a1.514 1.514 0 0 1-.39-1.569c.09-.271.254-.513.475-.698.22-.185.49-.306.776-.35L8.66 7.73l1.925-3.862c.128-.26.328-.48.577-.633a1.584 1.584 0 0 1 1.662 0c.25.153.45.373.577.633l1.925 3.847 4.334.615c.29.042.562.162.785.348.224.186.39.43.48.704a1.514 1.514 0 0 1-.404 1.58l-3.13 3 .736 4.247c.047.282.014.572-.096.837-.111.265-.294.494-.53.662a1.582 1.582 0 0 1-1.643.117l-3.865-2-3.865 2z">
                                </path>
                            </svg>
                        @endforeach
                    </div>
                    <h3 class="mb-6 text-3xl font-medium leading-normal text-white md:text-4xl md:leading-normal">Scale
                        Your Business though Marketplace!</h3>
                </div>
                <div class="flex justify-center mx-auto space-x-10">
                    <a href="{{ route('register') }}"
                        class="flex justify-center px-4 py-2 mt-4 font-medium text-white bg-blue-600 rounded hover:bg-blue-700">
                        Get Started</a>

                    <a href="{{ route('contact_us') }}"
                        class="flex justify-center px-4 py-2 mt-4 font-medium text-white bg-gray-600 rounded hover:bg-gray-700">
                        Contact Us</a>
                </div>
            </div>
        </section>
        <div class="relative">
            <div
                class="shape absolute sm:-bottom-px -bottom-[2px] start-0 end-0 overflow-hidden z-1 text-white dark:text-slate-900">
                <svg class="w-full h-auto" viewBox="0 0 2880 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 48H1437.5H2880V0H2160C1442.5 52 720 0 720 0H0V48Z" fill="currentColor"></path>
                </svg>
            </div>
        </div>
    </x-slot>
    <x-frontend.index-container class="bg-white py-14">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-6 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">How it Works?</h3>
        </div>

        <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
            <div class="relative overflow-hidden text-center transition-all duration-500 ease-in-out group ">
                <div class="relative -m-3 overflow-hidden text-transparent">
                    <i data-feather="hexagon" class="h-28 w-28 fill-blue-600/5 mx-auto rotate-[30deg]"></i>
                    <div
                        class="absolute flex items-center justify-center mx-auto text-3xl text-blue-600 align-middle transition duration-500 ease-in-out top-2/4 -translate-y-2/4 start-0 end-0 rounded-xl">
                        <i class="uil uil-edit"></i>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-xl font-medium transition-all duration-500 ease-in-out">Register & Select Your
                        Product</p>
                </div>
            </div>
            <div class="relative overflow-hidden text-center transition-all duration-500 ease-in-out group ">
                <div class="relative -m-3 overflow-hidden text-transparent">
                    <i data-feather="hexagon" class="h-28 w-28 fill-blue-600/5 mx-auto rotate-[30deg]"></i>
                    <div
                        class="absolute flex items-center justify-center mx-auto text-3xl text-blue-600 align-middle transition duration-500 ease-in-out top-2/4 -translate-y-2/4 start-0 end-0 rounded-xl">
                        <i class="uil uil-envelope-send"></i>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-xl font-medium transition-all duration-500 ease-in-out">Send
                        RFQs & POs</p>
                </div>
            </div>
            <div class="relative overflow-hidden text-center transition-all duration-500 ease-in-out group ">
                <div class="relative -m-3 overflow-hidden text-transparent">
                    <i data-feather="hexagon" class="h-28 w-28 fill-blue-600/5 mx-auto rotate-[30deg]"></i>
                    <div
                        class="absolute flex items-center justify-center mx-auto text-3xl text-blue-600 align-middle transition duration-500 ease-in-out top-2/4 -translate-y-2/4 start-0 end-0 rounded-xl">
                        <i class="uil uil-chart-line"></i>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-xl font-medium transition-all duration-500 ease-in-out">Compare
                        Offer & Negotiate</p>
                </div>
            </div>
            <div class="relative overflow-hidden text-center transition-all duration-500 ease-in-out group ">
                <div class="relative -m-3 overflow-hidden text-transparent">
                    <i data-feather="hexagon" class="h-28 w-28 fill-blue-600/5 mx-auto rotate-[30deg]"></i>
                    <div
                        class="absolute flex items-center justify-center mx-auto text-3xl text-blue-600 align-middle transition duration-500 ease-in-out top-2/4 -translate-y-2/4 start-0 end-0 rounded-xl">
                        <i class="uil uil-paypal"></i>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-xl font-medium transition-all duration-500 ease-in-out">Delivery
                        & Payments</p>
                </div>
            </div>
        </div>
    </x-frontend.index-container>

    <x-frontend.index-container class="py-14">

        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-6 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">Who can Connect with
                Us
            </h3>
        </div>
        <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 mt-4 gap-[30px]">
            <div
                class="relative mt-4 overflow-hidden text-center transition duration-500 ease-in-out group lg:px-6 rounded-xl">
                <div class="relative -m-3 overflow-hidden text-transparent">
                    <i data-feather="hexagon" class="h-28 w-28 fill-blue-600/5 mx-auto rotate-[30deg]"></i>
                    <div
                        class="absolute flex items-center justify-center mx-auto text-3xl text-blue-600 align-middle transition duration-500 ease-in-out top-2/4 -translate-y-2/4 start-0 end-0 rounded-xl">
                        <i class="uil uil-hard-hat"></i>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-xl font-medium duration-500 ease-in-out">Contractors</p>
                    <p class="mt-3 transition duration-500 ease-in-out text-slate-400">Compare several products and
                        offers quickly and with assurance on pricing.</p>
                </div>
            </div>
            <div
                class="relative mt-4 overflow-hidden text-center transition duration-500 ease-in-out group lg:px-6 rounded-xl">
                <div class="relative -m-3 overflow-hidden text-transparent">
                    <i data-feather="hexagon" class="h-28 w-28 fill-blue-600/5 mx-auto rotate-[30deg]"></i>
                    <div
                        class="absolute flex items-center justify-center mx-auto text-3xl text-blue-600 align-middle transition duration-500 ease-in-out top-2/4 -translate-y-2/4 start-0 end-0 rounded-xl">
                        <i class="uil uil-icons"></i>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-xl font-medium duration-500 ease-in-out">Consultants / Developers</p>
                    <p class="mt-3 transition duration-500 ease-in-out text-slate-400">Using your design, specify
                        products and establish connections with the suppliers available.</p>
                </div>
            </div>
            <div
                class="relative mt-4 overflow-hidden text-center transition duration-500 ease-in-out group lg:px-6 rounded-xl">
                <div class="relative -m-3 overflow-hidden text-transparent">
                    <i data-feather="hexagon" class="h-28 w-28 fill-blue-600/5 mx-auto rotate-[30deg]"></i>
                    <div
                        class="absolute flex items-center justify-center mx-auto text-3xl text-blue-600 align-middle transition duration-500 ease-in-out top-2/4 -translate-y-2/4 start-0 end-0 rounded-xl">
                        <i class="uil uil-car-sideview"></i>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-xl font-medium duration-500 ease-in-out">Suppliers</p>
                    <p class="mt-3 transition duration-500 ease-in-out text-slate-400">Connect with clients besides
                        your
                        traditional marketing, and reach before projects go out to bid.</p>
                </div>
            </div>
            <div
                class="relative mt-4 overflow-hidden text-center transition duration-500 ease-in-out group lg:px-6 rounded-xl">
                <div class="relative -m-3 overflow-hidden text-transparent">
                    <i data-feather="hexagon" class="h-28 w-28 fill-blue-600/5 mx-auto rotate-[30deg]"></i>
                    <div
                        class="absolute flex items-center justify-center mx-auto text-3xl text-blue-600 align-middle transition duration-500 ease-in-out top-2/4 -translate-y-2/4 start-0 end-0 rounded-xl">
                        <i class="uil uil-setting"></i>
                    </div>
                </div>

                <div class="mt-6">
                    <p class="text-xl font-medium duration-500 ease-in-out">Manufacturers</p>
                    <p class="mt-3 transition duration-500 ease-in-out text-slate-400">Promote your local suppliers
                        while integrating your product data into the contractor's workflow.</p>
                </div>
            </div>
        </div>
    </x-frontend.index-container>
</x-guest-layout>