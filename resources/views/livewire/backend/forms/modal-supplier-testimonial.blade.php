<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid gap-y-2">
        <x-input name="name" label="{{ __('Name') }}" type="text" wire:model.defer='name' required />

        <x-textarea name="message" label="{{ __('Message') }}" wire:model.defer='message' required />

        <x-input name="year" label="{{ __('Year') }}" type="number" wire:model.defer='year' required />

        <x-input name="rating" label="{{ __('Rating') }}" type="number" max="5" wire:model.defer='rating'
            required />

        <x-backend.image-upload :images="$this->logo" :isUploaded="$this->logoIsUploaded" label="{{ __('Upload Logo') }}" name="logo"
            model="logo" />
    </div>
</x-backend.modal-form>
