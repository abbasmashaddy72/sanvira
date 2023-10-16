<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="row-gap-0 grid-cols-1 gap-2 sm:grid">
        <div class="flex space-x-6">
            <x-radio id="main-category" label="{{ __('Main Category') }}" wire:model="type" value='Main Category'
                required />
            <x-radio id="sub-category" label="{{ __('Sub Category') }}" wire:model="type" value='Sub Category' required />
        </div>

        <x-input name="name" label="{{ __('Name') }}" type="text" wire:model.defer='name' required />

        <x-backend.image-upload :images="$this->image" :isUploaded="$this->imageIsUploaded" label="{{ __('Upload Image') }}" name="images"
            model="image" required />

        @if ($type == 'Sub Category')
            <x-select label="{{ __('Select Parent / Sub Category') }}" wire:model.defer="parent_id"
                placeholder="Select Parent Category" :async-data="route('api.admin.categories')" option-label="name" option-value="id" required />
        @endif
    </div>
</x-backend.modal-form>
