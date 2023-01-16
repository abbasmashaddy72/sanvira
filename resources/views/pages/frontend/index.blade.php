<x-guest-layout>
    <section class="relative py-16 bg-gray-50 dark:bg-slate-800 md:py-24">

        @if (Route::has('login'))
            <div class="hidden px-6 py-4 sm:block">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline dark:text-gray-500">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline dark:text-gray-500">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="ml-4 text-sm text-gray-700 underline dark:text-gray-500">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        {{-- <div class="bg-blue-600">
            Langauge : <select onchange="changeLanguage(this.value)">
                <option {{ session()->has('lang_code') ? (session()->get('lang_code') == 'en' ? 'selected' : '') : '' }}
                    value="en">English</option>
                <option {{ session()->has('lang_code') ? (session()->get('lang_code') == 'ar' ? 'selected' : '') : '' }}
                    value="ar">Arabic</option>
                <option {{ session()->has('lang_code') ? (session()->get('lang_code') == 'te' ? 'selected' : '') : '' }}
                    value="te">Telugu</option>
            </select>
        </div> --}}
        {{ __('messages.title') }}

    </section>

    @push('scripts')
        <script>
            function changeLanguage(lang) {
                window.location = '{{ url('change-language') }}/' + lang;
            }
        </script>
    @endpush
</x-guest-layout>
