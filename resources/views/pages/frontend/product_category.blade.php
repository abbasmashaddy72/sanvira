<x-guest-layout>
    @if (\Route::currentRouteName() == 'all_products_category')
        @livewire('frontend.filters.supplier-products', ['type' => 'All Category Page'])
    @else
        @livewire('frontend.filters.supplier-products', ['product_category' => $product_category, 'type' => 'Category Page'])
    @endif
</x-guest-layout>
