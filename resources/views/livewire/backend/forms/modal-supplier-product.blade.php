<x-backend.modal-form form-action="submit">
    <x-slot name="title">
        Update {{ $name }}
    </x-slot>

    <x-slot name="content">
        <div class="grid grid-cols-2 gap-y-2 gap-x-2">
            <x-input name="name" label="Name" type="text" wire:model='name' />

            <x-textarea name="description" label="Description" type="text" wire:model='description' />

            <x-input name="min_max_oq" label="Min - Max Order Quantity" type="text" wire:model='min_max_oq' />

            <x-input name="edt" label="Estimate Delivery Time in Days" type="text" wire:model='edt' />

            <x-input name="avb_stock" label="Available Stock" type="text" wire:model='avb_stock' />

            <x-input name="manufacturer" label="Manufacturer" type="text" wire:model='manufacturer' />

            <x-input name="brand" label="Brand" type="text" wire:model='brand' />

            <x-input name="model" label="Model" type="text" wire:model='model' />

            <x-input name="item_type" label="Item Type" type="text" wire:model='item_type' />

            <x-input name="sku" label="Stock Keeping Unit" type="text" wire:model='sku' />

            <x-checkbox name="on_sale" label="On Sale" wire:model='on_sale' />

            <x-input name="image" label="Image" type="file" wire:model='image' />

            <x-select label="Select Parent Category" wire:model.defer="supplier_product_category_id"
                placeholder="Select Parent Category" :async-data="route('api.admin.supplier_categories')" option-label="name" option-value="id" />
        </div>

        <div>
            <div class="flex items-center">
                <div class="grid flex-shrink-0 grid-cols-2 gap-x-2">
                    <x-input name="name_spa.0" label="Attribute Name" type="text" wire:model='name_spa.0' />
                    <x-input name="value_spa.0" label="Attribute Value" type="text" wire:model='value_spa.0' />
                </div>
                <button class="inline-flex flex-shrink-0 ml-2 btn btn-primary"
                    wire:click.prevent="add({{ $i }})">Add</button>
            </div>

            @foreach ($inputs as $key => $input_value)
                <div class="flex items-center">
                    <div class="grid flex-shrink-0 grid-cols-2 gap-x-2">
                        <x-input name="name_spa.{{ $input_value }}" label="Attribute Name" type="text"
                            wire:model='name_spa.{{ $input_value }}' />
                        <x-input name="value_spa.{{ $input_value }}" label="Attribute Value" type="text"
                            wire:model='value_spa.{{ $input_value }}' />
                    </div>
                    <button class="inline-flex flex-shrink-0 ml-2 btn btn-danger"
                        wire:click.prevent="remove({{ $key }})">Remove</button>

                </div>
            @endforeach
        </div>
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary" type="submit">Save</button>
    </x-slot>
</x-backend.modal-form>
