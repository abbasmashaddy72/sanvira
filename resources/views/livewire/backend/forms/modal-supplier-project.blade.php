<x-backend.modal-form form-action="add" title="{{ $name }}">
    <x-dialog z-index="z-50" blur="md" align="center" />
    <div class="grid-cols-2 gap-2 row-gap-0 sm:grid">
        <x-input name="name" label="{{ __('Name') }}" type="text" wire:model.defer='name' required />

        <x-select label="{{ __('Select Origin Country') }}" wire:model.defer="country_id"
            placeholder="Select Origin Country" :async-data="route('api.admin.countries')" option-label="name" option-value="id" required />

        <x-input name="city" label="{{ __('City') }}" type="text" wire:model.defer='city' required />

        <x-input name="year_range" label="{{ __('Year Range') }}" type="text" wire:model.defer='year_range'
            placeholder="2021 - 2023 or 2020" required />

        <x-textarea name="feedback" label="{{ __('Feedback') }}" type="text" wire:model.defer='feedback' required />

        <div class="card">
            <x-backend.image-upload :images="$this->images" :isUploaded="$this->isUploaded" label="{{ __('Upload Images') }}" name="images"
                deletId="{{ $supplier_project_id }}" model="images" />
        </div>
    </div>

    <div>
        <x-backend.ckEditor idPrefix="body1en" lang="EN" name="description" label="{{ __('Description') }}"
            wire:model.defer='description' />
    </div>
</x-backend.modal-form>
