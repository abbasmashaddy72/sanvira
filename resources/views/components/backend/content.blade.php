<div>
    <div class="mt-8 flex items-center">
        <h2 class="mr-auto text-lg font-medium">
            @if (getRouteAction() == 'create')
                {{ __('Create') }} {{ $title }}
            @elseif(getRouteAction() == 'edit')
                {{ __('Edit') }} {{ $title }}
            @elseif(getRouteAction() == 'show')
                {{ __('Show') }} {{ $title }}
            @else
                {{ $title }}
            @endif
        </h2>

        @if (Route::currentRouteName() != 'admin.dashboard' && isset($top_right_button))
            <div class="mt-4 flex w-full sm:mt-0 sm:w-auto">
                {{ $top_right_button }}
            </div>
        @endif
    </div>

    {{ $slot }}
</div>
