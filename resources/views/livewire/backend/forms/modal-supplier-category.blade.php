<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="row-gap-0 grid-cols-1 gap-2 sm:grid">
        <div class="flex space-x-6">
            <x-radio id="main-category" label="Main Category" wire:model="type" value='Main Category' required />
            <x-radio id="sub-category" label="Sub Category" wire:model="type" value='Sub Category' required />
        </div>

        <x-input name="name" label="Name" type="text" wire:model.defer='name' required />

        <x-backend.image-upload :images="$this->image" :isUploaded="$this->imageIsUploaded" label="Upload Image" name="images" model="image"
            required />

        @if ($type == 'Sub Category')
            <x-select label="Select Parent / Sub Category" wire:model.defer="parent_id"
                placeholder="Select Parent Category" :async-data="route('api.admin.supplier_categories')" option-label="name" option-value="id" required />
        @endif
    </div>
</x-backend.modal-form>
