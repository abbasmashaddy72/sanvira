<footer class="bg-white dark:bg-gray-900">
    <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <span class="text-sm text-gray-500 dark:text-gray-400 sm:text-center">© {{ now()->format('Y') }} <a
                    href="{{ route('homepage') }}" class="hover:underline">{{ config('app.name') }}</a>. All Rights
                Reserved.
            </span>
            <ul class="mt-6 flex justify-center space-x-4">
                @if (!empty(get_static_option('facebook')))
                    <li class="inline shadow-md">
                        <a href="{{ get_static_option('facebook') }}" target="_blank"
                            class="btn btn-icon btn-sm rounded-md border border-gray-800 hover:border-blue-600 hover:bg-blue-600 dark:hover:border-blue-600 dark:hover:bg-blue-600">
                            <i class="ri-facebook-line align-middle text-blue-600 hover:text-white" title="Buy Now"></i>
                        </a>
                    </li>
                @endif
                @if (!empty(get_static_option('instagram')))
                    <li class="inline shadow-md">
                        <a href="{{ get_static_option('instagram') }}" target="_blank"
                            class="btn btn-icon btn-sm rounded-md border border-gray-800 hover:border-blue-600 hover:bg-blue-600 dark:hover:border-blue-600 dark:hover:bg-blue-600">
                            <i class="ri-instagram-line align-middle text-blue-600 hover:text-white"
                                title="Buy Now"></i>
                        </a>
                    </li>
                @endif
                @if (!empty(get_static_option('linkedin')))
                    <li class="inline shadow-md">
                        <a href="{{ get_static_option('linkedin') }}" target="_blank"
                            class="btn btn-icon btn-sm rounded-md border border-gray-800 hover:border-blue-600 hover:bg-blue-600 dark:hover:border-blue-600 dark:hover:bg-blue-600">
                            <i class="ri-linkedin-line align-middle text-blue-600 hover:text-white" title="Buy Now"></i>
                        </a>
                    </li>
                @endif
                @if (!empty(get_static_option('twitter')))
                    <li class="inline shadow-md">
                        <a href="{{ get_static_option('twitter') }}" target="_blank"
                            class="btn btn-icon btn-sm rounded-md border border-gray-800 hover:border-blue-600 hover:bg-blue-600 dark:hover:border-blue-600 dark:hover:bg-blue-600">
                            <i class="ri-twitter-line align-middle text-blue-600 hover:text-white" title="Buy Now"></i>
                        </a>
                    </li>
                @endif
                @if (!empty(get_static_option('youtube')))
                    <li class="inline shadow-md">
                        <a href="{{ get_static_option('youtube') }}" target="_blank"
                            class="btn btn-icon btn-sm rounded-md border border-gray-800 hover:border-blue-600 hover:bg-blue-600 dark:hover:border-blue-600 dark:hover:bg-blue-600">
                            <i class="ri-youtube-line align-middle text-blue-600 hover:text-white" title="Buy Now"></i>
                        </a>
                    </li>
                @endif
                @if (!empty(get_static_option('google_business')))
                    <li class="inline shadow-md">
                        <a href="{{ get_static_option('google_business') }}" target="_blank"
                            class="btn btn-icon btn-sm rounded-md border border-gray-800 hover:border-blue-600 hover:bg-blue-600 dark:hover:border-blue-600 dark:hover:bg-blue-600">
                            <i class="ri-map-line align-middle text-blue-600 hover:text-white" title="Buy Now"></i>
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</footer>

<!-- Back to top -->
<a href="#" id="back-to-top"
    class="back-to-top fixed bottom-5 right-5 z-50 hidden h-9 w-9 rounded-full bg-indigo-600 text-center text-lg leading-9 text-white"><i
        class="ri-arrow-drop-up-line"></i></a>
<!-- Back to top -->
{{--
<!-- Switcher -->
<div class="fixed -right-1 top-1/4 z-10">
    <span class="relative inline-block rotate-90">
        <input type="checkbox" class="checkbox absolute opacity-0" id="chk" />
        <label
            class="label flex h-8 w-14 cursor-pointer items-center justify-between rounded-full bg-slate-900 p-1 shadow dark:bg-white dark:shadow-gray-800"
            for="chk">
            <i class="ri-moon-l text-[20px] text-yellow-500"></i>
            <i class="ri-sun-l text-[20px] text-yellow-500"></i>
            <span class="ball absolute left-[2px] top-[2px] h-7 w-7 rounded-full bg-white dark:bg-slate-900"></span>
        </label>
    </span>
</div>
<!-- Switcher -->

<!-- Feedback button -->
<div class="fixed right-0 top-1/2 z-10 -translate-y-1/2 transform">
    <button
        class="flex h-24 w-8 cursor-pointer items-center justify-center rounded-l-lg bg-blue-600 shadow hover:bg-blue-700">
        <span class="-rotate-90 transform text-base text-white">Feedback</span>
    </button>
</div> --}}
