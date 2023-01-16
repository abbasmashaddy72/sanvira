<!-- Loader Start -->
<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div>
<!-- Loader End -->
<!-- Start Navbar -->
<nav id="topnav" class="w-screen defaultscroll is-sticky nav-sticky">
    <div class="container">
        <!-- Logo container-->
        <a class="pl-0 logo" href="{{ route('homepage') }}">
            <span class="inline-block dark:hidden">
                <img src="{{ asset('storage/' . get_static_option('logo')) }}" class="l-dark" height="24"
                    alt="" />
                <img src="{{ asset('storage/' . get_static_option('logo')) }}" class="l-light" height="24"
                    alt="" />
            </span>
            <img src="{{ asset('storage/' . get_static_option('logo')) }}" height="24"
                class="hidden dark:inline-block" alt="" />
        </a>

        <!-- End Logo container-->
        <div class="menu-extras">
            <div class="menu-item">
                <!-- Mobile menu toggle-->
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
                <!-- End mobile menu toggle-->
            </div>
        </div>

        <!--button Start-->
        <ul class="mb-0 list-none buy-button">
            <li class="inline mb-0">
                <a href="{{ '//' . get_static_option('fb_url') }}" target="_blank">
                    <div class="login-btn-primary">
                        <span
                            class="text-white bg-indigo-600 border-indigo-600 rounded-full btn btn-icon hover:bg-indigo-700 hover:border-indigo-700">
                            <i data-feather="facebook" class="w-6 h-6"></i>
                        </span>
                    </div>
                    <div class="login-btn-light">
                        <span
                            class="rounded-full btn btn-icon bg-gray-50 hover:bg-gray-200 dark:bg-slate-900 dark:hover:bg-gray-700 hover:border-gray-100 dark:border-gray-700 dark:hover:border-gray-700">
                            <i data-feather="facebook" class="w-6 h-6"></i>
                        </span>
                    </div>
                </a>
            </li>
            <li class="inline mb-0">
                <a href="{{ '//' . get_static_option('instagram_url') }}" target="_blank">
                    <div class="login-btn-primary">
                        <span
                            class="text-white bg-red-600 border-red-600 rounded-full btn btn-icon logo-instagram hover:bg-red-700 hover:border-red-700">
                            <i data-feather="instagram" class="w-6 h-6"></i>
                        </span>
                    </div>
                    <div class="login-btn-light">
                        <span
                            class="rounded-full btn btn-icon logo-instagram bg-gray-50 hover:bg-gray-200 dark:bg-slate-900 dark:hover:bg-gray-700 hover:border-gray-100 dark:border-gray-700 dark:hover:border-gray-700">
                            <i data-feather="instagram" class="w-6 h-6"></i>
                        </span>
                    </div>
                </a>
            </li>
            <li class="inline mb-0">
                <a href="{{ '//' . get_static_option('twitter_url') }}" target="_blank">
                    <div class="login-btn-primary">
                        <span
                            class="text-white rounded-full btn btn-icon bg-sky-600 hover:bg-sky-700 border-sky-600 hover:border-sky-700">
                            <i data-feather="twitter" class="w-6 h-6"></i>
                        </span>
                    </div>
                    <div class="login-btn-light">
                        <span
                            class="rounded-full btn btn-icon bg-gray-50 hover:bg-gray-200 dark:bg-slate-900 dark:hover:bg-gray-700 hover:border-gray-100 dark:border-gray-700 dark:hover:border-gray-700">
                            <i data-feather="twitter" class="w-6 h-6"></i>
                        </span>
                    </div>
                </a>
            </li>
        </ul>
        <!-- button End-->

        <div id="navigation">
            <div>
                Langauge : <select onchange="changeLanguage(this.value)">
                    <option
                        {{ session()->has('lang_code') ? (session()->get('lang_code') == 'en' ? 'selected' : '') : '' }}
                        value="en">English</option>
                    <option
                        {{ session()->has('lang_code') ? (session()->get('lang_code') == 'ar' ? 'selected' : '') : '' }}
                        value="ar">Arabic</option>
                    <option
                        {{ session()->has('lang_code') ? (session()->get('lang_code') == 'te' ? 'selected' : '') : '' }}
                        value="te">Telugu</option>
                </select>
            </div>
            <!-- Navigation Menu-->
            <ul class="navigation-menu nav-light">

                @foreach ($main_menu as $menuKey => $menu)
                    <li>
                        <a href="{{ isset($menu['route_name']) ? route($menu['route_name']) : 'javascript:;' }}"
                            class="{{ $first_level_active_index == $menuKey ? 'sub-menu-item' : 'sub-menu-item' }}">
                            {{ $menu['title'] }}</a>
                        @if (isset($menu['sub_menu']))
                            <span class="menu-arrow"></span>
                        @endif
                        @if (isset($menu['sub_menu']))
                            <ul class="{{ $first_level_active_index == $menuKey ? 'submenu' : '' }}">
                                @foreach ($menu['sub_menu'] as $subMenuKey => $subMenu)
                                    <li>
                                        <a href="{{ isset($subMenu['route_name']) ? route($subMenu['route_name']) : 'javascript:;' }}"
                                            class="{{ $second_level_active_index == $subMenuKey ? 'sub-menu-item' : 'sub-menu-item' }}">
                                            {{ $subMenu['title'] }}
                                            @if (isset($subMenu['sub_menu']))
                                                <span class="submenu-arrow"></span>
                                            @endif
                                        </a>
                                        @if (isset($subMenu['sub_menu']))
                                            <ul
                                                class="{{ $second_level_active_index == $subMenuKey ? 'submenu' : '' }}">
                                                @foreach ($subMenu['sub_menu'] as $lastSubMenuKey => $lastSubMenu)
                                                    <li>
                                                        <a href="{{ isset($lastSubMenu['route_name']) ? route($lastSubMenu['route_name']) : 'javascript:;' }}"
                                                            class="{{ $third_level_active_index == $lastSubMenuKey ? 'sub-menu-item' : 'sub-menu-item' }}">
                                                            {{ $lastSubMenu['title'] }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach

            </ul>
            <!--end navigation menu-->
        </div>
        <!--end navigation-->
    </div>
    <!--end container-->
</nav>
<!--end header-->
<!-- End Navbar -->

@push('scripts')
    <script>
        function toggleMenu() {
            document.getElementById("isToggle").classList.toggle("open");
            var isOpen = document.getElementById("navigation");
            if (isOpen.style.display === "block") {
                isOpen.style.display = "none";
            } else {
                isOpen.style.display = "block";
            }
        }
    </script>

    <script>
        function changeLanguage(lang) {
            window.location = '{{ url('change-language') }}/' + lang;
        }
    </script>
@endpush
