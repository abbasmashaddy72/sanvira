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
                                <li>
                                    <a href="{{ route('homepage') }}"
                                        class="text-gray-300 duration-500 ease-in-out hover:text-gray-400">
                                        <i class="uil uil-angle-right-b me-1"></i>Home</a>
                                </li>
                                <li class="mt-[10px]">
                                    <a href="{{ route('contact_us') }}"
                                        class="text-gray-300 duration-500 ease-in-out hover:text-gray-400">
                                        <i class="uil uil-angle-right-b me-1"></i>Contact</a>
                                </li>
                            </ul>
                        </div>
                        <!--end col-->

                        <div class="lg:col-span-4 md:col-span-4">
                            <div class="grid grid-cols-1">
                                <div class="w-full leading-[0] border-0">
                                    <iframe
                                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d39206.002432144705!2d-95.4973981212445!3d29.709510002925988!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8640c16de81f3ca5%3A0xf43e0b60ae539ac9!2sGerald+D.+Hines+Waterwall+Park!5e0!3m2!1sen!2sin!4v1566305861440!5m2!1sen!2sin"
                                        style="border:0" class="w-full h-[150px]" allowfullscreen></iframe>
                                </div>
                            </div>
                            <!--end grid-->
                        </div>
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
<div class="fixed z-10 top-1/4 -right-1">
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
