<x-frontend.index-container class="py-4 mt-16">
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
                <p class="max-w-3xl mx-auto mt-5 text-sm sm:text-md md:text-lg">
                    {{ get_static_option('short_description') }}</p>
            @endif
        </div>
        <div class="">
            <form class="relative max-w-4xl mx-auto" action="{{ url('searchForm') }}">
                <div class="relative">
                    <input type="text" name="search" min="3"
                        class="w-full h-12 py-2 pl-4 pr-12 text-black rounded-full shadow-md outline-none bg-white/60 dark:bg-slate-900/60 dark:text-white dark:shadow-gray-800 md:h-14 md:py-4 md:pl-6"
                        placeholder="Search" wire:model="query" wire:keydown.escape="resetData"
                        wire:keydown.tab="resetData" />
                    <button type="submit"
                        class="absolute top-0 right-0 h-full px-4 text-white bg-blue-600 border-blue-600 rounded-full hover:border-blue-700 hover:bg-blue-700 md:px-6">Search</button>
                </div>

                @if (!empty($query))
                    <div class="fixed top-0 bottom-0 left-0 right-0" wire:click="resetData"></div>

                    <div class="absolute z-10 w-full p-4 bg-white rounded-lg shadow-lg">
                        <div wire:loading>
                            <div class="p-4 text-left text-blue-600">{{ __('Searching...') }}</div>
                        </div>

                        <p class="text-lg font-semibold text-center text-gray-900">{{ __('Supplier Product List') }}</p>
                        @forelse ($supplierProductsList as $item)
                            <a href="{{ route('products_details', $item->id) }}"
                                class="p-4 text-left text-blue-600 hover:text-blue-800">{{ $item->title }}</a>
                        @empty
                            <div class="p-4 text-left text-blue-600">{{ __('No results!') }}</div>
                        @endforelse

                        <p class="text-lg font-semibold text-center text-gray-900">{{ __('Supplier List') }}</p>
                        @forelse ($supplierList as $item)
                            <a href="{{ route('supplier_profile', $item->id) }}"
                                class="p-4 text-left text-blue-600 hover:text-blue-800">{{ $item->company_name }}</a>
                        @empty
                            <div class="p-4 text-left text-blue-600">{{ __('No results!') }}</div>
                        @endforelse

                        <p class="text-lg font-semibold text-center text-gray-900">{{ __('Categories List') }}</p>
                        @forelse ($categoriesList as $item)
                            <a href="{{ route('products_category', $item->id) }}"
                                class="p-4 text-left text-blue-600 hover:text-blue-800">{{ $item->name }}</a>
                        @empty
                            <div class="p-4 text-left text-blue-600">{{ __('No results!') }}</div>
                        @endforelse

                        <p class="text-lg font-semibold text-center text-gray-900">{{ __('Brand List') }}</p>
                        @forelse ($brandList as $item)
                            <a href="{{ route('products_details', $item->id) }}"
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
