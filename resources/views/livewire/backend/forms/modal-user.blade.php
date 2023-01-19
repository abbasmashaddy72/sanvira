<x-backend.modal-form form-action="add">
    <x-slot name="title">
        Update {{ $name }}
    </x-slot>

    <x-slot name="content">
        <div class="grid-cols-1 gap-2 row-gap-0 sm:grid">
            <x-native-select label="Select Role" placeholder="Select one Role" :options="$roles" option-label="name"
                option-value="id" wire:model.defer="role" />

            <x-input name="name" label="Name" type="text" wire:model='name' />

            <x-input name="email" label="Email" type="email" wire:model='email' />

            <x-inputs.password label="{{ __('Password') }}" name="password" wire:model='password' />
        </div>
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary" type="submit">Save</button>
    </x-slot>
</x-backend.modal-form>
