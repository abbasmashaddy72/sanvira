<section class="relative py-16 md:py-12">
    @if (!empty($type))
        <div class="relative container-fluid">
        @else
            <div class="container">
    @endif

    @if (!empty($containerTitle))
        <div class="grid grid-cols-1 @if (empty($containerSlot)) pb-8 text-center @endif">
            <h3 class="mb-6 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">
                {{ $containerTitle }}</h3>
        </div>

        @if (!empty($containerSlot))
            <p class="text-xl font-medium leading-5 text-gray-600 dark:text-gray-400">
                {{ $containerSlot }}
            </p>
        @endif
    @endif

    {{ $slot }}
    </div>
</section>
