<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="{{ asset('dist/images/logo.svg') }}" rel="shortcut icon" type="image/svg+xml">

    <title>
        @if (getRouteAction() == 'create')
            {{ __('Create') . ' ' . $title . ' | ' ?? '' }}
        @elseif(getRouteAction() == 'edit')
            {{ __('Edit') . ' ' . $title . ' | ' ?? '' }}
        @elseif(getRouteAction() == 'show')
            {{ __('Show') . ' ' . $title . ' | ' ?? '' }}
        @else
            {{ $title . ' | ' ?? '' }}
        @endif
        {{ config('app.name', 'Laravel') }}
    </title>

    {{ Vite::useBuildDirectory('build/backend') }}
    @wireUiScripts
    @vite('resources/js/backend/app.js')
    @stack('styles')
    @livewireStyles
</head>

<body class="@if (app('impersonate')->isImpersonating()) border-4 border-warning @endif soft-scrollbar py-5">
    <x-notifications />
    <x-dialog z-index="z-50" blur="md" align="center" />
    @include('layouts.bePartials.mobile-menu')

    <div class="flex">

        @include('layouts.bePartials.side-menu')

        <div class="content">
            @include('layouts.bePartials.top-bar')
            {{ $slot }}
        </div>

    </div>

    @livewireScripts
    @persist('div')
        @livewire('wire-elements-modal')
    @endpersist
    @stack('scripts')
    @livewireChartsScripts
    {{-- modalwidth comment for tailwind purge, used widths: sm:max-w-sm sm:max-w-md sm:max-w-lg sm:max-w-xl sm:max-w-2xl sm:max-w-3xl sm:max-w-4xl sm:max-w-5xl sm:max-w-6xl sm:max-w-7xl md:max-w-sm md:max-w-md md:max-w-lg md:max-w-xl md:max-w-2xl md:max-w-3xl md:max-w-4xl md:max-w-5xl md:max-w-6xl md:max-w-7xl lg:max-w-sm lg:max-w-md lg:max-w-lg lg:max-w-xl lg:max-w-2xl lg:max-w-3xl lg:max-w-4xl lg:max-w-5xl lg:max-w-6xl lg:max-w-7xl xl:max-w-sm xl:max-w-md xl:max-w-lg xl:max-w-xl xl:max-w-2xl xl:max-w-3xl xl:max-w-4xl xl:max-w-5xl xl:max-w-6xl xl:max-w-7xl 2xl:max-w-sm 2xl:max-w-md 2xl:max-w-lg 2xl:max-w-xl 2xl:max-w-2xl 2xl:max-w-3xl 2xl:max-w-4xl 2xl:max-w-5xl 2xl:max-w-6xl 2xl:max-w-7xl --}}
</body>

</html>
