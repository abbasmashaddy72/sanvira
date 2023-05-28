<x-backend.modal-form form-action="submit" title="{{ $name }}">
    <x-dialog z-index="z-50" blur="md" align="center" />
    <div class="grid grid-cols-2 gap-x-2">
        <x-input name="name" label="Name" type="text" wire:model.defer='name' />

        <x-input name="min_max_oq" label="Min - Max Order Quantity" type="text" wire:model.defer='min_max_oq' />

        <x-input name="edt" label="Estimate Delivery Time in Days" type="text" wire:model.defer='edt' />

        <x-input name="avb_stock" label="Available Stock" type="text" wire:model.defer='avb_stock' />

        <x-input name="model" label="Model" type="text" wire:model.defer='model' />

        <x-input name="item_type" label="Item Type" type="text" wire:model.defer='item_type' />

        <x-input name="sku" label="Stock Keeping Unit" type="text" wire:model.defer='sku' />

        <x-checkbox name="on_sale" label="On Sale" wire:model.defer='on_sale' />

        <x-input name="price" label="Price if Range (123-321) & Specific Price (123)" type="text"
            wire:model.defer='price' />

        <div class="card">
            <div class="card-body">
                @if (!empty($images))
                    Photo Preview:
                    <div class="grid grid-cols-5 gap-1">
                        @foreach ($images as $key => $image)
                            <div class="relative">
                                <img class="object-cover w-10 h-10 rounded-md"
                                    src="{{ $this->isUploaded ? $image->temporaryUrl() : asset('storage/' . $image) }}">
                                <button type="button"
                                    wire:click='deleteImage({{ $supplier_product_id }}, {{ $key }})'>
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="absolute text-red-500 bg-white rounded-xl hover:text-red-600 -top-2 right-2"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-x-circle">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <line x1="15" y1="9" x2="9" y2="15">
                                        </line>
                                        <line x1="9" y1="9" x2="15" y2="15">
                                        </line>
                                    </svg>
                                </button>
                            </div>
                        @endforeach
                    </div>
                @endif
                <div class="mb-3">
                    <x-input name="images" label="Upload Images" type="file" wire:model.defer='images' multiple />
                    <div wire:loading wire:target="images">Uploading...</div>
                </div>
            </div>
        </div>

        <x-select label="Select Parent Category" wire:model.defer="supplier_product_category_id"
            placeholder="Select Parent Category" :async-data="route('api.admin.supplier_categories')" option-label="name" option-value="id" />

        <x-select label="Select Origin Country" wire:model.defer="country_id" placeholder="Select Origin Country"
            :async-data="route('api.admin.countries')" option-label="name" option-value="id" />

        <x-select label="Select Brand" wire:model.defer="brand_id" placeholder="Select Brand" :async-data="route('api.admin.brands')"
            option-label="name" option-value="id" />

        <x-select label="Select Manufacturer" wire:model.defer="manufacturer_id" placeholder="Select Manufacturer"
            :async-data="route('api.admin.manufacturers')" option-label="name" option-value="id" />
    </div>

    <div>
        <div class="flex items-center">
            <div class="grid flex-shrink-0 grid-cols-2 gap-x-2">
                <x-input name="name_spa.0" label="Attribute Name" type="text" wire:model.defer='name_spa.0' />
                <x-input name="value_spa.0" label="Attribute Value" type="text" wire:model.defer='value_spa.0' />
            </div>
            <button class="inline-flex flex-shrink-0 ml-2 btn btn-primary"
                wire:click.prevent="add({{ $i }})">Add</button>
        </div>

        @foreach ($inputs as $key => $input_value)
            <div class="flex items-center">
                <div class="grid flex-shrink-0 grid-cols-2 gap-x-2">
                    <x-input name="name_spa.{{ $input_value }}" label="Attribute Name" type="text"
                        wire:model.defer='name_spa.{{ $input_value }}' />
                    <x-input name="value_spa.{{ $input_value }}" label="Attribute Value" type="text"
                        wire:model.defer='value_spa.{{ $input_value }}' />
                </div>
                <button class="inline-flex flex-shrink-0 ml-2 btn btn-danger"
                    wire:click.prevent="remove({{ $key }})">Remove</button>

            </div>
        @endforeach
    </div>

    <div>
        <x-backend.ckEditor id="body1en" lang="EN" name="description" label="Description"
            wire:model.defer='description' />
    </div>
</x-backend.modal-form>
