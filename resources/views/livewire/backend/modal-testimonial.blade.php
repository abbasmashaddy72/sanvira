<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid gap-y-2">
        <x-input name="name" label="{{ __('Name') }}" type="text" wire:model='name' required />

        <x-input name="designation" label="{{ __('Designation') }}" type="text" wire:model='designation' required />

        <x-textarea name="message" label="{{ __('Message') }}" wire:model='message' required />

        <x-checkbox id="show_designation" label="{{ __('Show Dsignation') }}" wire:model='show_designation' />

        <x-input name="rating" label="{{ __('Rating') }}" type="number" max="5" wire:model='rating'
            required />

        <x-backend.image-upload :images="$this->logo" :isUploaded="$this->logoIsUploaded" label="{{ __('Upload Logo') }}" name="logo"
            model="logo" />
    </div>
</x-backend.modal-form>
