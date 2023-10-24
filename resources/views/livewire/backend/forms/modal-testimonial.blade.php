<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid gap-y-2">
        <x-select label="{{ __('Select User') }}" wire:model="user_id" placeholder="Select User" :async-data="route('api.admin.users')"
            option-label="name" option-value="id" required />

        <x-input name="designation" label="{{ __('Designation') }}" type="text" wire:model.defer='designation'
            required />

        <x-textarea name="message" label="{{ __('Message') }}" wire:model.defer='message' required />

        <x-checkbox id="show_designation" label="{{ __('Show Dsignation') }}" wire:model.defer='show_designation' />

        <x-input name="rating" label="{{ __('Rating') }}" type="number" max="5" wire:model.defer='rating'
            required />

        <x-backend.image-upload :images="$this->logo" :isUploaded="$this->logoIsUploaded" label="{{ __('Upload Logo') }}" name="logo"
            model="logo" />
    </div>
</x-backend.modal-form>
