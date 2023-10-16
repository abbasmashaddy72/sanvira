<x-guest-layout>
    @if (\Route::currentRouteName() == 'all_products_category')
        @livewire('frontend.filters.products', ['type' => 'All Category Page'])
    @else
        @livewire('frontend.filters.products', ['category' => $category, 'type' => 'Category Page'])
    @endif
</x-guest-layout>
