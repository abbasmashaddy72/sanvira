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
                <img src="{{ asset('storage/' . get_static_option('logo')) }}" class="h-20 py-2 l-dark" height="24"
                    alt="" />
                <img src="{{ asset('storage/' . get_static_option('logo')) }}" class="h-20 py-2 l-light" height="24"
                    alt="" />
            </span>
            <img src="{{ asset('storage/' . get_static_option('logo')) }}" height="24"
                class="hidden h-20 py-2 dark:inline-block" alt="" />
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
                @if (Route::has('login'))
                    <div class="hidden px-6 py-6 sm:block">
                        @auth
                            <a href="{{ route('admin.dashboard') }}"
                                class="text-sm text-gray-700 underline dark:text-gray-500">Dashboard</a>
                            @livewire('frontend.counter.rfq-counter')
                            @livewire('frontend.counter.cart-counter')
                        @else
                            <a href="{{ route('login') }}" class="text-sm text-gray-700 underline dark:text-gray-500">Log
                                in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}"
                                    class="ml-4 text-sm text-gray-700 underline dark:text-gray-500">Register</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </li>
        </ul>
        <!-- button End-->

        <div class="pt-4">
            @include('components.frontend.search')
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
