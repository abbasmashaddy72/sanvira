<x-backend.modal-form form-action="submit" title="{{ $name }}">
    <x-dialog z-index="z-50" blur="md" align="center" />
    <div class="grid grid-cols-2 gap-x-2">
        <x-input name="name" label="{{ __('Name') }}" type="text" wire:model.defer='name' required />

        <x-input name="min_max_oq" label="{{ __('Min - Max Order Quantity') }}" type="text" wire:model.defer='min_max_oq'
            placehomder="12-123" required />

        <x-input name="edt" label="{{ __('Estimate Delivery Time in Days') }}" type="text"
            wire:model.defer='edt' required />

        <x-input name="avb_stock" label="{{ __('Available Stock') }}" type="text" wire:model.defer='avb_stock'
            required />

        <x-input name="model" label="{{ __('Model') }}" type="text" wire:model.defer='model' required />

        <x-input name="item_type" label="{{ __('Item Type') }}" type="text" wire:model.defer='item_type' required />

        <x-input name="sku" label="{{ __('Stock Keeping Unit') }}" type="text" wire:model.defer='sku' />

        <x-checkbox name="on_sale" label="{{ __('On Sale') }}" wire:model.defer='on_sale' />

        <x-input name="price" label="{{ __('Price (Range 123-321 or Fixed 123)') }}" type="text"
            placeholder="123-321 or 123" wire:model.defer='price' required />

        <div class="card">
            <x-backend.image-upload :images="$this->images" :isUploaded="$this->isUploaded" label="{{ __('Upload Images') }}"
                name="images" deletId="{{ $supplier_product_id }}" model="images" required />
        </div>

        <div class="card">
            <x-backend.file-upload :files="$this->data_sheets" :isUploaded="$this->isDataSheetsUploaded" label="{{ __('Upload Datasheets') }}"
                name="data_sheets" deletId="{{ $supplier_product_id }}" model="data_sheets" />
        </div>

        <x-select label="{{ __('Select Category') }}" wire:model.defer="supplier_product_category_id"
            placeholder="Select Category" :async-data="route('api.admin.supplier_categories')" option-label="name" option-value="id" required />

        <x-select label="{{ __('Select Origin Country') }}" wire:model.defer="country_id"
            placeholder="Select Origin Country" :async-data="route('api.admin.countries')" option-label="name" option-value="id" required />

        <x-select label="{{ __('Select Brand') }}" wire:model.defer="brand_id" placeholder="Select Brand"
            :async-data="route('api.admin.brands')" option-label="name" option-value="id" required />

        <x-select label="{{ __('Select Manufacturer') }}" wire:model.defer="manufacturer_id"
            placeholder="Select Manufacturer" :async-data="route('api.admin.manufacturers')" option-label="name" option-value="id" required />
    </div>

    <div>
        <div class="flex items-center">
            <div class="grid flex-shrink-0 grid-cols-2 gap-x-2">
                <x-input name="name_spa.0" label="{{ __('Attribute Name') }}" type="text"
                    wire:model.defer='name_spa.0' />
                <x-input name="value_spa.0" label="{{ __('Attribute Value') }}" type="text"
                    wire:model.defer='value_spa.0' />
            </div>
            <button class="btn btn-primary ml-2 inline-flex flex-shrink-0"
                wire:click.prevent="add({{ $i }})">Add</button>
        </div>

        @foreach ($inputs as $key => $input_value)
            <div class="flex items-center">
                <div class="grid flex-shrink-0 grid-cols-2 gap-x-2">
                    <x-input name="name_spa.{{ $input_value }}" label="{{ __('Attribute Name') }}" type="text"
                        wire:model.defer='name_spa.{{ $input_value }}' />
                    <x-input name="value_spa.{{ $input_value }}" label="{{ __('Attribute Value') }}" type="text"
                        wire:model.defer='value_spa.{{ $input_value }}' />
                </div>
                <button class="btn btn-danger ml-2 inline-flex flex-shrink-0"
                    wire:click.prevent="remove({{ $key }})">Remove</button>

            </div>
        @endforeach
    </div>

    <div>
        <x-backend.ckEditor idPrefix="body1en" lang="EN" name="description" label="{{ __('Description') }}"
            wire:model.defer='description' />
    </div>
</x-backend.modal-form>
