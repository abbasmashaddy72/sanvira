<section {{ $attributes->merge(['class' => 'relative']) }}>
    @if (!empty($type))
        <div class="relative container-fluid">
        @else
            <div class="container">
    @endif

    @if (!empty($containerTitle))
        <div class="grid grid-cols-1 @if (empty($containerSlot)) text-left @endif">
            <h3 class="mb-6 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">
                {{ $containerTitle }}</h3>
        </div>

        @if (!empty($containerSlot))
            @if (!empty($containerSlotData))
                <div class="flex justify-between">
            @endif
            <p class="text-xl font-medium leading-5 text-gray-600 dark:text-gray-400">
                {{ $containerSlot }}
            </p>
            @if (!empty($containerSlotData))
                {{ $containerSlotData }}
                </div>
            @endif
        @endif
    @endif

    {{ $slot }}
    </div>
</section>
