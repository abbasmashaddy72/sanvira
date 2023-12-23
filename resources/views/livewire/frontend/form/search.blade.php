<x-frontend.index-container class="mt-16 py-4">
    <div
        class="@if ($type == 'common-top') grid-cols-1 lg:grid-cols-2 h-32 @else grid-cols-1 h-80 @endif m-auto grid items-center justify-center text-center">
        <div class="">
            <h1
                class="@if ($type == 'common-top') text-lg md:text-3xl @else lg:text-5xl @endif text-3xl font-bold leading-normal lg:leading-normal">
                {{ __('Your') }}
                <span class="text-blue-600">{{ __('SuperCharged') }}</span>
                {{ __('Construction Marketplace!') }}
            </h1>
            @if ($type == 'common-top')
            @else
                <p class="sm:text-md mx-auto mt-5 max-w-3xl text-sm md:text-lg">
                    {{ get_static_option('short_description') }}</p>
            @endif
        </div>
        <div class="">
            <form class="relative mx-auto max-w-4xl" action="{{ url('searchForm') }}">
                <div class="relative">
                    <input type="text" name="search" min="3"
                        class="h-12 w-full rounded-full bg-white/60 py-2 pl-4 pr-12 text-black shadow-md outline-none dark:bg-slate-900/60 dark:text-white dark:shadow-gray-800 md:h-14 md:py-4 md:pl-6"
                        placeholder="Search" wire:model.live="query" wire:keydown.escape="resetData"
                        wire:keydown.tab="resetData" />
                    <button type="submit"
                        class="absolute right-0 top-0 h-full rounded-full border-blue-600 bg-blue-600 px-4 text-white hover:border-blue-700 hover:bg-blue-700 md:px-6">Search</button>
                </div>

                @if (!empty($query))
                    <div class="fixed bottom-0 left-0 right-0 top-0" wire:click="resetData"></div>

                    <div class="absolute z-10 w-full rounded-lg bg-white p-4 shadow-lg">
                        <div wire:loading>
                            <div class="p-4 text-left text-blue-600">{{ __('Searching...') }}</div>
                        </div>

                        <p class="text-center text-lg font-semibold text-gray-900">{{ __('Product List') }}</p>
                        @forelse ($productsList as $item)
                            <a href="{{ route('products_details', $item->id) }}"
                                class="p-4 text-left text-blue-600 hover:text-blue-800">{{ $item->title }}</a>
                        @empty
                            <div class="p-4 text-left text-blue-600">{{ __('No results!') }}</div>
                        @endforelse

                        <p class="text-center text-lg font-semibold text-gray-900">{{ __('Categories List') }}</p>
                        @forelse ($categoriesList as $item)
                            <a href="{{ route('products_category', $item->id) }}"
                                class="p-4 text-left text-blue-600 hover:text-blue-800">{{ $item->name }}</a>
                        @empty
                            <div class="p-4 text-left text-blue-600">{{ __('No results!') }}</div>
                        @endforelse
                    </div>
                @endif
            </form>
        </div>
    </div>
</x-frontend.index-container>
