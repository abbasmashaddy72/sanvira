<div>
    <x-frontend.index-container class="py-14" containerTitle="Categories List">
        <div class="grid grid-cols-5 gap-[30px]">
            @forelse ($categoriesList as $item)
                <x-frontend.supplier-product-category :item="$item" />
            @empty
                <div class="text-left">No results!</div>
            @endforelse
        </div>
    </x-frontend.index-container>
    <x-frontend.index-container class="bg-white py-14" containerTitle="Supplier Products List">
        <div class="grid grid-cols-4 gap-[30px]">
            @forelse ($supplierProductsList as $item)
                <x-frontend.supplier-product :item="$item" />
            @empty
                <div class="text-left">No results!</div>
            @endforelse
        </div>
    </x-frontend.index-container>
    <x-frontend.index-container class="py-14" containerTitle="Supplier List">
        <div class="grid grid-cols-4 gap-[30px]">
            @forelse ($supplierList as $item)
                <x-frontend.supplier-profile :item="$item" />
            @empty
                <div class="text-left">No results!</div>
            @endforelse
        </div>
    </x-frontend.index-container>
    <x-frontend.index-container class="bg-white py-14" containerTitle="Brand List">
        <div class="grid md:grid-cols-6 grid-cols-2 justify-center gap-[30px]">
            @forelse ($brandList as $item)
                <x-frontend.brands :item="$item" />
            @empty
                <div class="text-left">No results!</div>
            @endforelse
        </div>
    </x-frontend.index-container>
</div>
