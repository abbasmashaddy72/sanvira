<div>
    <x-frontend.index-container class="py-14" containerTitle="{{ __('Categories List') }}">
        <div class="grid grid-cols-5 gap-4">
            @forelse ($categoriesList as $item)
                <x-frontend.supplier-product-category :item="$item" />
            @empty
                <div class="text-left">{{ __('No results!') }}</div>
            @endforelse
        </div>
    </x-frontend.index-container>
    <x-frontend.index-container class="bg-white py-14" containerTitle="{{ __('Supplier Products List') }}">
        <div class="grid grid-cols-4 gap-4">
            @forelse ($supplierProductsList as $item)
                @livewire('frontend.filters.supplier-product-view', ['item' => $item, key($item->id)])
            @empty
                <div class="text-left">{{ __('No results!') }}</div>
            @endforelse
        </div>
    </x-frontend.index-container>
    <x-frontend.index-container class="py-14" containerTitle="{{ __('Supplier List') }}">
        <div class="grid grid-cols-4 gap-4">
            @forelse ($supplierList as $item)
                <x-frontend.supplier-profile :item="$item" />
            @empty
                <div class="text-left">{{ __('No results!') }}</div>
            @endforelse
        </div>
    </x-frontend.index-container>
    <x-frontend.index-container class="bg-white py-14" containerTitle="{{ __('Brand List') }}">
        <div class="grid grid-cols-2 justify-center gap-4 md:grid-cols-6">
            @forelse ($brandList as $item)
                <x-frontend.brands :item="$item" />
            @empty
                <div class="text-left">{{ __('No results!') }}</div>
            @endforelse
        </div>
    </x-frontend.index-container>
</div>
