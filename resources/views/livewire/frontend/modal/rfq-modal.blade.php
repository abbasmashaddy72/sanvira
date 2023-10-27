<x-frontend.modal-form form-action="add">
    <x-slot name="title">
        {{ __('RFQ List') }}
    </x-slot>

    <x-slot name="content">
        <div class="row-gap-0 grid-cols-1 gap-2 sm:grid">
            <div class="flow-root">
                <ul role="list" class="-my-6 divide-y divide-gray-200">
                    @foreach ($rfqProductLists as $rfq)
                        @foreach ($rfq->products as $product)
                            <li class="flex py-6">
                                <div class="h-24 w-24 flex-shrink-0 overflow-hidden rounded-md border border-gray-200">
                                    <img src="{{ asset('storage/' . $product->images[0]) }}" alt="{{ $product->title }}"
                                        class="h-full w-full object-cover object-center">
                                </div>

                                <div class="ml-4 flex flex-1 flex-col">
                                    <div>
                                        <div class="flex justify-between text-base font-medium text-gray-900">
                                            <h3>
                                                <p>{{ $product->title }}</p>
                                            </h3>
                                        </div>
                                    </div>
                                    <div class="flex flex-1 items-end justify-between text-sm">
                                        <div class="w-32">
                                            <x-inputs.number label="Quantity" value="{{ $product->pivot->quantity }}" />
                                        </div>

                                        <div class="flex">
                                            <button wire:click.prevent="removeFromRfq({{ $product->id }})"
                                                class="rounded bg-red-600 px-4 py-2 font-medium text-white hover:bg-red-700">{{ __('Remove') }}</button>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    @endforeach
                </ul>
            </div>
        </div>
    </x-slot>
</x-frontend.modal-form>
