<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="row-gap-0 grid-cols-2 gap-2 sm:grid">
        <x-input name="name" label="{{ __('Name') }}" type="text" wire:model.defer='name' />

        <x-input name="email" label="{{ __('Email') }}" type="email" wire:model.defer='email' />

        <x-input name="address" label="{{ __('Address') }}" type="text" wire:model.defer='address' />

        <x-input name="number" label="{{ __('Number') }}" type="number" wire:model.defer='number' />

        <x-input name="locality" label="{{ __('Locality') }}" type="text" wire:model.defer='locality' />
    </div>
    <div>
        <x-backend.ckEditor idPrefix="body1en" lang="EN" name="description" label="{{ __('Description') }}"
            wire:model.defer='description' />
    </div>
    <div>
        <x-backend.ckEditor idPrefix="body2en" lang="EN" name="terms_conditions"
            label="{{ __('Terms & Conditions') }}" wire:model.defer='terms_conditions' />
    </div>
</x-backend.modal-form>
