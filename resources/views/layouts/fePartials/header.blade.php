<nav id='topnav' class="defaultscroll is-sticky nav-sticky z-10 items-center bg-white py-2">
    <div class="container">
        <a class="logo" href="{{ route('homepage') }}">
            <img src="{{ asset('storage/' . get_static_option('logo')) }}" class="inline-block h-8 w-auto"
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

        <div id="navigation" class="lg:block">
            <ul class="navigation-menu flex flex-wrap justify-center">
                <li>
                    <a class="sub-menu-item" href="{{ route('homepage') . '#testimonials' }}">
                        {{ __('Testimonials') }}
                    </a>
                </li>
                <li>
                    <a class="sub-menu-item" href="{{ route('homepage') . '#faqs' }}">
                        {{ __('FAQs') }}
                    </a>
                </li>
                <li>
                    <a class="sub-menu-item" href="{{ route('blogs') }}">{{ __('Blogs') }}</a>
                </li>
                <li>
                    <a class="sub-menu-item" href="{{ route('contact_us') }}">{{ __('Contact Us') }}</a>
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
