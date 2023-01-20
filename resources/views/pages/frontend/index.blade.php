<x-guest-layout>
    <section class="relative table w-full py-36 lg:py-52">
        <div class="absolute inset-0 bg-gradient-to-b from-black/60 via-black/80 to-black"></div>
        <div class="container">
            <div class="grid grid-cols-1 pb-8 mt-10 text-center">
                @include('components.frontend.search')
            </div>
        </div>
    </section>

    <section class="relative py-16 pt-5 md:py-24">
        <div class="relative container-fluid">
            <div class="grid grid-cols-1">
                <div class="relative z-2 transition-all duration-500 ease-in-out sm:-mt-[200px] -mt-[140px] m-0">
                    <div class="grid grid-cols-1 mt-8">
                        <div class="tiny-six-item">
                            <div class="tiny-slide">
                                <a href="{{ route('supplier_profile') }}"
                                    class="relative block m-2 overflow-hidden bg-white rounded-md shadow group dark:bg-slate-900 dark:shadow-gray-800">
                                    <span class="block p-4 text-center bg-white dark:bg-slate-900">
                                        <img src="assets/images/hosting/com.jpg"
                                            class="w-16 h-16 mx-auto mb-3 rounded-full shadow-md" alt="">

                                        <span
                                            class="text-xl font-medium transition-all duration-500 ease-in-out group-hover:text-indigo-600">.com</span>
                                        <span class="block text-slate-400">best price in the industry</span>
                                    </span>

                                    <span class="block p-4 text-center bg-indigo-600">
                                        <span class="block font-medium text-white uppercase">Sale</span>
                                        <span class="flex justify-center mt-2">
                                            <span class="text-base font-semibold text-white/70">$</span>
                                            <span class="mx-1 text-lg font-semibold text-white">3.99</span>
                                            <span class="self-end text-base font-semibold text-white/70">/year</span>
                                        </span>
                                    </span>
                                </a>
                            </div>

                            <div class="tiny-slide">
                                <a href="{{ route('supplier_profile') }}"
                                    class="relative block m-2 overflow-hidden bg-white rounded-md shadow group dark:bg-slate-900 dark:shadow-gray-800">
                                    <span class="block p-4 text-center bg-white dark:bg-slate-900">
                                        <img src="assets/images/hosting/biz.jpg"
                                            class="w-16 h-16 mx-auto mb-3 rounded-full shadow-md" alt="">

                                        <span
                                            class="text-xl font-medium transition-all duration-500 ease-in-out group-hover:text-emerald-600">.biz</span>
                                        <span class="block text-slate-400">best price in the industry</span>
                                    </span>

                                    <span class="block p-4 text-center bg-emerald-600">
                                        <span class="block font-medium text-white uppercase">Sale</span>
                                        <span class="flex justify-center mt-2">
                                            <span class="text-base font-semibold text-white/70">$</span>
                                            <span class="mx-1 text-lg font-semibold text-white">3.99</span>
                                            <span class="self-end text-base font-semibold text-white/70">/year</span>
                                        </span>
                                    </span>
                                </a>
                            </div>

                            <div class="tiny-slide">
                                <a href="{{ route('supplier_profile') }}"
                                    class="relative block m-2 overflow-hidden bg-white rounded-md shadow group dark:bg-slate-900 dark:shadow-gray-800">
                                    <span class="block p-4 text-center bg-white dark:bg-slate-900">
                                        <img src="assets/images/hosting/me.jpg"
                                            class="w-16 h-16 mx-auto mb-3 rounded-full shadow-md" alt="">

                                        <span
                                            class="text-xl font-medium transition-all duration-500 ease-in-out group-hover:text-red-600">.me</span>
                                        <span class="block text-slate-400">best price in the industry</span>
                                    </span>

                                    <span class="block p-4 text-center bg-red-600">
                                        <span class="block font-medium text-white uppercase">Sale</span>
                                        <span class="flex justify-center mt-2">
                                            <span class="text-base font-semibold text-white/70">$</span>
                                            <span class="mx-1 text-lg font-semibold text-white">3.99</span>
                                            <span class="self-end text-base font-semibold text-white/70">/year</span>
                                        </span>
                                    </span>
                                </a>
                            </div>

                            <div class="tiny-slide">
                                <a href="{{ route('supplier_profile') }}"
                                    class="relative block m-2 overflow-hidden bg-white rounded-md shadow group dark:bg-slate-900 dark:shadow-gray-800">
                                    <span class="block p-4 text-center bg-white dark:bg-slate-900">
                                        <img src="assets/images/hosting/mobi.jpg"
                                            class="w-16 h-16 mx-auto mb-3 rounded-full shadow-md" alt="">

                                        <span
                                            class="text-xl font-medium transition-all duration-500 ease-in-out group-hover:text-sky-600">.mobi</span>
                                        <span class="block text-slate-400">best price in the industry</span>
                                    </span>

                                    <span class="block p-4 text-center bg-sky-600">
                                        <span class="block font-medium text-white uppercase">Sale</span>
                                        <span class="flex justify-center mt-2">
                                            <span class="text-base font-semibold text-white/70">$</span>
                                            <span class="mx-1 text-lg font-semibold text-white">3.99</span>
                                            <span class="self-end text-base font-semibold text-white/70">/year</span>
                                        </span>
                                    </span>
                                </a>
                            </div>

                            <div class="tiny-slide">
                                <a href="{{ route('supplier_profile') }}"
                                    class="relative block m-2 overflow-hidden bg-white rounded-md shadow group dark:bg-slate-900 dark:shadow-gray-800">
                                    <span class="block p-4 text-center bg-white dark:bg-slate-900">
                                        <img src="assets/images/hosting/net.jpg"
                                            class="w-16 h-16 mx-auto mb-3 rounded-full shadow-md" alt="">

                                        <span
                                            class="text-xl font-medium transition-all duration-500 ease-in-out group-hover:text-amber-500">.net</span>
                                        <span class="block text-slate-400">best price in the industry</span>
                                    </span>

                                    <span class="block p-4 text-center bg-amber-500">
                                        <span class="block font-medium text-white uppercase">Sale</span>
                                        <span class="flex justify-center mt-2">
                                            <span class="text-base font-semibold text-white/70">$</span>
                                            <span class="mx-1 text-lg font-semibold text-white">3.99</span>
                                            <span class="self-end text-base font-semibold text-white/70">/year</span>
                                        </span>
                                    </span>
                                </a>
                            </div>

                            <div class="tiny-slide">
                                <a href="{{ route('supplier_profile') }}"
                                    class="relative block m-2 overflow-hidden bg-white rounded-md shadow group dark:bg-slate-900 dark:shadow-gray-800">
                                    <span class="block p-4 text-center bg-white dark:bg-slate-900">
                                        <img src="assets/images/hosting/org.jpg"
                                            class="w-16 h-16 mx-auto mb-3 rounded-full shadow-md" alt="">

                                        <span
                                            class="text-xl font-medium transition-all duration-500 ease-in-out group-hover:text-emerald-600">.org</span>
                                        <span class="block text-slate-400">best price in the industry</span>
                                    </span>

                                    <span class="block p-4 text-center bg-emerald-600">
                                        <span class="block font-medium text-white uppercase">Sale</span>
                                        <span class="flex justify-center mt-2">
                                            <span class="text-base font-semibold text-white/70">$</span>
                                            <span class="mx-1 text-lg font-semibold text-white">3.99</span>
                                            <span class="self-end text-base font-semibold text-white/70">/year</span>
                                        </span>
                                    </span>
                                </a>
                            </div>

                            <div class="tiny-slide">
                                <a href="{{ route('supplier_profile') }}"
                                    class="relative block m-2 overflow-hidden bg-white rounded-md shadow group dark:bg-slate-900 dark:shadow-gray-800">
                                    <span class="block p-4 text-center bg-white dark:bg-slate-900">
                                        <img src="assets/images/hosting/tv.jpg"
                                            class="w-16 h-16 mx-auto mb-3 rounded-full shadow-md" alt="">

                                        <span
                                            class="text-xl font-medium transition-all duration-500 ease-in-out group-hover:text-red-600">.tv</span>
                                        <span class="block text-slate-400">best price in the industry</span>
                                    </span>

                                    <span class="block p-4 text-center bg-red-600">
                                        <span class="block font-medium text-white uppercase">Sale</span>
                                        <span class="flex justify-center mt-2">
                                            <span class="text-base font-semibold text-white/70">$</span>
                                            <span class="mx-1 text-lg font-semibold text-white">3.99</span>
                                            <span class="self-end text-base font-semibold text-white/70">/year</span>
                                        </span>
                                    </span>
                                </a>
                            </div>

                            <div class="tiny-slide">
                                <a href="{{ route('supplier_profile') }}"
                                    class="relative block m-2 overflow-hidden bg-white rounded-md shadow group dark:bg-slate-900 dark:shadow-gray-800">
                                    <span class="block p-4 text-center bg-white dark:bg-slate-900">
                                        <img src="assets/images/hosting/us.jpg"
                                            class="w-16 h-16 mx-auto mb-3 rounded-full shadow-md" alt="">

                                        <span
                                            class="text-xl font-medium transition-all duration-500 ease-in-out group-hover:text-sky-600">.us</span>
                                        <span class="block text-slate-400">best price in the industry</span>
                                    </span>

                                    <span class="block p-4 text-center bg-sky-600">
                                        <span class="block font-medium text-white uppercase">Sale</span>
                                        <span class="flex justify-center mt-2">
                                            <span class="text-base font-semibold text-white/70">$</span>
                                            <span class="mx-1 text-lg font-semibold text-white">3.99</span>
                                            <span class="self-end text-base font-semibold text-white/70">/year</span>
                                        </span>
                                    </span>
                                </a>
                            </div>
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

                <p class="max-w-xl mx-auto text-slate-400">Start working with Tailwind CSS that can provide everything
                    you need to generate awareness, drive traffic, connect.</p>
            </div>

            <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px] mt-8">
                <div class="lg:col-span-4 md:col-span-6">
                    <div
                        class="flex items-center p-3 transition-all duration-500 ease-in-out bg-white rounded-md shadow-md hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                        <div
                            class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full mr-3">
                            <i data-feather="monitor" class="w-5 h-5 rotate-45"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="mb-0 text-lg font-medium">Fully Responsive</h4>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 md:col-span-6">
                    <div
                        class="flex items-center p-3 transition-all duration-500 ease-in-out bg-white rounded-md shadow-md hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                        <div
                            class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full mr-3">
                            <i data-feather="heart" class="w-5 h-5 rotate-45"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="mb-0 text-lg font-medium">Browser Compatibility</h4>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 md:col-span-6">
                    <div
                        class="flex items-center p-3 transition-all duration-500 ease-in-out bg-white rounded-md shadow-md hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                        <div
                            class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full mr-3">
                            <i data-feather="eye" class="w-5 h-5 rotate-45"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="mb-0 text-lg font-medium">Retina Ready</h4>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 md:col-span-6">
                    <div
                        class="flex items-center p-3 transition-all duration-500 ease-in-out bg-white rounded-md shadow-md hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                        <div
                            class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full mr-3">
                            <i data-feather="layout" class="w-5 h-5 rotate-45"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="mb-0 text-lg font-medium">Based On Tailwindcss 3</h4>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 md:col-span-6">
                    <div
                        class="flex items-center p-3 transition-all duration-500 ease-in-out bg-white rounded-md shadow-md hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                        <div
                            class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full mr-3">
                            <i data-feather="feather" class="w-5 h-5 rotate-45"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="mb-0 text-lg font-medium">Feather Icons</h4>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 md:col-span-6">
                    <div
                        class="flex items-center p-3 transition-all duration-500 ease-in-out bg-white rounded-md shadow-md hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                        <div
                            class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full mr-3">
                            <i data-feather="code" class="w-5 h-5 rotate-45"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="mb-0 text-lg font-medium">Built With SASS</h4>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 md:col-span-6">
                    <div
                        class="flex items-center p-3 transition-all duration-500 ease-in-out bg-white rounded-md shadow-md hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                        <div
                            class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full mr-3">
                            <i data-feather="user-check" class="w-5 h-5 rotate-45"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="mb-0 text-lg font-medium">W3c Valid Code</h4>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 md:col-span-6">
                    <div
                        class="flex items-center p-3 transition-all duration-500 ease-in-out bg-white rounded-md shadow-md hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                        <div
                            class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full mr-3">
                            <i data-feather="globe" class="w-5 h-5 rotate-45"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="mb-0 text-lg font-medium">Browsers Compatible</h4>
                        </div>
                    </div>
                </div>

                <div class="lg:col-span-4 md:col-span-6">
                    <div
                        class="flex items-center p-3 transition-all duration-500 ease-in-out bg-white rounded-md shadow-md hover:scale-105 dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 dark:bg-slate-900">
                        <div
                            class="flex items-center justify-center h-[45px] min-w-[45px] -rotate-45 bg-gradient-to-r from-transparent to-indigo-600/10 text-indigo-600 text-center rounded-full mr-3">
                            <i data-feather="settings" class="w-5 h-5 rotate-45"></i>
                        </div>
                        <div class="flex-1">
                            <h4 class="mb-0 text-lg font-medium">Easy to customize</h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid justify-center grid-cols-1">
                <div class="mt-6 text-center">
                    <a href="page-services.html"
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
                <p class="max-w-xl mx-auto text-slate-400">Create, collaborate, and turn your ideas into incredible
                    products with the definitive platform for digital design.</p>
            </div>
            <!--end grid-->

            <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                <div
                    class="relative p-6 overflow-hidden text-center transition-all duration-500 ease-in-out bg-white shadow group dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-xl dark:bg-slate-900">
                    <div class="relative -m-3 overflow-hidden text-transparent">
                        <i data-feather="hexagon"
                            class="w-24 h-24 mx-auto fill-indigo-600/5 group-hover:fill-white/10"></i>
                        <div
                            class="absolute left-0 right-0 flex items-center justify-center mx-auto text-3xl text-indigo-600 align-middle transition-all duration-500 ease-in-out top-2/4 -translate-y-2/4 rounded-xl group-hover:text-white">
                            <i class="uil uil-chart-line"></i>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('supplier_profile') }}"
                            class="text-lg font-medium transition-all duration-500 ease-in-out group-hover:text-white">Hign
                            Performance</a>
                        <p
                            class="mt-3 transition-all duration-500 ease-in-out text-slate-400 group-hover:text-white/50">
                            It is a long established fact that a reader.</p>
                    </div>
                </div>
                <!--end feature-->

                <div
                    class="relative p-6 overflow-hidden text-center transition-all duration-500 ease-in-out bg-white shadow group dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-xl dark:bg-slate-900">
                    <div class="relative -m-3 overflow-hidden text-transparent">
                        <i data-feather="hexagon"
                            class="w-24 h-24 mx-auto fill-indigo-600/5 group-hover:fill-white/10"></i>
                        <div
                            class="absolute left-0 right-0 flex items-center justify-center mx-auto text-3xl text-indigo-600 align-middle transition-all duration-500 ease-in-out top-2/4 -translate-y-2/4 rounded-xl group-hover:text-white">
                            <i class="uil uil-crosshairs"></i>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('supplier_profile') }}"
                            class="text-lg font-medium transition-all duration-500 ease-in-out group-hover:text-white">Best
                            Securities</a>
                        <p
                            class="mt-3 transition-all duration-500 ease-in-out text-slate-400 group-hover:text-white/50">
                            It is a long established fact that a reader.</p>
                    </div>
                </div>
                <!--end feature-->

                <div
                    class="relative p-6 overflow-hidden text-center transition-all duration-500 ease-in-out bg-white shadow group dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-xl dark:bg-slate-900">
                    <div class="relative -m-3 overflow-hidden text-transparent">
                        <i data-feather="hexagon"
                            class="w-24 h-24 mx-auto fill-indigo-600/5 group-hover:fill-white/10"></i>
                        <div
                            class="absolute left-0 right-0 flex items-center justify-center mx-auto text-3xl text-indigo-600 align-middle transition-all duration-500 ease-in-out top-2/4 -translate-y-2/4 rounded-xl group-hover:text-white">
                            <i class="uil uil-airplay"></i>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('supplier_profile') }}"
                            class="text-lg font-medium transition-all duration-500 ease-in-out group-hover:text-white">Trusted
                            Service</a>
                        <p
                            class="mt-3 transition-all duration-500 ease-in-out text-slate-400 group-hover:text-white/50">
                            It is a long established fact that a reader.</p>
                    </div>
                </div>
                <!--end feature-->

                <div
                    class="relative p-6 overflow-hidden text-center transition-all duration-500 ease-in-out bg-white shadow group dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-xl dark:bg-slate-900">
                    <div class="relative -m-3 overflow-hidden text-transparent">
                        <i data-feather="hexagon"
                            class="w-24 h-24 mx-auto fill-indigo-600/5 group-hover:fill-white/10"></i>
                        <div
                            class="absolute left-0 right-0 flex items-center justify-center mx-auto text-3xl text-indigo-600 align-middle transition-all duration-500 ease-in-out top-2/4 -translate-y-2/4 rounded-xl group-hover:text-white">
                            <i class="uil uil-rocket"></i>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('supplier_profile') }}"
                            class="text-lg font-medium transition-all duration-500 ease-in-out group-hover:text-white">Info
                            Technology</a>
                        <p
                            class="mt-3 transition-all duration-500 ease-in-out text-slate-400 group-hover:text-white/50">
                            It is a long established fact that a reader.</p>
                    </div>
                </div>
                <!--end feature-->

                <div
                    class="relative p-6 overflow-hidden text-center transition-all duration-500 ease-in-out bg-white shadow group dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-xl dark:bg-slate-900">
                    <div class="relative -m-3 overflow-hidden text-transparent">
                        <i data-feather="hexagon"
                            class="w-24 h-24 mx-auto fill-indigo-600/5 group-hover:fill-white/10"></i>
                        <div
                            class="absolute left-0 right-0 flex items-center justify-center mx-auto text-3xl text-indigo-600 align-middle transition-all duration-500 ease-in-out top-2/4 -translate-y-2/4 rounded-xl group-hover:text-white">
                            <i class="uil uil-clock"></i>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('supplier_profile') }}"
                            class="text-lg font-medium transition-all duration-500 ease-in-out group-hover:text-white">24/7
                            Support</a>
                        <p
                            class="mt-3 transition-all duration-500 ease-in-out text-slate-400 group-hover:text-white/50">
                            It is a long established fact that a reader.</p>
                    </div>
                </div>
                <!--end feature-->

                <div
                    class="relative p-6 overflow-hidden text-center transition-all duration-500 ease-in-out bg-white shadow group dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-xl dark:bg-slate-900">
                    <div class="relative -m-3 overflow-hidden text-transparent">
                        <i data-feather="hexagon"
                            class="w-24 h-24 mx-auto fill-indigo-600/5 group-hover:fill-white/10"></i>
                        <div
                            class="absolute left-0 right-0 flex items-center justify-center mx-auto text-3xl text-indigo-600 align-middle transition-all duration-500 ease-in-out top-2/4 -translate-y-2/4 rounded-xl group-hover:text-white">
                            <i class="uil uil-users-alt"></i>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('supplier_profile') }}"
                            class="text-lg font-medium transition-all duration-500 ease-in-out group-hover:text-white">IT
                            Management</a>
                        <p
                            class="mt-3 transition-all duration-500 ease-in-out text-slate-400 group-hover:text-white/50">
                            It is a long established fact that a reader.</p>
                    </div>
                </div>
                <!--end feature-->

                <div
                    class="relative p-6 overflow-hidden text-center transition-all duration-500 ease-in-out bg-white shadow group dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-xl dark:bg-slate-900">
                    <div class="relative -m-3 overflow-hidden text-transparent">
                        <i data-feather="hexagon"
                            class="w-24 h-24 mx-auto fill-indigo-600/5 group-hover:fill-white/10"></i>
                        <div
                            class="absolute left-0 right-0 flex items-center justify-center mx-auto text-3xl text-indigo-600 align-middle transition-all duration-500 ease-in-out top-2/4 -translate-y-2/4 rounded-xl group-hover:text-white">
                            <i class="uil uil-file-alt"></i>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('supplier_profile') }}"
                            class="text-lg font-medium transition-all duration-500 ease-in-out group-hover:text-white">Certified
                            Company</a>
                        <p
                            class="mt-3 transition-all duration-500 ease-in-out text-slate-400 group-hover:text-white/50">
                            It is a long established fact that a reader.</p>
                    </div>
                </div>
                <!--end feature-->

                <div
                    class="relative p-6 overflow-hidden text-center transition-all duration-500 ease-in-out bg-white shadow group dark:shadow-gray-800 hover:shadow-md dark:hover:shadow-gray-700 hover:bg-indigo-600 dark:hover:bg-indigo-600 rounded-xl dark:bg-slate-900">
                    <div class="relative -m-3 overflow-hidden text-transparent">
                        <i data-feather="hexagon"
                            class="w-24 h-24 mx-auto fill-indigo-600/5 group-hover:fill-white/10"></i>
                        <div
                            class="absolute left-0 right-0 flex items-center justify-center mx-auto text-3xl text-indigo-600 align-middle transition-all duration-500 ease-in-out top-2/4 -translate-y-2/4 rounded-xl group-hover:text-white">
                            <i class="uil uil-search"></i>
                        </div>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('supplier_profile') }}"
                            class="text-lg font-medium transition-all duration-500 ease-in-out group-hover:text-white">Data
                            Analytics</a>
                        <p
                            class="mt-3 transition-all duration-500 ease-in-out text-slate-400 group-hover:text-white/50">
                            It is a long established fact that a reader.</p>
                    </div>
                </div>
                <!--end feature-->
            </div>
        </div>
    </section>

    <section class="relative pb-16 md:pb-24">
        <div class="container mt-16 lg:mt-24">
            <div class="grid grid-cols-1 pb-8 text-center">
                <h3 class="mb-4 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">Featured Products
                </h3>

                <p class="max-w-xl mx-auto text-slate-400">Start working with Tailwind CSS that can provide everything
                    you need to generate awareness, drive traffic, connect.</p>
            </div>
            <!--end grid-->

            <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
                <div
                    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                    <div class="relative">
                        <img src="assets/images/real/property/1.jpg" alt="">

                        <div class="absolute top-6 right-6">
                            <a href=""
                                class="text-lg text-red-600 bg-white border-0 rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-800"><i
                                    class="mdi mdi-heart"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <a href="{{ route('products_details') }}"
                                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">10765
                                Hillshire Ave, Baton Rouge, LA 70810, USA</a>
                        </div>

                        <ul class="flex items-center py-6 list-none border-gray-100 border-y dark:border-gray-800">
                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-compress-arrows"></i>
                                <span>8000sqf</span>
                            </li>

                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bed-double"></i>
                                <span>4 Beds</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bath"></i>
                                <span>4 Baths</span>
                            </li>
                        </ul>

                        <ul class="flex items-center justify-between pt-6 list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">$5000</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium list-none text-amber-400">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline text-black dark:text-white">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end property content-->

                <div
                    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                    <div class="relative">
                        <img src="assets/images/real/property/2.jpg" alt="">

                        <div class="absolute top-6 right-6">
                            <a href=""
                                class="text-lg text-red-600 bg-white border-0 rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-800"><i
                                    class="mdi mdi-heart"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <a href="{{ route('products_details') }}"
                                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">59345
                                STONEWALL DR, Plaquemine, LA 70764, USA</a>
                        </div>

                        <ul class="flex items-center py-6 list-none border-gray-100 border-y dark:border-gray-800">
                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-compress-arrows"></i>
                                <span>8000sqf</span>
                            </li>

                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bed-double"></i>
                                <span>4 Beds</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bath"></i>
                                <span>4 Baths</span>
                            </li>
                        </ul>

                        <ul class="flex items-center justify-between pt-6 list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">$5000</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium list-none text-amber-400">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline text-black dark:text-white">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end property content-->

                <div
                    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                    <div class="relative">
                        <img src="assets/images/real/property/3.jpg" alt="">

                        <div class="absolute top-6 right-6">
                            <a href=""
                                class="text-lg text-red-600 bg-white border-0 rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-800"><i
                                    class="mdi mdi-heart"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <a href="{{ route('products_details') }}"
                                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">3723 SANDBAR
                                DR, Addis, LA 70710, USA</a>
                        </div>

                        <ul class="flex items-center py-6 list-none border-gray-100 border-y dark:border-gray-800">
                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-compress-arrows"></i>
                                <span>8000sqf</span>
                            </li>

                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bed-double"></i>
                                <span>4 Beds</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bath"></i>
                                <span>4 Baths</span>
                            </li>
                        </ul>

                        <ul class="flex items-center justify-between pt-6 list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">$5000</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium list-none text-amber-400">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline text-black dark:text-white">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end property content-->

                <div
                    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                    <div class="relative">
                        <img src="assets/images/real/property/4.jpg" alt="">

                        <div class="absolute top-6 right-6">
                            <a href=""
                                class="text-lg text-red-600 bg-white border-0 rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-800"><i
                                    class="mdi mdi-heart"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <a href="{{ route('products_details') }}"
                                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">Lot 21 ROYAL
                                OAK DR, Prairieville, LA 70769, USA</a>
                        </div>

                        <ul class="flex items-center py-6 list-none border-gray-100 border-y dark:border-gray-800">
                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-compress-arrows"></i>
                                <span>8000sqf</span>
                            </li>

                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bed-double"></i>
                                <span>4 Beds</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bath"></i>
                                <span>4 Baths</span>
                            </li>
                        </ul>

                        <ul class="flex items-center justify-between pt-6 list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">$5000</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium list-none text-amber-400">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline text-black dark:text-white">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end property content-->

                <div
                    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                    <div class="relative">
                        <img src="assets/images/real/property/5.jpg" alt="">

                        <div class="absolute top-6 right-6">
                            <a href=""
                                class="text-lg text-red-600 bg-white border-0 rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-800"><i
                                    class="mdi mdi-heart"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <a href="{{ route('products_details') }}"
                                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">710 BOYD DR,
                                Unit #1102, Baton Rouge, LA 70808, USA</a>
                        </div>

                        <ul class="flex items-center py-6 list-none border-gray-100 border-y dark:border-gray-800">
                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-compress-arrows"></i>
                                <span>8000sqf</span>
                            </li>

                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bed-double"></i>
                                <span>4 Beds</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bath"></i>
                                <span>4 Baths</span>
                            </li>
                        </ul>

                        <ul class="flex items-center justify-between pt-6 list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">$5000</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium list-none text-amber-400">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline text-black dark:text-white">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end property content-->

                <div
                    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
                    <div class="relative">
                        <img src="assets/images/real/property/6.jpg" alt="">

                        <div class="absolute top-6 right-6">
                            <a href=""
                                class="text-lg text-red-600 bg-white border-0 rounded-full shadow btn btn-icon dark:bg-slate-900 dark:shadow-gray-800"><i
                                    class="mdi mdi-heart"></i></a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="pb-6">
                            <a href="{{ route('products_details') }}"
                                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">5133 MCLAIN
                                WAY, Baton Rouge, LA 70809, USA</a>
                        </div>

                        <ul class="flex items-center py-6 list-none border-gray-100 border-y dark:border-gray-800">
                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-compress-arrows"></i>
                                <span>8000sqf</span>
                            </li>

                            <li class="flex items-center mr-4">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bed-double"></i>
                                <span>4 Beds</span>
                            </li>

                            <li class="flex items-center">
                                <i class="mr-2 text-2xl text-indigo-600 uil uil-bath"></i>
                                <span>4 Baths</span>
                            </li>
                        </ul>

                        <ul class="flex items-center justify-between pt-6 list-none">
                            <li>
                                <span class="text-slate-400">Price</span>
                                <p class="text-lg font-medium">$5000</p>
                            </li>

                            <li>
                                <span class="text-slate-400">Rating</span>
                                <ul class="text-lg font-medium list-none text-amber-400">
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline"><i class="mdi mdi-star"></i></li>
                                    <li class="inline text-black dark:text-white">5.0(30)</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--end property content-->
            </div>
            <!--en grid-->

            <div class="justify-center mt-6 text-center md:flex">
                <div class="md:w-full">
                    <a href="{{ route('products') }}"
                        class="text-indigo-600 duration-500 ease-in-out btn btn-link hover:text-indigo-600 after:bg-indigo-600">View
                        More Properties <i class="ml-1 uil uil-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="relative pb-16 md:pb-24">
        <div class="grid grid-cols-1 pb-8 text-center">
            <h3 class="mb-4 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">Some of our top brands
            </h3>
        </div>
        <div class="container mt-8 md:mt-24">
            <div class="grid md:grid-cols-6 grid-cols-2 justify-center gap-[30px]">
                <div class="py-4 mx-auto">
                    <img src="assets/images/client/amazon.svg" class="h-6" alt="">
                </div>

                <div class="py-4 mx-auto">
                    <img src="assets/images/client/google.svg" class="h-6" alt="">
                </div>

                <div class="py-4 mx-auto">
                    <img src="assets/images/client/lenovo.svg" class="h-6" alt="">
                </div>

                <div class="py-4 mx-auto">
                    <img src="assets/images/client/paypal.svg" class="h-6" alt="">
                </div>

                <div class="py-4 mx-auto">
                    <img src="assets/images/client/shopify.svg" class="h-6" alt="">
                </div>

                <div class="py-4 mx-auto">
                    <img src="assets/images/client/spotify.svg" class="h-6" alt="">
                </div>
            </div>
            <!--end grid-->
        </div>
    </section>

    <section class="relative pb-16 md:pb-24">
        <div class="container mt-16 lg:mt-24">
            <div class="grid grid-cols-1 text-center">
                <h3 class="mb-4 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">Have Question ?
                    Get in touch!</h3>

                <p class="max-w-xl mx-auto text-slate-400">Start working with Tailwind CSS that can provide everything
                    you need to generate awareness, drive traffic, connect.</p>

                <div class="mt-6">
                    <a href="contact-one.html"
                        class="text-white bg-indigo-600 border-indigo-600 rounded-md btn hover:bg-indigo-700 hover:border-indigo-700"><i
                            class="mr-2 align-middle uil uil-phone"></i> Contact us</a>
                </div>
            </div>
            <!--end grid-->
        </div>
        <!--end container-->
    </section>

</x-guest-layout>
