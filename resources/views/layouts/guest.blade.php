<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="{{ $dark_mode ? 'dark' : '' }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('assets/logo.svg') }}" rel="shortcut icon" type="image/svg+xml">

    <title>
        @if (\Route::currentRouteName() != 'homepage')
            {{ $title . ' | ' ?? '' }}
        @endif
        {{ config('app.name', 'Laravel') }}
    </title>

    @wireUiScripts
    @vite('resources/js/frontend/app.js')
    @stack('styles')
    @livewireStyles
</head>

<body class="text-base text-black bg-gray-100 font-nunito dark:text-white dark:bg-slate-900">

    @include('layouts.fePartials.header')

    @if (!empty($topSection))
        {{ $topSection }}
    @else
        @if (\Route::currentRouteName() != 'homepage')
            @livewire('frontend.form.search', ['type' => 'common-top'])
        @else
            @livewire('frontend.form.search')
        @endif
        @if (\Route::currentRouteName() != 'contact_us')
            @include('layouts.fePartials.sub-nav')
        @endif
    @endif

    {{ $slot }}

    @include('layouts.fePartials.footer')

    @livewireScripts
    @livewire('livewire-ui-modal')
    @env('production')
    <script>
        // Disable right-click
        document.addEventListener('contextmenu', (e) => e.preventDefault());

        function ctrlShiftKey(e, keyCode) {
            return e.ctrlKey && e.shiftKey && e.keyCode === keyCode.charCodeAt(0);
        }

        document.onkeydown = (e) => {
            // Disable F12, Ctrl + Shift + I, Ctrl + Shift + J, Ctrl + U
            if (
                event.keyCode === 123 ||
                ctrlShiftKey(e, 'I') ||
                ctrlShiftKey(e, 'J') ||
                ctrlShiftKey(e, 'C') ||
                (e.ctrlKey && e.keyCode === 'U'.charCodeAt(0))
            )
                return false;
        };
    </script>
    @endenv
    @stack('scripts')
</body>

</html>
