<x-dynamic-component :component="WireUi::component('select.option')" :value="$value" :label="$label" :description="$description" :disabled="$disabled"
    :readonly="$readonly" :option="$option">
    <div class="flex items-center gap-x-3">
        <img src="{{ data_get($option, 'src', $src) }}" class="h-6 w-6 shrink-0 rounded-full object-cover">

        <span @class(['text-sm' => (bool) $description])>
            {{ $label }}

            @if ($description)
                <div class="text-xs text-gray-400">{{ $description }}</div>
            @endif
        </span>
    </div>
</x-dynamic-component>
