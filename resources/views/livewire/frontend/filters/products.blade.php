<div>
    <x-frontend.index-container class="{{ $type !== 'Profile Page' ? 'py-14' : '' }}" containerTitle="{{ $page_title }}"
        containerSlot="{{ $products->total() }} Products">

        <x-slot name='containerSlotData'>
            <div class="inline-flex items-center gap-2">
                <x-input wire:model.live="search" name="search" placeholder="Search Product" type="text"
                    class="bg-white" />
                <button wire:click="applyButton('onSale')" {{ $setButton === 'onSale' ? 'disabled' : '' }}
                    class="@if ($setButton === 'onSale') border-blue-600 text-blue-600 @else border-gray-200 text-gray-700 @endif whitespace-nowrap rounded-lg border-2 bg-white px-2 py-2 font-medium hover:border-2 hover:border-blue-600 hover:text-blue-600">{{ __('On Sale') }}</button>
                <button wire:click="applyButton('relevance')" {{ $setButton === 'relevance' ? 'disabled' : '' }}
                    class="@if ($setButton === 'relevance') border-blue-600  whitespace-nowrap @else border-gray-200 text-gray-700 @endif whitespace-nowrap rounded-lg border-2 bg-white px-2 py-2 font-medium hover:border-2 hover:border-blue-600 hover:text-blue-600">{{ __('Relevance') }}</button>
            </div>
        </x-slot>

        <div wire:loading wire:target="applyButton">
            <div class="flex justify-center">
                <svg aria-hidden="true" class="mr-2 h-8 w-8 animate-spin fill-blue-600 text-gray-200 dark:text-gray-600"
                    viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z"
                        fill="currentColor" />
                    <path
                        d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z"
                        fill="currentFill" />
                </svg>
                <span class="sr-only">{{ __('Loading...') }}</span>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 md:grid-cols-12">
            <div class="md:col-span-3 lg:col-span-3">
                <div class="sticky top-20 mt-8 rounded-md border-2 border-gray-200 bg-white p-4 shadow">
                    <div class="flex justify-between">
                        <button wire:click="clearFilters"
                            class="rounded-lg bg-red-600 px-2 py-2 font-bold text-white hover:bg-red-700">{{ __('Clear') }}</button>
                        <button wire:click="apply"
                            class="rounded-lg bg-blue-600 px-2 py-2 font-bold text-white hover:bg-blue-700">{{ __('Apply') }}</button>
                    </div>
                    <div class="mt-4">
                        <h5 class="text-md text-left font-semibold dark:bg-slate-800 dark:shadow-gray-800">
                            {{ __('Brand') }}</h5>
                        <x-select wire:model="brand_id" placeholder="Select Brand" :async-data="route('api.admin.brands')" option-label="name"
                            option-value="id" multiselect />
                    </div>
                    <div class="mt-4">
                        <h5 class="text-md text-left font-semibold dark:bg-slate-800 dark:shadow-gray-800">
                            {{ __('Category') }}</h5>
                        <x-select wire:model="category_id" placeholder="Select Parent Category" :async-data="route('api.admin.categories')"
                            option-label="name" option-value="id" multiselect />
                    </div>
                    <div class="mt-4">
                        <h5 class="text-md text-left font-semibold dark:bg-slate-800 dark:shadow-gray-800">
                            {{ __('Country of Origin') }}</h5>
                        <x-select wire:model="country_id" placeholder="Select Origin Country" :async-data="route('api.admin.countries')"
                            option-label="name" option-value="id" multiselect />
                    </div>
                </div>
            </div>

            <div class="md:col-span-9 lg:col-span-9">
                <div class="mt-8 grid grid-cols-1 gap-4 md:grid-cols-3 lg:grid-cols-4">
                    @foreach ($products as $item)
                        <div
                            class="group relative overflow-hidden rounded-md border-2 border-gray-200 bg-white shadow duration-500 ease-in-out hover:border-2 hover:border-blue-600 hover:shadow-xl dark:bg-slate-900 dark:shadow-gray-800 dark:hover:shadow-xl dark:hover:shadow-gray-700">
                            <a href="{{ route('products_details', ['slug' => $item->slug]) }}">
                                <div class="relative" wire:ignore>
                                    <img class="h-40 w-full object-cover p-2"
                                        src="{{ asset('storage/' . $item->images[0]) }}" alt=""
                                        onerror="this.onerror=null; this.src='https://placehold.co/1280x625';">
                                    @if ($item->on_sale)
                                        <span
                                            class="text-md absolute -right-14 top-4 w-40 rotate-45 bg-yellow-400 text-center font-semibold text-white">
                                            {{ __('On Sale') }}
                                        </span>
                                    @endif

                                    @if (count($item->variations) > 0)
                                        <span
                                            class="absolute left-0 top-0 ml-2 mt-2 inline-flex rounded-lg bg-green-500 px-3 py-2 text-sm font-medium text-white">
                                            {{ __('In Stock') }}
                                        </span>
                                    @endif
                                </div>

                                <div class="flex items-center justify-between border-b border-gray-300 px-6 py-2">
                                    <div
                                        class="truncate text-lg font-semibold duration-500 ease-in-out hover:text-blue-600">
                                        {{ $item->title }}</div>
                                </div>
                                <div class="flex items-center justify-between px-6 py-2">
                                    <div class="text-md truncate font-semibold duration-500 ease-in-out">
                                        {{ __('Product Views') }}</div>
                                    <div class="text-md truncate font-semibold duration-500 ease-in-out">
                                        {{ $item->productViews->sum('clicks') ?? 0 }}+</div>
                                </div>
                                <div class="flex items-center justify-between px-6 py-2">
                                    <div class="text-md truncate font-semibold duration-500 ease-in-out">
                                        {{ __('Product Views') }}</div>
                                    <div class="text-md truncate font-semibold duration-500 ease-in-out">
                                        {{ $item->productViews->sum('clicks') ?? 0 }}+</div>
                                </div>
                                <div class="flex items-center justify-between px-6 py-2">
                                    <div class="text-md truncate font-semibold duration-500 ease-in-out">
                                        {{ __('Product Views') }}</div>
                                    <div class="text-md truncate font-semibold duration-500 ease-in-out">
                                        {{ $item->productViews->sum('clicks') ?? 0 }}+</div>
                                </div>
                                <div class="flex items-center justify-between px-6 py-2">
                                    <div class="text-md truncate font-semibold duration-500 ease-in-out">
                                        {{ __('Product Views') }}</div>
                                    <div class="text-md truncate font-semibold duration-500 ease-in-out">
                                        {{ $item->productViews->sum('clicks') ?? 0 }}+</div>
                                </div>
                                <div class="flex items-center justify-between px-6 py-2">
                                    <div class="text-md truncate font-semibold duration-500 ease-in-out">
                                        {{ __('Product Views') }}</div>
                                    <div class="text-md truncate font-semibold duration-500 ease-in-out">
                                        {{ $item->productViews->sum('clicks') ?? 0 }}+</div>
                                </div>
                                <div class="flex items-center justify-between px-6 py-2">
                                    <div class="text-md truncate font-semibold duration-500 ease-in-out">
                                        {{ __('Product Views') }}</div>
                                    <div class="text-md truncate font-semibold duration-500 ease-in-out">
                                        {{ $item->productViews->sum('clicks') ?? 0 }}+</div>
                                </div>
                            </a>
                            <div class="my-2 flex justify-center">
                                <button wire:click='openOverlay({{ $item->id }})'
                                    class="rounded bg-blue-600 px-4 py-2 font-medium text-white transition duration-300 ease-in-out hover:bg-blue-700">
                                    Add to RFQ
                                </button>
                                @if ($overlayVisible && $selectedProductId === $item->id)
                                    <div
                                        class="absolute left-0 top-0 h-full w-full rounded-md border-2 border-blue-600 bg-black bg-opacity-50 hover:border-0">
                                        <div class="flex h-full flex-col items-center justify-center">
                                            <div class="h-full w-full max-w-md bg-white p-2">
                                                <h2 class="mb-2 border-b-2 border-gray-300 text-lg font-semibold">
                                                    {{ $item->title }}</h2>
                                                <!-- Variation Selection -->
                                                <x-native-select label="Brand" wire:model.live='variation_brand_id'>
                                                    <option value="">Select Brand</option>
                                                    @foreach ($variations->pluck('brand')->unique('id') as $brand)
                                                        <option value="{{ $brand->id }}">{{ $brand->name }}
                                                        </option>
                                                    @endforeach
                                                </x-native-select>

                                                <div class="grid grid-cols-2 gap-1">
                                                    @if (count($sizes) > 0)
                                                        <x-native-select label="Size" wire:model='variation_size_id'>
                                                            @foreach ($sizes as $size)
                                                                <option value="{{ $size }}"
                                                                    @if ($loop->index == 0) selected @endif>
                                                                    {{ $size }}
                                                                </option>
                                                            @endforeach
                                                        </x-native-select>
                                                    @endif

                                                    @if (count($weights) > 0)
                                                        <x-native-select label="Weight"
                                                            wire:model='variation_weight_id'>
                                                            @foreach ($weights as $weight)
                                                                <option value="{{ $weight }}"
                                                                    @if ($loop->index == 0) selected @endif>
                                                                    {{ $weight }}
                                                                </option>
                                                            @endforeach
                                                        </x-native-select>
                                                    @endif

                                                    @if (count($diameters) > 0)
                                                        <x-native-select label="Diameter"
                                                            wire:model='variation_diameter_id'>
                                                            @foreach ($diameters as $diameter)
                                                                <option value="{{ $diameter }}"
                                                                    @if ($loop->index == 0) selected @endif>
                                                                    {{ $diameter }}
                                                                </option>
                                                            @endforeach
                                                        </x-native-select>
                                                    @endif

                                                    @if (count($quantities) > 0)
                                                        <x-native-select label="Quantity"
                                                            wire:model='variation_quantity_type_id'>
                                                            @foreach ($quantities as $quantity)
                                                                <option value="{{ $quantity }}"
                                                                    @if ($loop->index == 0) selected @endif>
                                                                    {{ $quantity }}
                                                                </option>
                                                            @endforeach
                                                        </x-native-select>
                                                    @endif

                                                    @if (count($colors) > 0)
                                                        <x-native-select label="Color"
                                                            wire:model='variation_color_id'>
                                                            @foreach ($colors as $color)
                                                                <option value="{{ $color }}"
                                                                    @if ($loop->index == 0) selected @endif>
                                                                    {{ $color }}
                                                                </option>
                                                            @endforeach
                                                        </x-native-select>
                                                    @endif

                                                    @if (count($itemTypes) > 0)
                                                        <x-native-select label="Item Type"
                                                            wire:model='variation_item_type_id'>
                                                            @foreach ($itemTypes as $type)
                                                                <option value="{{ $type }}"
                                                                    @if ($loop->index == 0) selected @endif>
                                                                    {{ $type }}
                                                                </option>
                                                            @endforeach
                                                        </x-native-select>
                                                    @endif
                                                </div>

                                                <x-input label='Quantity' wire:model='quantity' type='number' />
                                                <x-input label="You Price" placeholder="Our Price: 89999"
                                                    wire:model='price' type='number' />

                                                <!-- Add to RFQ -->
                                                <div class="absolute bottom-2 left-0 right-0 text-center">
                                                    <button wire:click="addToRfq({{ $item->id }})"
                                                        class="rounded bg-blue-600 px-4 py-2 font-medium text-white transition duration-300 ease-in-out hover:bg-blue-700">
                                                        Add to RFQ
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-8">
                    @if ($products !== [])
                        @if ($agent->isTablet() === 1)
                            {{ $products->onEachSide(0)->links() }}
                        @else
                            {{ $products->links() }}
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </x-frontend.index-container>
</div>
