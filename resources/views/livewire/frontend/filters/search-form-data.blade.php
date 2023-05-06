<div>
    <x-frontend.index-container class="py-14" containerTitle="Categories List">
        <div class="grid grid-cols-5 gap-[30px]">
            @foreach ($categoriesList as $item)
                <x-frontend.supplier-product-category :item="$item" />
            @endforeach
        </div>
    </x-frontend.index-container>
    <x-frontend.index-container class="py-14 bg-white" containerTitle="Supplier Products List">
        <div class="grid grid-cols-4 gap-[30px]">
            @foreach ($supplierProductsList as $item)
                <x-frontend.supplier-product :item="$item" />
            @endforeach
        </div>
    </x-frontend.index-container>
    <x-frontend.index-container class="py-14" containerTitle="Supplier List">
        <div class="grid grid-cols-4 gap-[30px]">
            @foreach ($supplierList as $item)
                <x-frontend.supplier-profile :item="$item" />
            @endforeach
        </div>
    </x-frontend.index-container>
    <x-frontend.index-container class="py-14 bg-white" containerTitle="Brand List">
        <div class="grid md:grid-cols-6 grid-cols-2 justify-center gap-[30px]">
            @foreach ($brandList as $item)
                <x-frontend.brands :item="$item" />
            @endforeach
        </div>
    </x-frontend.index-container>
</div>
