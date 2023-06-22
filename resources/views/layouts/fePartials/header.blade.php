<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div>

<nav id='topnav' class="defaultscroll is-sticky nav-sticky z-10 items-center bg-white py-2">
    <div class="container">
        <a class="logo mr-4 flex items-center pt-1" href="{{ route('homepage') }}">
            <img src="{{ asset('storage/' . get_static_option('logo')) }}" class="h-14 w-24 object-cover"
                alt="Logo" />
        </a>

        <div class="menu-extras float-right">
            <div class="menu-item">
                <a class="navbar-toggle" id="isToggle" onclick="toggleMenu()">
                    <div class="lines">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </a>
            </div>
        </div>

        <div class="@auth pt-5 lg:pt-4 @else pt-4 lg:pt-3 @endauth float-right flex items-center space-x-3">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                        class="text-md rounded-lg bg-red-600 p-2 font-semibold text-white">
                        {{ __('Logout') }}
                    </a>
                </form>
            @else
                <a href="{{ route('register') }}" class="text-md font-semibold text-gray-600">{{ __('Register') }}</a>
                <a href="{{ route('login') }}" class="text-md rounded-lg bg-blue-600 px-4 py-2 font-semibold text-white">
                    {{ __('Log in') }}</a>
            @endauth
        </div>

        <div id="navigation" class="lg:block">
            <ul class="navigation-menu float-left flex flex-wrap">
                <li class="has-submenu parent-menu-item">
                    <a href="javascript:void(0)">{{ __('Resources') }}</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li>
                            <a class="sub-menu-item" href="{{ route('all_products_category') }}">
                                {{ __('View All Categories') }}
                            </a>
                        </li>
                        <li>
                            <a class="sub-menu-item" href="{{ route('all_supplier_profile') }}">
                                {{ __('View All Suppliers') }}
                            </a>
                        </li>
                        <li>
                            <a class="sub-menu-item" href="{{ route('all_products') }}">
                                {{ __('View All Products') }}
                            </a>
                        </li>
                        <li>
                            <a class="sub-menu-item" href="{{ route('all_brands') }}">
                                {{ __('View All Brands') }}
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('about_us') }}" class="sub-menu-item">{{ __('About Us') }}</a>
                </li>

                <li>
                    <a href="{{ route('contact_us') }}" class="sub-menu-item">{{ __('Contact Us') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

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
@endpush
