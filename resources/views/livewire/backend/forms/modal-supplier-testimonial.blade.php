<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid gap-y-2">
        <x-input name="name" label="Name" type="text" wire:model.defer='name' required />

        <x-textarea name="message" label="Message" wire:model.defer='message' required />

        <x-input name="year" label="Year" type="number" wire:model.defer='year' required />

        <x-input name="rating" label="Rating" type="number" max="5" wire:model.defer='rating' required />

        <x-backend.image-upload :images="$this->logo" :isUploaded="$this->logoIsUploaded" label="Upload Logo" name="logo" model="logo" />
    </div>
</x-backend.modal-form>
