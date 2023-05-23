<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid-cols-1 gap-2 row-gap-0 sm:grid">
        <div class="flex space-x-6">
            <x-radio id="main-category" label="Main Category" wire:model="type" value='Main Category' />
            <x-radio id="sub-category" label="Sub Category" wire:model="type" value='Sub Category' />
        </div>

        <x-input name="name" label="Name" type="text" wire:model.defer='name' />

        <x-input name="image" label="Image" type="file" wire:model.defer='image' />

        @if ($type == 'Sub Category')
            <x-select label="Select Parent Category" wire:model.defer="parent_id" placeholder="Select Parent Category"
                :async-data="route('api.admin.supplier_categories')" option-label="name" option-value="id" />
        @endif
    </div>
</x-backend.modal-form>
