<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid gap-y-2">
        <x-input name="name" label="Name" type="text" wire:model.defer='name' required />

        <x-input name="url" label="Redirect Url" type="text" wire:model.defer='url' required />

        <x-backend.image-upload :images="$this->image" :isUploaded="$this->imageIsUploaded" label="Upload Image" name="images" model="image"
            required />
    </div>
</x-backend.modal-form>
