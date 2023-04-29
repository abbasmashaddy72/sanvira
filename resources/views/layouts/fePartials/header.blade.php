<div id="preloader">
    <div id="status">
        <div class="spinner">
            <div class="double-bounce1"></div>
            <div class="double-bounce2"></div>
        </div>
    </div>
</div>

<header class="fixed top-0 left-0 z-10 w-full px-12 py-2 text-white bg-white drop-shadow-2xl">
    <nav class="flex items-center justify-between mx-auto">
        <a href="{{ route('homepage') }}">
            <img src="{{ asset('storage/' . get_static_option('logo')) }}" height="24" class="h-12 py-2"
                alt="Logo" />
        </a>
        @livewire('frontend.form.search', ['type' => 'header'])
        <div class="flex items-center space-x-3">
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
    </nav>
</header>

@push('scripts')
    <script>
        const header = document.querySelector('header');
        const searchForm = header.querySelector('form');

        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                searchForm.classList.remove('hidden');
                searchForm.classList.add('transition-opacity', 'opacity-0', 'opacity-100');
            } else {
                searchForm.classList.add('hidden');
            }
        });
    </script>
@endpush
