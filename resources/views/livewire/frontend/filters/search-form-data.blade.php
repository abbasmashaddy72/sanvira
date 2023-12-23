<div>
    <x-frontend.index-container class="py-14" containerTitle="{{ __('Categories List') }}">
        <div class="grid grid-cols-5 gap-4">
            @forelse ($categoriesList as $item)
                <x-frontend.category :item="$item" />
            @empty
                <div class="text-left">{{ __('No results!') }}</div>
            @endforelse
        </div>
    </x-frontend.index-container>
    <x-frontend.index-container class="bg-white py-14" containerTitle="{{ __('Products List') }}">
        <div class="grid grid-cols-4 gap-4">
            @forelse ($productsList as $item)
                @livewire('frontend.filters.product-view', ['item' => $item, key($item->id)])
            @empty
                <div class="text-left">{{ __('No results!') }}</div>
            @endforelse
        </div>
    </x-frontend.index-container>
</div>
