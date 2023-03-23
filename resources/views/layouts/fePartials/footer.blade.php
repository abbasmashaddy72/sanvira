<!-- Footer Start -->
<footer class="relative text-gray-200 footer bg-dark-footer dark:text-gray-200">
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div class="py-[60px] px-0">
                    <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                        <div class="lg:col-span-4 md:col-span-12">
                            <a href="#" class="text-[22px] focus:outline-none">
                                <img class="h-14" src="{{ asset('storage/' . get_static_option('logo')) }}"
                                    alt="" />
                            </a>
                            <p class="text-gray-300">{{ get_static_option('short_description') }}</p>
                            <ul class="mt-6 list-none">
                                <li class="inline">
                                    <a href="{{ '//' . get_static_option('fb_url') }}"
                                        class="border border-gray-800 rounded-md btn btn-icon btn-sm hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600">
                                        <i data-feather="facebook" class="w-4 h-4"></i>
                                    </a>
                                </li>
                                <li class="inline">
                                    <a href="{{ '//' . get_static_option('instagram_url') }}"
                                        class="border border-gray-800 rounded-md btn btn-icon btn-sm hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600">
                                        <i data-feather="instagram" class="w-4 h-4"></i>
                                    </a>
                                </li>
                                <li class="inline">
                                    <a href="{{ '//' . get_static_option('twitter_url') }}"
                                        class="border border-gray-800 rounded-md btn btn-icon btn-sm hover:border-indigo-600 dark:hover:border-indigo-600 hover:bg-indigo-600 dark:hover:bg-indigo-600">
                                        <i data-feather="twitter" class="w-4 h-4"></i>
                                    </a>
                                </li>
                            </ul>
                            <!--end icon-->
                        </div>
                        <!--end col-->

                        <div class="lg:col-span-2 md:col-span-4">
                            <ul class="mt-6 list-none footer-list">
                                {{-- <li>
                                    <a href="{{ route('homepage') }}"
                                        class="text-gray-300 duration-500 ease-in-out hover:text-gray-400">
                                        <i class="uil uil-angle-right-b me-1"></i>Home</a>
                                </li>
                                <li class="mt-[10px]">
                                    <a href="{{ route('about_us') }}"
                                        class="text-gray-300 duration-500 ease-in-out hover:text-gray-400">
                                        <i class="uil uil-angle-right-b me-1"></i>About us</a>
                                </li>
                                <li class="mt-[10px]">
                                    <a href="{{ route('services') }}"
                                        class="text-gray-300 duration-500 ease-in-out hover:text-gray-400">
                                        <i class="uil uil-angle-right-b me-1"></i>Services</a>
                                </li>
                                <li class="mt-[10px]">
                                    <a href="{{ route('doctors') }}"
                                        class="text-gray-300 duration-500 ease-in-out hover:text-gray-400">
                                        <i class="uil uil-angle-right-b me-1"></i>Doctors</a>
                                </li>
                                <li class="mt-[10px]">
                                    <a href="{{ route('gallery') }}"
                                        class="text-gray-300 duration-500 ease-in-out hover:text-gray-400">
                                        <i class="uil uil-angle-right-b me-1"></i>Gallery</a>
                                </li>
                                <li class="mt-[10px]">
                                    <a href="{{ route('contact_us') }}"
                                        class="text-gray-300 duration-500 ease-in-out hover:text-gray-400">
                                        <i class="uil uil-angle-right-b me-1"></i>Contact</a>
                                </li> --}}
                            </ul>
                        </div>
                        <!--end col-->
                    </div>
                    <!--end grid-->
                </div>
                <!--end col-->
            </div>
        </div>
        <!--end grid-->
    </div>
    <!--end container-->
</footer>
<!--end footer-->
<!-- Footer End -->

<!-- Back to top -->
<a href="#" id="back-to-top"
    class="fixed z-50 hidden text-lg leading-9 text-center text-white bg-indigo-600 rounded-full back-to-top bottom-5 right-5 h-9 w-9"><i
        class="uil uil-arrow-up"></i></a>
<!-- Back to top -->

<!-- Switcher -->
<div class="fixed z-50 top-1/4 -right-1">
    <span class="relative inline-block rotate-90">
        <input type="checkbox" class="absolute opacity-0 checkbox" id="chk" />
        <label
            class="flex items-center justify-between h-8 p-1 rounded-full shadow cursor-pointer label bg-slate-900 dark:bg-white dark:shadow-gray-800 w-14"
            for="chk">
            <i class="uil uil-moon text-[20px] text-yellow-500"></i>
            <i class="uil uil-sun text-[20px] text-yellow-500"></i>
            <span class="ball bg-white dark:bg-slate-900 rounded-full absolute top-[2px] left-[2px] w-7 h-7"></span>
        </label>
    </span>
</div>
<!-- Switcher -->
