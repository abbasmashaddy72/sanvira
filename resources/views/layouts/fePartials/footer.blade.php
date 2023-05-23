<footer class="relative text-gray-200 bg-white footer dark:text-gray-200">
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div class="py-[60px] px-0">
                    <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
                        <div class="lg:col-span-3 md:col-span-12">
                            <a href="#" class="text-[22px] focus:outline-none flex justify-center">
                                <img class="h-28" src="{{ asset('storage/' . get_static_option('footer_logo')) }}"
                                    alt="" />
                            </a>
                            <ul class="flex justify-center mt-6 space-x-4">
                                @if (!empty(get_static_option('facebook')))
                                    <li class="inline">
                                        <a href="{{ get_static_option('facebook') }}" target="_blank"
                                            class="border border-gray-800 rounded-md btn btn-icon btn-sm hover:border-blue-600 dark:hover:border-blue-600 hover:bg-blue-600 dark:hover:bg-blue-600">
                                            <i class="text-blue-600 align-middle hover:text-white uil uil-facebook-f"
                                                title="Buy Now"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (!empty(get_static_option('instagram')))
                                    <li class="inline">
                                        <a href="{{ get_static_option('instagram') }}" target="_blank"
                                            class="border border-gray-800 rounded-md btn btn-icon btn-sm hover:border-blue-600 dark:hover:border-blue-600 hover:bg-blue-600 dark:hover:bg-blue-600">
                                            <i class="text-blue-600 align-middle hover:text-white uil uil-instagram"
                                                title="Buy Now"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (!empty(get_static_option('linkedin')))
                                    <li class="inline">
                                        <a href="{{ get_static_option('linkedin') }}" target="_blank"
                                            class="border border-gray-800 rounded-md btn btn-icon btn-sm hover:border-blue-600 dark:hover:border-blue-600 hover:bg-blue-600 dark:hover:bg-blue-600">
                                            <i class="text-blue-600 align-middle hover:text-white uil uil-linkedin-alt"
                                                title="Buy Now"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (!empty(get_static_option('twitter')))
                                    <li class="inline">
                                        <a href="{{ get_static_option('twitter') }}" target="_blank"
                                            class="border border-gray-800 rounded-md btn btn-icon btn-sm hover:border-blue-600 dark:hover:border-blue-600 hover:bg-blue-600 dark:hover:bg-blue-600">
                                            <i class="text-blue-600 align-middle hover:text-white uil uil-twitter-alt"
                                                title="Buy Now"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (!empty(get_static_option('youtube')))
                                    <li class="inline">
                                        <a href="{{ get_static_option('youtube') }}" target="_blank"
                                            class="border border-gray-800 rounded-md btn btn-icon btn-sm hover:border-blue-600 dark:hover:border-blue-600 hover:bg-blue-600 dark:hover:bg-blue-600">
                                            <i class="text-blue-600 align-middle hover:text-white uil uil-youtube"
                                                title="Buy Now"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (!empty(get_static_option('google_business')))
                                    <li class="inline">
                                        <a href="{{ get_static_option('google_business') }}" target="_blank"
                                            class="border border-gray-800 rounded-md btn btn-icon btn-sm hover:border-blue-600 dark:hover:border-blue-600 hover:bg-blue-600 dark:hover:bg-blue-600">
                                            <i class="text-blue-600 align-middle hover:text-white uil uil-map-marker"
                                                title="Buy Now"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                            <!--end icon-->
                        </div>
                        <!--end col-->

                        <div class="lg:col-span-2 md:col-span-4">
                            <ul class="space-y-2 list-none footer-list">
                                <li>
                                    <a href="{{ route('career') }}"
                                        class="text-gray-700 duration-500 ease-in-out hover:text-gray-400">
                                        <i class="uil uil-angle-right-b me-1"></i>Careers</a>
                                </li>
                                <li>
                                    <a href="{{ route('about_us') }}"
                                        class="text-gray-700 duration-500 ease-in-out hover:text-gray-400">
                                        <i class="uil uil-angle-right-b me-1"></i>About Us</a>
                                </li>
                                <li>
                                    <a href="{{ route('contact_us') }}"
                                        class="text-gray-700 duration-500 ease-in-out hover:text-gray-400">
                                        <i class="uil uil-angle-right-b me-1"></i>Contact Us</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}"
                                        class="text-gray-700 duration-500 ease-in-out hover:text-gray-400">
                                        <i class="uil uil-angle-right-b me-1"></i>Register</a>
                                </li>
                                <li>
                                    <a href="{{ route('homepage') }}"
                                        class="text-gray-700 duration-500 ease-in-out hover:text-gray-400">
                                        <i class="uil uil-angle-right-b me-1"></i>Resource</a>
                                </li>
                            </ul>
                        </div>
                        <div class="lg:col-span-2 md:col-span-4">
                            <ul class="space-y-2 list-none footer-list">
                                <li>
                                    <a href="{{ route('privacy_policy') }}"
                                        class="text-gray-700 duration-500 ease-in-out hover:text-gray-400">
                                        <i class="uil uil-angle-right-b me-1"></i>Privacy Policy</a>
                                </li>
                                <li>
                                    <a href="{{ route('terms_of_use') }}"
                                        class="text-gray-700 duration-500 ease-in-out hover:text-gray-400">
                                        <i class="uil uil-angle-right-b me-1"></i>Terms of Use</a>
                                </li>
                                <li>
                                    <a href="{{ route('return_refund') }}"
                                        class="text-gray-700 duration-500 ease-in-out hover:text-gray-400">
                                        <i class="uil uil-angle-right-b me-1"></i>Returns & Refunds</a>
                                </li>
                            </ul>
                        </div>
                        <!--end col-->

                        <div class="lg:col-span-5 md:col-span-4">
                            <div class="grid grid-cols-1">
                                <div class="w-full leading-[0] border-0">
                                    <iframe src="{{ get_static_option('embed_map_link') }}" style="border:0"
                                        class="w-full h-[250px]" allowfullscreen></iframe>
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
    class="fixed z-50 hidden text-lg leading-9 text-center text-white bg-blue-600 rounded-full back-to-top bottom-5 right-5 h-9 w-9"><i
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
