<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div>

<nav id='topnav' class="z-10 items-center bg-white defaultscroll is-sticky">
    <div class="container">
        <a class="flex items-center pt-1 mr-4 logo" href="{{ route('homepage') }}">
            <img src="{{ asset('storage/' . get_static_option('logo')) }}" class="object-cover w-24 h-14"
                alt="Logo" />
        </a>

        <div class="menu-extras">
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

        <div class="flex items-center float-right pl-4 ml-4 space-x-3 pt-3.5">
            @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();"
                        class="p-2 font-semibold text-white bg-red-600 rounded-lg text-md">
                        Logout
                    </a>
                </form>
                @livewire('frontend.counter.rfq-counter')
                @livewire('frontend.counter.cart-counter')
            @else
                <a href="{{ route('register') }}" class="font-semibold text-gray-600 text-md">Register</a>
                <a href="{{ route('login') }}" class="px-4 py-2 font-semibold text-white bg-blue-600 rounded-lg text-md">Log
                    in</a>
            @endauth
        </div>

        <div id="navigation" class="block">
            <!-- Navigation Menu-->
            <ul class="flex flex-wrap float-left navigation-menu">
                <li>
                    <a href="{{ route('about_us') }}" class="sub-menu-item">About Us</a>
                </li>

                <li class="has-submenu parent-parent-menu-item">
                    <a href="javascript:void(0)">Resources</a><span class="menu-arrow"></span>
                    <ul class="submenu">
                        <li>
                            <a class="sub-menu-item" href="{{ route('all_products_category') }}">
                                View All Categories
                            </a>
                        </li>
                        <li>
                            <a class="sub-menu-item" href="{{ route('all_supplier_profile') }}">
                                View All Suppliers
                            </a>
                        </li>
                        <li>
                            <a class="sub-menu-item" href="{{ route('all_products') }}">
                                View All Products
                            </a>
                        </li>
                        <li>
                            <a class="sub-menu-item" href="{{ route('all_brands') }}">
                                View All Brands
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('contact_us') }}" class="sub-menu-item">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
