<x-guest-layout>
    <x-frontend.index-container class="py-6">
        <div class="relative">
            <div class="tiny-single-item">
                @foreach ($sliders as $slider)
                    <div class="tiny-slide">
                        <a href="{{ $slider->url }}">
                            <img src="{{ asset('storage/' . $slider->image) }}"
                                class="object-cover w-full align-middle border-none rounded shadow h-96"
                                alt="{{ $slider->name }}">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="relative mt-8 transition-all duration-500 ease-in-out">
            <div class="grid grid-cols-1">
                <div class="tiny-five-item">

                    @foreach ($featured_suppliers as $item)
                        <div class="tiny-slide">
                            <x-frontend.supplier-profile :item="$item" class='mx-2' />
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </x-frontend.index-container>

    <x-frontend.index-container containerTitle='Categories' class="bg-white py-14">
        <div class="grid grid-cols-5 gap-[30px]">
            @foreach ($product_categories as $item)
                <x-frontend.supplier-product-category :item="$item" />
            @endforeach
        </div>

        <div class="grid justify-center grid-cols-1">
            <div class="mt-6 text-center">
                <a href="{{ route('all_products_category') }}"
                    class="mt-2 mr-2 text-white bg-blue-600 border-blue-600 rounded-md btn hover:bg-blue-700 hover:border-blue-700">
                    View All Categories
                </a>
            </div>
        </div>
    </x-frontend.index-container>

    <x-frontend.index-container containerTitle='Featured Brands' class="py-14">
        <div class="grid grid-cols-4 gap-4">
            @foreach ($featured_brands as $item)
                <x-frontend.brands :item="$item" />
                @if ($loop->iteration == 4)
        </div>
        <div class="grid grid-cols-5 gap-4 mt-4">
            @endif
            @endforeach
        </div>

        <div class="grid justify-center grid-cols-1">
            <div class="mt-6 text-center">
                <a href="{{ route('all_brands') }}"
                    class="mt-2 mr-2 text-white bg-blue-600 border-blue-600 rounded-md btn hover:bg-blue-700 hover:border-blue-700">
                    View All Brands
                </a>
            </div>
        </div>
    </x-frontend.index-container>

    <x-frontend.index-container containerTitle='Featured Suppliers' class="bg-white py-14">
        <div class="grid grid-cols-4 gap-4">
            @foreach ($featured_suppliers as $item)
                <x-frontend.supplier-profile :item="$item" />
                @if ($loop->iteration == 4)
        </div>
        <div class="grid grid-cols-5 gap-4 mt-4">
            @endif
            @endforeach
        </div>

        <div class="grid justify-center grid-cols-1">
            <div class="mt-6 text-center">
                <a href="{{ route('all_supplier_profile') }}"
                    class="mt-2 mr-2 text-white bg-blue-600 border-blue-600 rounded-md btn hover:bg-blue-700 hover:border-blue-700">
                    View All Suppliers
                </a>
            </div>
        </div>
    </x-frontend.index-container>

    <x-frontend.index-container containerTitle='On Sale Products' class="py-14">
        <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 gap-[30px]">
            @foreach ($on_sale_products as $item)
                @livewire('frontend.filters.supplier-product-view', ['item' => $item, key($item->id)])
            @endforeach
        </div>

        <div class="grid justify-center grid-cols-1">
            <div class="mt-6 text-center">
                <a href="{{ route('all_products') }}"
                    class="mt-2 mr-2 text-white bg-blue-600 border-blue-600 rounded-md btn hover:bg-blue-700 hover:border-blue-700">
                    View All Products
                </a>
            </div>
        </div>
    </x-frontend.index-container>
</x-guest-layout>
