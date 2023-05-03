<x-frontend.modal-form form-action="add">
    <x-slot name="title">
        Cart List
    </x-slot>

    <x-slot name="content">
        <div class="grid-cols-1 gap-2 row-gap-0 sm:grid">
            <div class="flow-root">
                <ul role="list" class="-my-6 divide-y divide-gray-200">
                    @foreach ($cartProductLists as $item)
                        <li class="flex py-6">
                            <div class="flex-shrink-0 w-24 h-24 overflow-hidden border border-gray-200 rounded-md">
                                <img src="{{ asset('storage/' . $item->supplierProducts->image) }}"
                                    alt="{{ $item->supplierProducts->name }}"
                                    class="object-cover object-center w-full h-full">
                            </div>

                            <div class="flex flex-col flex-1 ml-4">
                                <div>
                                    <div class="flex justify-between text-base font-medium text-gray-900">
                                        <h3>
                                            <p>{{ $item->supplierProducts->name }}</p>
                                        </h3>
                                        <p class="ml-4">$90.00</p>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">{{ $item->supplierProducts->manufacturer }}
                                    </p>
                                </div>
                                <div class="flex items-end justify-between flex-1 text-sm">
                                    <p class="text-gray-500">Qty {{ $item->quantity }}</p>

                                    <div class="flex">
                                        <button type="button"
                                            class="font-medium text-indigo-600 hover:text-blue-600">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </x-slot>

    <x-slot name="buttons">
        <button
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
            type="submit">Save</button>
    </x-slot>
</x-frontend.modal-form>
