<x-guest-layout>
    <x-frontend.index-container>
        <div class="flex flex-wrap justify-center">
            <img src="{{ asset('storage/' . get_static_option('home_image')) }}" alt="..."
                class="object-cover w-full align-middle border-none rounded shadow h-96" />
        </div>
    </x-frontend.index-container>
    <x-frontend.index-container containerTitle='Categories'>
        <div class="grid grid-cols-5 gap-[30px]">
            @foreach ($product_categories as $item)
                <x-frontend.supplier-product-category :item="$item" />
            @endforeach
        </div>

        <div class="grid justify-center grid-cols-1">
            <div class="mt-6 text-center">
                <a href="{{ route('all_products_category') }}"
                    class="mt-2 mr-2 text-white bg-indigo-600 border-indigo-600 rounded-md btn hover:bg-indigo-700 hover:border-indigo-700">See
                    More <i class="uil uil-arrow-right"></i></a>
            </div>
        </div>
    </x-frontend.index-container>

    <x-frontend.index-container containerTitle='Supplier Stores'>
        <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
            @foreach ($suppliers as $item)
                <x-frontend.supplier-profile :item="$item" />
            @endforeach
        </div>

        <div class="grid justify-center grid-cols-1">
            <div class="mt-6 text-center">
                <a href="{{ route('all_supplier_profile') }}"
                    class="mt-2 mr-2 text-white bg-indigo-600 border-indigo-600 rounded-md btn hover:bg-indigo-700 hover:border-indigo-700">See
                    More <i class="uil uil-arrow-right"></i></a>
            </div>
        </div>
    </x-frontend.index-container>

    <x-frontend.index-container containerTitle='Featured Products'>
        <div class="grid lg:grid-cols-4 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
            @foreach ($featured_products as $item)
                <x-frontend.supplier-product :item="$item" />
            @endforeach
        </div>

        <div class="justify-center mt-6 text-center md:flex">
            <div class="md:w-full">
                <a href="{{ route('all_products') }}"
                    class="text-indigo-600 duration-500 ease-in-out btn btn-link hover:text-indigo-600 after:bg-indigo-600">View
                    More Products <i class="ml-1 uil uil-arrow-right"></i></a>
            </div>
        </div>
    </x-frontend.index-container>


    <x-frontend.index-container containerTitle='Some of our top brands'>
        <div class="grid md:grid-cols-6 grid-cols-2 justify-center gap-[30px]">
            @foreach ($top_brands as $item)
                <div class="">
                    <img src="{{ asset('storage/' . $item->image) }}"
                        class="object-cover w-full h-16 mx-auto rounded-lg" alt="">
                </div>
            @endforeach
        </div>
    </x-frontend.index-container>

    <x-frontend.index-container>
        <div class="grid grid-cols-1 text-center">
            <h3 class="mb-4 text-2xl font-semibold leading-normal md:text-3xl md:leading-normal">Have Question ?
                Get in touch!</h3>

            <div class="mt-6">
                <a href="{{ route('contact_us') }}"
                    class="text-white bg-indigo-600 border-indigo-600 rounded-md btn hover:bg-indigo-700 hover:border-indigo-700"><i
                        class="mr-2 align-middle uil uil-phone"></i> Contact us</a>
            </div>
        </div>
    </x-frontend.index-container>
</x-guest-layout>
