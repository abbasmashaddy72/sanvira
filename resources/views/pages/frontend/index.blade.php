<x-guest-layout>
    <x-frontend.index-container class="py-6">
        <div class="relative">
            <div class="tiny-single-item">
                @foreach ($sliders as $slider)
                    <div class="tiny-slide">
                        <a href="{{ $slider->url }}">
                            <div class="relative h-48 lg:h-96">
                                <img src="{{ asset('storage/' . $slider->image) }}"
                                    onerror="this.onerror=null; this.src='https://placehold.co/1280x320';"
                                    class="absolute inset-0 h-full w-full rounded border-none object-cover shadow"
                                    alt="{{ $slider->name }}">
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="relative mt-8 transition-all duration-500 ease-in-out">
            <div class="grid grid-cols-1">
                <div class="tiny-five-item">

                    @foreach ($featured_brands as $item)
                        <div class="tiny-slide">
                            <x-frontend.brands :item="$item" class='mx-2' />
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </x-frontend.index-container>

    <x-frontend.index-container containerTitle="{{ __('Categories') }}" class="bg-white py-14">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
            @foreach ($product_categories as $item)
                <x-frontend.category :item="$item" />
            @endforeach
        </div>

        <div class="grid grid-cols-1 justify-center">
            <div class="mt-6 text-center">
                <a href="{{ route('all_products_category') }}"
                    class="btn mr-2 mt-2 rounded-md border-blue-600 bg-blue-600 text-white hover:border-blue-700 hover:bg-blue-700">
                    {{ __('View All Categories') }}
                </a>
            </div>
        </div>
    </x-frontend.index-container>

    <x-frontend.index-container containerTitle="{{ __('Featured Brands') }}" class="py-14">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
            @foreach ($featured_brands as $item)
                <x-frontend.brands :item="$item" />
            @endforeach
        </div>

        <div class="grid grid-cols-1 justify-center">
            <div class="mt-6 text-center">
                <a href="{{ route('all_brands') }}"
                    class="btn mr-2 mt-2 rounded-md border-blue-600 bg-blue-600 text-white hover:border-blue-700 hover:bg-blue-700">
                    {{ __('View All Brands') }}
                </a>
            </div>
        </div>
    </x-frontend.index-container>
</x-guest-layout>
