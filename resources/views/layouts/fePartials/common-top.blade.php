<x-frontend.index-container class="mt-16"> Common
    <div class="grid items-center justify-center h-32 grid-cols-2 text-center">
        <div class="">
            <h1 class="text-xl font-bold leading-normal lg:leading-normal lg:text-3xl">Your <span
                    class="text-indigo-600">SuperCharged</span>
                Procurement Marketplace</h1>
        </div>

        <div class="mt-6 mb-3">
            @livewire('frontend.form.search')
        </div>
    </div>
</x-frontend.index-container>

<x-frontend.index-container class="mt-16"> Index
    <div class="grid items-center justify-center grid-cols-1 text-center h-80">
        <div class="">
            <h1 class="mb-5 text-4xl font-bold leading-normal lg:leading-normal lg:text-5xl">Your <span
                    class="text-indigo-600">SuperCharged</span>
                Procurement Marketplace</h1>
            <p class="max-w-xl mx-auto text-lg">Reinventing the way organization procure by digitizing
                construction commerce using state of art technology</p>
        </div>

        <div class="mt-6 mb-3">
            @livewire('frontend.form.search')
        </div>
    </div>
</x-frontend.index-container>

<x-frontend.index-container class="mt-16">
    <div
        class="grid items-center justify-center text-center @if ($type == 'common-top') grid-cols-2 h-32 @else grid-cols-1 h-80 @endif">
        <div class="">
            <h1
                class="text-4xl font-bold leading-normal lg:leading-normal @if ($type == 'common-top') lg:text-3xl @else lg:text-5xl @endif">
                Your
                <span class="text-indigo-600">SuperCharged</span>
                Procurement Marketplace
            </h1>
            @if ($type == 'common-top')
            @else
                <p class="max-w-xl mx-auto mt-5 text-lg">Reinventing the way organization procure by digitizing
                    construction commerce using state of art technology</p>
            @endif
        </div>
        <div class="">
            @livewire('frontend.form.search')
        </div>
    </div>
</x-frontend.index-container>
