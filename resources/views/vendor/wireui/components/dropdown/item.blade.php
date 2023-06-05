@if ($separator)
    <div class="border-secondary-200 dark:border-secondary-600 my-1 w-full border-t"></div>
@endif

<a {{ $attributes->merge(['class' => $getClasses()]) }}>
    @if ($icon)
        <x-dynamic-component :component="WireUi::component('icon')" :name="$icon" class="mr-2 h-5 w-5" />
    @endif

    {{ $label ?? $slot }}
</a>
