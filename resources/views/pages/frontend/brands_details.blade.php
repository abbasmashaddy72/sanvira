<x-guest-layout>
    @livewire('frontend.filters.supplier-products', ['applyFilter' => true, 'brand_id' => [$brand->id], 'page_title' => $brand->name])
</x-guest-layout>