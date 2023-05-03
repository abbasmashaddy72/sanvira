<div
    class="overflow-hidden duration-500 ease-in-out bg-white rounded-md shadow group dark:bg-slate-900 hover:shadow-xl dark:hover:shadow-xl dark:shadow-gray-800 dark:hover:shadow-gray-700">
    <div class="relative">
        <img class="object-cover w-full h-40" src="{{ asset('storage/' . $item->images[0]) }}" alt="">
    </div>

    <div class="p-6">
        <div>
            <a href="{{ route('products_details', ['data' => $item->id]) }}"
                class="text-lg font-medium duration-500 ease-in-out hover:text-indigo-600">{{ $item->name }}</a>
        </div>

        <ul
            class="grid items-center grid-cols-1 gap-2 pt-6 list-none @if (\Route::currentRouteName() != 'homepage') border-gray-100 border-y dark:border-gray-800 @endif">
            <li class="flex items-center justify-between">
                <span class="mr-2 font-semibold text-indigo-600">{{ __('Min Max Order Quantity:') }}</span>
                <span class="ml-2">{{ $item->min_oq }} - {{ $item->max_oq }}</span>
            </li>

            <li class="flex items-center justify-between">
                <span class="mr-2 font-semibold text-indigo-600">{{ __('Estimate Delivery Time in Days:') }}</span>
                <span class="ml-2">{{ $item->edt }}</span>
            </li>

            <li class="flex items-center justify-between">
                <span class="mr-2 font-semibold text-indigo-600">{{ __('Brand Name:') }}</span>
                <span class="ml-2">{{ $item->brands->name }}</span>
            </li>

            <li class="flex items-center justify-between">
                <span class="mr-2 font-semibold text-indigo-600">{{ __('Manufacturer Name:') }}</span>
                <span class="ml-2">{{ Str::limit($item->manufacturers->name, 15) }}</span>
            </li>

            <li class="flex items-center justify-between">
                <span class="mr-2 font-semibold text-indigo-600">{{ __('Model Name:') }}</span>
                <span class="ml-2">{{ $item->model }}</span>
            </li>
        </ul>

        @if (\Route::currentRouteName() != 'homepage')
            <div class="flex items-center justify-between pt-6">
                <div>
                    @if (!in_array($item->id, $rfqProducts))
                        <a wire:click="addToRfq({{ $item->id }})"
                            class="px-2 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700" href="#"
                            class="btn btn-sm btn-primary">RFQ</a>
                    @else
                        <a wire:click="removeFromRfq({{ $item->id }})"
                            class="px-2 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700" href="#"
                            class="btn btn-sm btn-danger">RFQ</a>
                    @endif
                </div>
                <div class="w-28">
                    <x-input wire:model="quantity.{{ $item->id }}" type='number' />
                </div>
                <div>
                    @if (!in_array($item->id, $cartProducts))
                        <a wire:click="addToCart({{ $item->id }})"
                            class="px-2 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700" href="#"
                            class="btn btn-sm btn-primary">Cart</a>
                    @else
                        <a wire:click="removeFromCart({{ $item->id }})"
                            class="px-2 py-2 font-bold text-white bg-red-500 rounded hover:bg-red-700" href="#"
                            class="btn btn-sm btn-danger">Cart</a>
                    @endif
                </div>
            </div>
        @endif
    </div>
</div>
