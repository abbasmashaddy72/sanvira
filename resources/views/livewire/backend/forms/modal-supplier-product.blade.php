<x-backend.modal-form form-action="add">
    <x-slot name="title">
        Update {{ $name }}
    </x-slot>

    <x-slot name="content">
        <div class="grid gap-y-2">
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

            <x-input name="supplier_product_category_id" label="Supplier_Product_Category_Id" type="text"
                wire:model='supplier_product_category_id' />
        </div>
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary" type="submit">Save</button>
    </x-slot>
</x-backend.modal-form>
