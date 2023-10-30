<x-backend.modal-form form-action="add" title='{{ $name }}'>
    <div class="grid gap-y-2">
        <x-input name="name" label="{{ __('Name') }}" type="text" wire:model='name' required />

        <x-native-select label="Select Account Type" placeholder="Select Account Type" :options="$account_type_enum"
            wire:model="account_type" />

        <x-backend.image-upload :images="$this->image" :isUploaded="$this->imageIsUploaded" label="{{ __('Upload Image') }}" name="images"
            model="image" required />
    </div>
</x-backend.modal-form>
