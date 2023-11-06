@if ($type != 'Product Details Page')
    <div
        class="group overflow-hidden rounded-md border-2 border-gray-200 bg-white shadow duration-500 ease-in-out hover:border-2 hover:border-blue-600 hover:shadow-xl dark:bg-slate-900 dark:shadow-gray-800 dark:hover:shadow-xl dark:hover:shadow-gray-700">
        <a href="{{ route('products_details', ['slug' => $item->slug]) }}">
            <div class="relative">
                <img class="h-40 w-full object-cover" src="{{ asset('storage/' . $item->images[0]) }}" alt=""
                    onerror="this.onerror=null; this.src='https://placehold.co/1280x625';">
                @if ($item->on_sale)
                    <span
                        class="text-md absolute -right-14 top-4 w-40 rotate-45 bg-yellow-400 text-center font-semibold text-white">
                        {{ __('On Sale') }}
                    </span>
                @endif

                @if ($item->avb_stock > 0)
                    <span
                        class="absolute left-0 top-0 ml-2 mt-2 inline-flex rounded-lg bg-green-500 px-3 py-2 text-sm font-medium text-white">
                        {{ __('In Stock') }}
                    </span>
                @endif

                @if ($item->productViews->count() > 0)
                    <span
                        class="absolute bottom-0 left-0 mb-2 ml-2 inline-flex rounded-lg bg-blue-600 p-2 text-sm font-medium text-white">
                        {{ $item->productViews->count() }}+
                    </span>
                @endif
            </div>

            <div class="flex items-center justify-between border-b border-gray-300 px-6 py-2">
                <div class="truncate text-lg font-semibold duration-500 ease-in-out hover:text-blue-600">
                    {{ $item->title }}</div>
            </div>
        </a>
    </div>

    {{-- <div>
        <div class="relative max-w-sm bg-white rounded-lg shadow-md dark:border-gray-700 dark:bg-gray-800">
            <a href="#">
                <img class="p-8 rounded-t-lg" src="https://i.ibb.co/KqdgGY4/cosmetic-packaging-mockup-1150-40280.webp"
                    alt="item image">
            </a>
            <div class="px-5 pb-5">
                <a href="#">
                    <h3 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{ $item->title }}
                    </h3>
                </a>
                <div class="mb-5 mt-2.5 flex items-center">
                    <!-- Rating icons -->
                </div>
                <div class="flex items-center justify-between">
                    <span class="text-3xl font-bold text-gray-900 dark:text-white">$599</span>
                    <button onclick="toggleModal('{{ $item->id }}')"
                        class="rounded-lg bg-blue-700 px-5 py-2.5 text-center text-sm font-medium text-white hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add
                        to cart</button>
                </div>

                <!-- Overlay for each item -->
                <div id="overlay_{{ $item->id }}"
                    class="absolute top-0 left-0 hidden w-full h-full bg-black bg-opacity-50">
                    <div class="flex items-center justify-center h-full">
                        <div class="max-w-md p-8 bg-white rounded-lg">
                            <h2 class="mb-4 text-2xl font-semibold">{{ $item->title }} Details</h2>
                            <!-- Add item details here -->
                            <button onclick="toggleModal('{{ $item->id }}')"
                                class="px-4 py-2 text-white bg-red-500 rounded">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            function toggleModal(id) {
                const overlay = document.getElementById("overlay_" + id);

                // Close any open modals
                const openModals = document.querySelectorAll('[id^="overlay_"]:not([id="overlay_' + id + '"])');
                openModals.forEach((modal) => {
                    modal.classList.add("hidden");
                });

                overlay.classList.toggle("hidden");
            }
        </script>


    </div> --}}


    {{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@2.x.x/dist/alpine.min.js" defer></script> --}}
@else
    <div class="my-2 grid grid-cols-2 items-center gap-2 px-4 py-2">
        <x-inputs.number placeholder="Quantity" wire:model="quantity.{{ $item->id }}" />
        @if (!in_array($item->id, $rfqProducts))
            <button wire:click="addToRfq({{ $item->id }})"
                class="rounded bg-blue-600 px-4 py-2 font-medium text-white transition duration-300 ease-in-out hover:bg-blue-700">
                Add to RFQ
            </button>
        @else
            <button wire:click="removeFromRfq({{ $item->id }})"
                class="rounded bg-red-600 px-2 py-2 font-medium text-white transition duration-300 ease-in-out hover:bg-red-700">
                Clear from RFQ
            </button>
        @endif
    </div>
@endif
