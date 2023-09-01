<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid gap-y-2">
        <x-input name="name" label="{{ __('Name') }}" type="text" wire:model.defer='name' required />

        <x-input name="email" label="{{ __('Email') }}" type="email" wire:model.defer='email' required />

        <x-input name="phone" label="{{ __('Phone Number') }}" type="number" wire:model.defer='phone' required />

        <x-input name="poc" label="{{ __('Point of Contact') }}" type="text" wire:model.defer='poc'
            required />

        <x-backend.image-upload :images="$this->image" :isUploaded="$this->imageIsUploaded" label="Upload Image" name="image"
            model="image" />
    </div>
</x-backend.modal-form>
