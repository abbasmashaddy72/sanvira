<x-frontend.modal-form form-action="add">
    <x-slot name="title">
        {{ __('Cart List') }}
    </x-slot>

    <x-slot name="content">
        <div class="row-gap-0 grid-cols-1 gap-2 sm:grid">
            <div class="flow-root">
                <ul role="list" class="-my-6 divide-y divide-gray-200">
                    @foreach ($cartProductLists as $item)
                        <li class="flex py-6">
                            <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                <img src="{{ asset('storage/' . $item->supplierProducts->images[0]) }}"
                                    alt="{{ $item->supplierProducts->name }}"
                                    class="h-full w-full object-cover object-center">
                            </div>

                            <div class="ml-4 flex flex-1 flex-col">
                                <div>
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <h3>
                                            <p>{{ $item->supplierProducts->name }}</p>
                                        </h3>
                                        <div class="flex">
                                            {{ $item->supplierProducts->price ? $item->supplierProducts->price : $item->supplierProducts->min_price . ' - ' . $item->supplierProducts->max_price }}
                                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                                class="ml-1 h-5 w-5 fill-blue-600" viewBox="0 0 117.77 122.88">
                                                <path
                                                    d="M19.81,113.35a7.89,7.89,0,0,1-1.74,3.45,5.87,5.87,0,0,1-2.46,1.31L0,122.88a16.13,16.13,0,0,1,2.51-3.75,11.83,11.83,0,0,1,3.72-2,12.16,12.16,0,0,1-2.93-2.41,3.47,3.47,0,0,1-.92-2.21A5.19,5.19,0,0,1,3,110.37,13.08,13.08,0,0,1,4.47,108c3.15-4.2,6.25-6.28,9.33-6.28a2.91,2.91,0,0,1,2.21.89,3.39,3.39,0,0,1,.82,2.36,5.39,5.39,0,0,1-.32,2,18.35,18.35,0,0,1-1.34,2.5q-3.59-1.78-4.89-1.78a5.82,5.82,0,0,0-2.58.64,6.66,6.66,0,0,0-1.59,1.17c0,.65,1.16,1.61,3.47,2.93s4,2,5,2a34.37,34.37,0,0,0,5.24-1ZM20,67.17A43.15,43.15,0,0,1,18.42,79a95.91,95.91,0,0,1-6,14.37L8,91.6A83,83,0,0,0,9.83,76.46c0-3-.25-7.3-.72-13S8,52.06,7.27,46.45s-1.91-12.29-3.57-20a33.76,33.76,0,0,1-.87-5.61c0-1.49.75-4,2.26-7.67S8.69,5.14,11.4,0l4.41,25.77q2.46,14.7,3.4,25.47c.5,5.53.75,10.85.75,15.93Zm15.91,42.45V89.22H56.28v20.4Zm81.9-21.3h-33c-3.21,0-5.66-.67-7.38-2-2.08-1.66-3.13-4.37-3.13-8.09,0-2.16.13-4.47.35-6.93s.55-5,1-7.52l3-.15a5.6,5.6,0,0,0,2.59,3.75A9.39,9.39,0,0,0,86,68.51h24.93q-1.68-10.71-5.81-17.1a30.44,30.44,0,0,0-9.54-9.18l5.29-22.72a38.18,38.18,0,0,1,13.31,18.2q3.61,10.27,3.6,27.23V88.32Z" />
                                            </svg>
                                        </div>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">
                                        {{ $item->supplierProducts->manufacturer }}
                                    </p>
                                </div>
                                <div class="flex flex-1 items-end justify-between text-sm">
                                    <div class="w-32">
                                        <x-inputs.number label="Quantity" value="{{ $item->quantity }}" />
                                    </div>

                                    <div class="flex">
                                        <button wire:click.prevent="removeFromCart({{ $item->supplier_product_id }})"
                                            class="font-medium text-red-600 hover:text-red-700">{{ __('Remove') }}</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </x-slot>
</x-frontend.modal-form>
