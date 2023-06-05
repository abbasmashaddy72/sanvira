<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="row-gap-0 grid-cols-1 gap-2 sm:grid">
        <x-native-select label="Select Role" placeholder="Select one Role" :options="$roles" option-label="name"
            option-value="id" wire:model.defer="role" required />

        <x-input name="name" label="Name" type="text" wire:model.defer='name' required />

        <x-input name="email" label="Email" type="email" wire:model.defer='email' required />

        <x-inputs.password label="{{ __('Password') }}" name="password" wire:model.defer='password' required />
    </div>
</x-backend.modal-form>
