<div class="dark:text-white">
    <form wire:submit.prevent="submit">
        <div class="grid grid-cols-6 gap-2">
            <div class="col-span-3 rounded-lg bg-white px-4 dark:bg-gray-800 sm:p-6">
                <p class="text-lg font-semibold">Product Details</p>
                <hr class="my-2 h-px border-0 bg-gray-200 dark:bg-gray-700" />
                <div class="grid grid-cols-3 items-end gap-x-2 gap-y-4">
                    <x-input name="title" label="{{ __('Title') }}" type="text" wire:model='title' required />

                    <x-input name="model" label="{{ __('Model') }}" type="text" wire:model='model' required />

                    <x-select label="{{ __('Select Category') }}" wire:model.live="main_category_id"
                        placeholder="Select Category" :async-data="route('api.admin.categories', ['parent_id' => 0])" option-label="name" option-value="id"
                        required />

                    @if ($sub_category)
                        <x-select label="{{ __('Select Subcategory') }}" wire:model="category_id"
                            placeholder="Select Subcategory" :async-data="route('api.admin.categories', ['parent_id' => $main_category_id])" option-label="name" option-value="id"
                            required wire:change="updateSelectedSubcategory" />
                    @endif

                    <x-input name="edt" label="{{ __('Estimate Delivery Time in Days') }}" type="text"
                        wire:model='edt' required />


                    <x-checkbox name="on_sale" label="{{ __('On Sale') }}" wire:model='on_sale' />

                    <div class="col-span-3 grid grid-cols-2 items-end gap-2">
                        <div class="card">
                            <x-backend.image-upload :images="$this->images" :isUploaded="$this->isUploaded"
                                label="{{ __('Upload Images') }}" name="images" deletId="{{ $product_id }}"
                                model="images" required />
                        </div>

                        <div class="card">
                            <x-backend.file-upload :files="$this->data_sheets" :isUploaded="$this->isDataSheetsUploaded"
                                label="{{ __('Upload Datasheets') }}" name="data_sheets" deletId="{{ $product_id }}"
                                model="data_sheets" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-3 rounded-lg bg-white px-4 dark:bg-gray-800 sm:p-6">
                <div class="flex items-end justify-between">
                    <p class="text-lg font-semibold">Attributes List</p>
                    <button class="btn btn-primary ml-2 inline-flex flex-shrink-0" type="button"
                        wire:click.prevent="add_pa({{ $i_pa }})">Add Attribute</button>
                </div>
                <hr class="my-2 h-px border-0 bg-gray-200 dark:bg-gray-700" />
                <div class="my-2 grid gap-y-2">
                    <div class="flex items-end">
                        <div class="grid flex-shrink-0 grid-cols-2 gap-x-2">
                            <x-input name="name_pa.0" label="{{ __('Attribute Name') }}" type="text"
                                wire:model='name_pa.0' />
                            <x-input name="value_pa.0" label="{{ __('Attribute Value') }}" type="text"
                                wire:model='value_pa.0' />
                        </div>
                    </div>

                    @foreach ($inputs_pa as $key => $input_value)
                        <div class="flex items-end">
                            <div class="grid flex-shrink-0 grid-cols-2 gap-x-2">
                                <x-input name="name_pa.{{ $input_value }}"
                                    label="{{ __('Attribute Name ' . $input_value) }}" type="text"
                                    wire:model='name_pa.{{ $input_value }}' />
                                <x-input name="value_pa.{{ $input_value }}"
                                    label="{{ __('Attribute Value ' . $input_value) }}" type="text"
                                    wire:model='value_pa.{{ $input_value }}' />
                            </div>
                            <button class="btn btn-danger ml-2 inline-flex flex-shrink-0" type="button"
                                wire:click.prevent="remove_pa({{ $key }})">Remove</button>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="mt-4 grid grid-cols-6 gap-2">
            <div class="col-span-3 rounded-lg bg-white px-4 dark:bg-gray-800 sm:p-6">
                <p class="text-lg font-semibold">Product Description</p>
                <hr class="my-2 h-px border-0 bg-gray-200 dark:bg-gray-700" />
                <div>
                    <x-backend.ckEditor idPrefix="body1en" lang="EN" name="description"
                        label="{{ __('Description') }}" wire:model='description' />
                </div>
            </div>

            <div class="col-span-3 rounded-lg bg-white px-4 dark:bg-gray-800 sm:p-6">
                <div class="flex items-end justify-between">
                    <p class="text-lg font-semibold">Variation List</p>
                    <button class="btn btn-primary ml-2 inline-flex flex-shrink-0" type="button"
                        wire:click.prevent="add_pv({{ $i_pv }})">Add Variation</button>
                </div>
                <hr class="my-2 h-px border-0 bg-gray-200 dark:bg-gray-700" />
                <div class="mt-2 space-y-4">
                    <div class="flex items-center rounded-lg border-2 border-gray-200 shadow-lg">
                        <div class="grid grid-cols-4 items-end gap-2 p-4">
                            <x-native-select label="{{ __('Select Origin Country') }}" wire:model="country_id_pv.0"
                                name='country_id_pv.0' placeholder="Select Origin Country" :options="getKeyValuesWithMap('Country', 'name', 'id')"
                                option-label="name" option-value="id" required />

                            <x-input name="avb_stock_pv.0" label="{{ __('Available Stock') }}" type="text"
                                wire:model='avb_stock_pv.0' name='avb_stock_pv.0' required />

                            <x-input name="sku_pv.0" label="{{ __('Stock Keping Unit') }}" type="text"
                                wire:model='sku_pv.0' name='sku_pv.0' required />

                            <x-input name="barcode_pv.0" label="{{ __('Barcode') }}" type="text"
                                wire:model='barcode_pv.0' name='barcode_pv.0' required />

                            <x-input name="quantity_type_pv.0" label="{{ __('Quantity Type') }}" type="text"
                                wire:model='quantity_type_pv.0' name='quantity_type_pv.0' />

                            <x-input name="color_pv.0" label="{{ __('Colors') }}" type="text"
                                wire:model='color_pv.0' name='color_pv.0' />

                            <div class="col-span-4">
                                <div class="grid grid-cols-3 items-end justify-between gap-2">
                                    <p class="text-lg font-medium">Meaturement Details</p>
                                    <x-native-select :options="['m', 'cm', 'mm', 'in', 'ft']" wire:model="measurement_units.0"
                                        name='measurement_units.0' label="Measurement Units" />
                                    <x-native-select :options="['kg', 'g', 't', 'oz']" wire:model="weight_units_pv.0"
                                        name='weight_units_pv.0' label="Weight Units" />
                                </div>
                                <hr class="my-2 h-px border-0 bg-gray-200 dark:bg-gray-700" />
                            </div>

                            <div class="col-span-4">
                                <div class="justify-betwen grid grid-cols-5 items-end gap-2">
                                    <x-input name="length_pv.0" label="{{ __('Length') }}" type="number"
                                        wire:model='length_pv.0' name='length_pv.0' />

                                    <x-input name="breadth_pv.0" label="{{ __('Breadth') }}" type="number"
                                        wire:model='breadth_pv.0' name='breadth_pv.0' />

                                    <x-input name="width_pv.0" label="{{ __('Width') }}" type="number"
                                        wire:model='width_pv.0' name='width_pv.0' />

                                    <x-input name="diameter_pv.0" label="{{ __('Diameter') }}" type="number"
                                        wire:model='diameter_pv.0' name='diameter_pv.0' />

                                    <x-input name="weight_pv.0" label="{{ __('Weight') }}" type="number"
                                        wire:model='weight_pv.0' name='weight_pv.0' />
                                </div>
                            </div>

                            <div class="col-span-4">
                                <div class="grid grid-cols-3 items-end justify-between gap-2">
                                    <p class="text-lg font-medium">Cost Details</p>
                                </div>
                                <hr class="my-2 h-px border-0 bg-gray-200 dark:bg-gray-700" />
                            </div>

                            <x-input name="max_discount_pv.0" label="{{ __('Max. Discount') }}" type="number"
                                wire:model='max_discount_pv.0' name='max_discount_pv.0' />

                            <x-native-select :options="['Regular', 'Percentage']" wire:model="max_discount_unit_pv.0"
                                name='max_discount_unit_pv.0' label='Max. Discount Units' />

                            <x-input name="tax_percentage_pv.0" label="{{ __('Tax Percentage') }}" type="number"
                                wire:model='tax_percentage_pv.0' name='tax_percentage_pv.0' />

                            <x-input name="min_price_pv.0" label="{{ __('Min. Price') }}" type="text"
                                wire:model='min_price_pv.0' name='min_price_pv.0' />

                            <x-input name="max_price_pv.0" label="{{ __('Max. Price') }}" type="text"
                                wire:model='max_price_pv.0' name='max_price_pv.0' />

                            <x-input name="min_order_quantity_pv.0" label="{{ __('Min. Order Quantity') }}"
                                type="text" wire:model='min_order_quantity_pv.0' name='min_order_quantity_pv.0' />

                            <x-input name="max_order_quantity_pv.0" label="{{ __('Max. Order Quantity') }}"
                                type="text" wire:model='max_order_quantity_pv.0' name='max_order_quantity_pv.0' />
                        </div>
                    </div>

                    @foreach ($inputs_pv as $key => $input_value)
                        <div class="relative flex items-center rounded-lg border-2 border-gray-200 shadow-lg">
                            <button
                                class="bg-danger absolute -right-2 -top-2 flex h-8 w-8 items-center justify-center rounded-full text-white hover:bg-red-600"
                                wire:click.prevent="remove_pv({{ $key }})">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                            <div class="grid grid-cols-4 items-end gap-2 p-4">
                                <x-native-select label="{{ __('Select Origin Country') }}"
                                    wire:model="country_id_pv.{{ $input_value }}"
                                    name='country_id_pv.{{ $input_value }}' placeholder="Select Origin Country"
                                    :options="getKeyValuesWithMap('Country', 'name', 'id')" option-label="name" option-value="id" required />

                                <x-input name="avb_stock_pv.{{ $input_value }}" label="{{ __('Available Stock') }}"
                                    type="text" wire:model='avb_stock_pv.{{ $input_value }}'
                                    name='avb_stock_pv.{{ $input_value }}' required />

                                <x-input name="sku_pv.{{ $input_value }}" label="{{ __('Stock Keping Unit') }}"
                                    type="text" wire:model='sku_pv.{{ $input_value }}'
                                    name='sku_pv.{{ $input_value }}' required />

                                <x-input name="barcode_pv.{{ $input_value }}" label="{{ __('Barcode') }}"
                                    type="text" wire:model='barcode_pv.{{ $input_value }}'
                                    name='barcode_pv.{{ $input_value }}' required />

                                <x-input name="quantity_type_pv.{{ $input_value }}"
                                    label="{{ __('Quantity Type') }}" type="text"
                                    wire:model='quantity_type_pv.{{ $input_value }}'
                                    name='quantity_type_pv.{{ $input_value }}' />

                                <div class="col-span-4">
                                    <div class="grid grid-cols-3 items-end justify-between gap-2">
                                        <p class="text-lg font-medium">Meaturement Details</p>
                                        <x-native-select :options="['kg', 'g', 't', 'oz']"
                                            wire:model="weight_units_pv.{{ $input_value }}"
                                            name='weight_units_pv.{{ $input_value }}' label="Weight Units" />
                                        <x-native-select :options="['m', 'cm', 'mm', 'in', 'ft']"
                                            wire:model="measurement_units.{{ $input_value }}"
                                            name='measurement_units.{{ $input_value }}' label="Measurement Units" />
                                    </div>
                                    <hr class="my-2 h-px border-0 bg-gray-200 dark:bg-gray-700" />
                                </div>

                                <div class="col-span-4">
                                    <div class="justify-betwen grid grid-cols-5 items-end gap-2">
                                        <x-input name="length_pv.{{ $input_value }}" label="{{ __('Length') }}"
                                            type="number" wire:model='length_pv.{{ $input_value }}'
                                            name='length_pv.{{ $input_value }}' />

                                        <x-input name="breadth_pv.{{ $input_value }}" label="{{ __('Breadth') }}"
                                            type="number" wire:model='breadth_pv.{{ $input_value }}'
                                            name='breadth_pv.{{ $input_value }}' />

                                        <x-input name="width_pv.{{ $input_value }}" label="{{ __('Width') }}"
                                            type="number" wire:model='width_pv.{{ $input_value }}'
                                            name='width_pv.{{ $input_value }}' />

                                        <x-input name="diameter_pv.{{ $input_value }}" label="{{ __('Diameter') }}"
                                            type="number" wire:model='diameter_pv.{{ $input_value }}'
                                            name='diameter_pv.{{ $input_value }}' />

                                        <x-input name="weight_pv.{{ $input_value }}" label="{{ __('Weight') }}"
                                            type="number" wire:model='weight_pv.{{ $input_value }}'
                                            name='weight_pv.{{ $input_value }}' />
                                    </div>
                                </div>

                                <div class="col-span-4">
                                    <div class="grid grid-cols-3 items-end justify-between gap-2">
                                        <p class="text-lg font-medium">Cost Details</p>
                                    </div>
                                    <hr class="my-2 h-px border-0 bg-gray-200 dark:bg-gray-700" />
                                </div>

                                <x-input name="max_discount_pv.{{ $input_value }}"
                                    label="{{ __('Max. Discount') }}" type="number"
                                    wire:model='max_discount_pv.{{ $input_value }}'
                                    name='max_discount_pv.{{ $input_value }}' />

                                <x-native-select :options="['Regular', 'Percentage']" label='Max. Discount Units'
                                    wire:model="max_discount_unit_pv.{{ $input_value }}"
                                    name='max_discount_unit_pv.{{ $input_value }}' />

                                <x-input name="tax_percentage_pv.{{ $input_value }}"
                                    label="{{ __('Tax Percentage') }}" type="number"
                                    wire:model='tax_percentage_pv.{{ $input_value }}'
                                    name='tax_percentage_pv.{{ $input_value }}' />

                                <x-input name="min_price_pv.{{ $input_value }}" label="{{ __('Min. Price') }}"
                                    type="text" wire:model='min_price_pv.{{ $input_value }}'
                                    name='min_price_pv.{{ $input_value }}' />

                                <x-input name="max_price_pv.{{ $input_value }}" label="{{ __('Max. Price') }}"
                                    type="text" wire:model='max_price_pv.{{ $input_value }}'
                                    name='max_price_pv.{{ $input_value }}' />

                                <x-input name="min_order_quantity_pv.{{ $input_value }}"
                                    label="{{ __('Min. Order Quantity') }}" type="text"
                                    wire:model='min_order_quantity_pv.{{ $input_value }}'
                                    name='min_order_quantity_pv.{{ $input_value }}' />

                                <x-input name="max_order_quantity_pv.{{ $input_value }}"
                                    label="{{ __('Max. Order Quantity') }}" type="text"
                                    wire:model='max_order_quantity_pv.{{ $input_value }}'
                                    name='max_order_quantity_pv.{{ $input_value }}' />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div
                class="col-span-6 mt-4 items-center justify-end rounded-lg bg-white px-4 py-3 dark:bg-gray-800 sm:flex sm:px-4">
                <button class="btn btn-primary dark:text-white dark:hover:text-gray-200" type="submit">
                    @if (!empty($title))
                        {{ __('Update') }}
                    @else
                        {{ __('Save') }}
                    @endif
                </button>
            </div>
        </div>
    </form>
</div>
