<div class="mt-8 flex items-center justify-between">
    <h2 class="inline-flex text-lg font-medium">
        @if (getRouteAction() == 'create')
            {{ __('Create') }} {{ $title }}
        @elseif(getRouteAction() == 'edit')
            {{ __('Edit') }} {{ $title }}
        @elseif(getRouteAction() == 'show')
            {{ __('Show') }} {{ $title }}
        @else
            {{ $title }}
        @endif
        @if (!empty($externalLink))
            {{ $externalLink }}
        @endif
    </h2>
    @if (Route::currentRouteName() != 'admin.dashboard' && !empty($rt_button))
        <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
            {{ $rt_button }}
        </div>
    @endif
</div>

<div class="mt-5 grid grid-cols-12 gap-5">
    {{ $slot }}
</div>
