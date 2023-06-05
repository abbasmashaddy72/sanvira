<footer class="footer relative border-t-2 border-blue-300 bg-white text-gray-200 dark:text-gray-200">
    <div class="container">
        <div class="grid grid-cols-12">
            <div class="col-span-12">
                <div class="px-0 py-[60px]">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-12">
                        <div class="md:col-span-12 lg:col-span-3">
                            <a href="#" class="flex justify-center text-[22px] focus:outline-none">
                                <img class="h-28" src="{{ asset('storage/' . get_static_option('footer_logo')) }}"
                                    alt="" />
                            </a>
                            <ul class="mt-6 flex justify-center space-x-4">
                                @if (!empty(get_static_option('facebook')))
                                    <li class="inline">
                                        <a href="{{ get_static_option('facebook') }}" target="_blank"
                                            class="btn btn-icon btn-sm rounded-md border border-gray-800 hover:border-blue-600 hover:bg-blue-600 dark:hover:border-blue-600 dark:hover:bg-blue-600">
                                            <i class="uil uil-facebook-f align-middle text-blue-600 hover:text-white"
                                                title="Buy Now"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (!empty(get_static_option('instagram')))
                                    <li class="inline">
                                        <a href="{{ get_static_option('instagram') }}" target="_blank"
                                            class="btn btn-icon btn-sm rounded-md border border-gray-800 hover:border-blue-600 hover:bg-blue-600 dark:hover:border-blue-600 dark:hover:bg-blue-600">
                                            <i class="uil uil-instagram align-middle text-blue-600 hover:text-white"
                                                title="Buy Now"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (!empty(get_static_option('linkedin')))
                                    <li class="inline">
                                        <a href="{{ get_static_option('linkedin') }}" target="_blank"
                                            class="btn btn-icon btn-sm rounded-md border border-gray-800 hover:border-blue-600 hover:bg-blue-600 dark:hover:border-blue-600 dark:hover:bg-blue-600">
                                            <i class="uil uil-linkedin-alt align-middle text-blue-600 hover:text-white"
                                                title="Buy Now"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (!empty(get_static_option('twitter')))
                                    <li class="inline">
                                        <a href="{{ get_static_option('twitter') }}" target="_blank"
                                            class="btn btn-icon btn-sm rounded-md border border-gray-800 hover:border-blue-600 hover:bg-blue-600 dark:hover:border-blue-600 dark:hover:bg-blue-600">
                                            <i class="uil uil-twitter-alt align-middle text-blue-600 hover:text-white"
                                                title="Buy Now"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (!empty(get_static_option('youtube')))
                                    <li class="inline">
                                        <a href="{{ get_static_option('youtube') }}" target="_blank"
                                            class="btn btn-icon btn-sm rounded-md border border-gray-800 hover:border-blue-600 hover:bg-blue-600 dark:hover:border-blue-600 dark:hover:bg-blue-600">
                                            <i class="uil uil-youtube align-middle text-blue-600 hover:text-white"
                                                title="Buy Now"></i>
                                        </a>
                                    </li>
                                @endif
                                @if (!empty(get_static_option('google_business')))
                                    <li class="inline">
                                        <a href="{{ get_static_option('google_business') }}" target="_blank"
                                            class="btn btn-icon btn-sm rounded-md border border-gray-800 hover:border-blue-600 hover:bg-blue-600 dark:hover:border-blue-600 dark:hover:bg-blue-600">
                                            <i class="uil uil-map-marker align-middle text-blue-600 hover:text-white"
                                                title="Buy Now"></i>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                            <!--end icon-->
                        </div>
                        <!--end col-->

                        <div class="md:col-span-4 lg:col-span-2">
                            <ul class="footer-list list-none space-y-2">
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
                        <div class="md:col-span-4 lg:col-span-2">
                            <ul class="footer-list list-none space-y-2">
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
                                    <a href="{{ route('return_refunds') }}"
                                        class="text-gray-700 duration-500 ease-in-out hover:text-gray-400">
                                        <i class="uil uil-angle-right-b me-1"></i>Returns & Refunds</a>
                                </li>
                            </ul>
                        </div>
                        <!--end col-->

                        <div class="md:col-span-4 lg:col-span-5">
                            <div class="grid grid-cols-1">
                                <div class="w-full border-0 leading-[0]">
                                    <iframe src="{{ get_static_option('embed_map_link') }}" style="border:0"
                                        class="h-[250px] w-full" allowfullscreen></iframe>
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
    class="back-to-top fixed bottom-5 right-5 z-50 hidden h-9 w-9 rounded-full bg-blue-600 text-center text-lg leading-9 text-white"><i
        class="uil uil-arrow-up"></i></a>
<!-- Back to top -->

<!-- Switcher -->
<div class="fixed -right-1 top-1/4 z-10">
    <span class="relative inline-block rotate-90">
        <input type="checkbox" class="checkbox absolute opacity-0" id="chk" />
        <label
            class="label flex h-8 w-14 cursor-pointer items-center justify-between rounded-full bg-slate-900 p-1 shadow dark:bg-white dark:shadow-gray-800"
            for="chk">
            <i class="uil uil-moon text-[20px] text-yellow-500"></i>
            <i class="uil uil-sun text-[20px] text-yellow-500"></i>
            <span class="ball absolute left-[2px] top-[2px] h-7 w-7 rounded-full bg-white dark:bg-slate-900"></span>
        </label>
    </span>
</div>
<!-- Switcher -->
