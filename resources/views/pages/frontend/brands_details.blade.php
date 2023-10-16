<x-guest-layout>
    @livewire('frontend.filters.products', ['applyFilter' => true, 'brand_id' => [$brand->id], 'page_title' => $brand->name])
</x-guest-layout>
