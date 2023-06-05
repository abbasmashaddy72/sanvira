<section {{ $attributes->merge(['class' => 'relative']) }}>
    @if (!empty($type))
        <div class="container-fluid relative">
        @else
            <div class="container">
    @endif

    @if (!empty($containerTitle))
        <div class="@if (empty($containerSlot)) text-left @endif grid grid-cols-1">
            <h3 class="mb-6 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">
                {{ $containerTitle }}</h3>
        </div>

        @if (!empty($containerSlot))
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <p class="text-xl font-medium leading-5 text-gray-600 dark:text-gray-400">
                    {{ $containerSlot }}
                </p>
                @if (!empty($containerSlotData))
                    <div class="mt-4 md:mt-0">
                        {{ $containerSlotData }}
                    </div>
                @endif
            </div>
        @endif
    @endif

    {{ $slot }}
    </div>
</section>
