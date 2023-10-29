<x-backend.modal-form form-action="submit" title="{{ $title }}">
    <x-dialog z-index="z-50" blur="md" align="center" />
    <div class="flex grid grid-cols-3 items-center gap-x-2 gap-y-2">
        <x-input name="title" label="{{ __('Title') }}" type="text" wire:model='title' required />

        <x-select label="{{ __('Select Brand') }}" wire:model="brand_id" placeholder="Select Brand" :async-data="route('api.admin.brands')"
            option-label="name" option-value="id" required />

        <x-input name="edt" label="{{ __('Estimate Delivery Time in Days') }}" type="text" wire:model='edt'
            required />

        <x-input name="avb_stock" label="{{ __('Available Stock') }}" type="text" wire:model='avb_stock' required />

        <x-input name="model" label="{{ __('Model') }}" type="text" wire:model='model' required />

        <x-input name="item_type" label="{{ __('Item Type') }}" type="text" wire:model='item_type' required />

        <x-input name="barcode" label="{{ __('Barcode') }}" type="text" wire:model='barcode' />

        <x-input name="length" label="{{ __('Length') }}" type="text" wire:model='length'>
            <x-slot name="append">
                <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                    <x-native-select :options="['m', 'cm', 'mm', 'in', 'ft']" wire:model.live="length_units"
                        wire:click="setUnits($event.target.value)" />
                </div>
            </x-slot>
        </x-input>

        <x-input name="breadth" label="{{ __('Breadth') }}" type="text" wire:model='breadth'>
            <x-slot name="append">
                <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                    <x-native-select :options="['m', 'cm', 'mm', 'in', 'ft']" wire:model.live="breadth_units"
                        wire:click="setUnits($event.target.value)" />
                </div>
            </x-slot>
        </x-input>

        <x-input name="width" label="{{ __('Width') }}" type="text" wire:model='width'>
            <x-slot name="append">
                <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                    <x-native-select :options="['m', 'cm', 'mm', 'in', 'ft']" wire:model.live="width_units"
                        wire:click="setUnits($event.target.value)" />
                </div>
            </x-slot>
        </x-input>

        <x-input name="weight" label="{{ __('Weight') }}" type="text" wire:model='weight'>
            <x-slot name="append">
                <div class="absolute inset-y-0 right-0 flex items-center p-0.5">
                    <x-native-select :options="['kg', 'g', 't', 'oz']" wire:model="weight_unit" />
                </div>
            </x-slot>
        </x-input>

        <x-checkbox name="on_sale" label="{{ __('On Sale') }}" wire:model='on_sale' />

        @role('Admin' || 'Super Admin')
            <x-checkbox name="verification" label="{{ __('Verification') }}" wire:model='verification' />
        @endrole

        <div class="card">
            <x-backend.image-upload :images="$this->images" :isUploaded="$this->isUploaded" label="{{ __('Upload Images') }}"
                name="images" deletId="{{ $product_id }}" model="images" required />
        </div>

        <div class="card">
            <x-backend.file-upload :files="$this->data_sheets" :isUploaded="$this->isDataSheetsUploaded" label="{{ __('Upload Datasheets') }}"
                name="data_sheets" deletId="{{ $product_id }}" model="data_sheets" />
        </div>

        <x-select label="{{ __('Select Category') }}" wire:model.live="main_category_id" placeholder="Select Category"
            :async-data="route('api.admin.categories', ['parent_id' => 0])" option-label="name" option-value="id" required />

        @if ($sub_category)
            <x-select label="{{ __('Select Subcategory') }}" wire:model="category_id" placeholder="Select Subcategory"
                :async-data="route('api.admin.categories', ['parent_id' => $main_category_id])" option-label="name" option-value="id" required
                wire:change="updateSelectedSubcategory" />
        @endif

        <x-select label="{{ __('Select Origin Country') }}" wire:model="country_id" placeholder="Select Origin Country"
            :async-data="route('api.admin.countries')" option-label="name" option-value="id" required />

        <x-select label="{{ __('Select Vendor') }}" wire:model="vendor_id" placeholder="Select Vendor"
            :async-data="route('api.admin.vendors')" option-label="name" option-value="id" required />
    </div>

    <div class="mt-2">
        <div class="flex items-center">
            <div class="grid flex-shrink-0 grid-cols-2 gap-x-2">
                <x-input name="name_pa.0" label="{{ __('Attribute Name') }}" type="text"
                    wire:model='name_pa.0' />
                <x-input name="value_pa.0" label="{{ __('Attribute Value') }}" type="text"
                    wire:model='value_pa.0' />
            </div>
            <button class="btn btn-primary ml-2 inline-flex flex-shrink-0"
                wire:click.prevent="add_pa({{ $i_pa }})">Add</button>
        </div>

        @foreach ($inputs_pa as $key => $input_value)
            <div class="flex items-center">
                <div class="grid flex-shrink-0 grid-cols-2 gap-x-2">
                    <x-input name="name_pa.{{ $input_value }}" label="{{ __('Attribute Name') }}" type="text"
                        wire:model='name_pa.{{ $input_value }}' />
                    <x-input name="value_pa.{{ $input_value }}" label="{{ __('Attribute Value') }}" type="text"
                        wire:model='value_pa.{{ $input_value }}' />
                </div>
                <button class="btn btn-danger ml-2 inline-flex flex-shrink-0"
                    wire:click.prevent="remove_pa({{ $key }})">Remove</button>

            </div>
        @endforeach
    </div>

    <div class="mt-2">
        <div class="flex items-center">
            <div class="grid grid-cols-4 gap-x-2">
                <x-input name="min_price_pv.0" label="{{ __('Min. Price') }}" type="text"
                    wire:model='min_price_pv.0' />
                <x-input name="max_price_pv.0" label="{{ __('Max. Price') }}" type="text"
                    wire:model='max_price_pv.0' />
                <x-input name="min_order_quantity_pv.0" label="{{ __('Min. Order Quantity') }}" type="text"
                    wire:model='min_order_quantity_pv.0' />
                <x-input name="max_order_quantity_pv.0" label="{{ __('Max. Order Quantity') }}" type="text"
                    wire:model='max_order_quantity_pv.0' />
            </div>
            <button class="btn btn-primary ml-2 inline-flex flex-shrink-0"
                wire:click.prevent="add_pv({{ $i_pv }})">Add</button>
        </div>

        @foreach ($inputs_pv as $key => $input_value)
            <div class="flex items-center">
                <div class="grid grid-cols-4 gap-x-2">
                    <x-input name="min_price_pv.{{ $input_value }}" label="{{ __('Min. Price') }}" type="text"
                        wire:model='min_price_pv.{{ $input_value }}' />
                    <x-input name="max_price_pv.{{ $input_value }}" label="{{ __('Max. Price') }}" type="text"
                        wire:model='max_price_pv.{{ $input_value }}' />
                    <x-input name="min_order_quantity_pv.{{ $input_value }}"
                        label="{{ __('Min. Order Quantity') }}" type="text"
                        wire:model='min_order_quantity_pv.{{ $input_value }}' />
                    <x-input name="max_order_quantity_pv.{{ $input_value }}"
                        label="{{ __('Max. Order Quantity') }}" type="text"
                        wire:model='max_order_quantity_pv.{{ $input_value }}' />
                </div>
                <button class="btn btn-danger ml-2 inline-flex flex-shrink-0"
                    wire:click.prevent="remove_pv({{ $key }})">Remove</button>

            </div>
        @endforeach
    </div>

    <div>
        <x-backend.ckEditor idPrefix="body1en" lang="EN" name="description" label="{{ __('Description') }}"
            wire:model='description' />
    </div>
</x-backend.modal-form>
