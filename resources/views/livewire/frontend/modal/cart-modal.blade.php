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
                                <img src="{{ asset('storage/' . $item->products->images[0]) }}"
                                    alt="{{ $item->products->title }}" class="h-full w-full object-cover object-center">
                            </div>

                            <div class="ml-4 flex flex-1 flex-col">
                                <div>
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <h3>
                                            <p>{{ $item->products->title }}</p>
                                        </h3>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">
                                        {{ $item->products->vendor }}
                                    </p>
                                </div>
                                <div class="flex flex-1 items-end justify-between text-sm">
                                    <div class="w-32">
                                        <x-inputs.number label="Quantity" value="{{ $item->quantity }}" />
                                    </div>

                                    <div class="flex">
                                        <button wire:click.prevent="removeFromCart({{ $item->product_id }})"
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
