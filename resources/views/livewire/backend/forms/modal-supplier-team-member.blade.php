<x-backend.modal-form form-action="add">
    <x-slot name="title">
        Update {{ $name }}
    </x-slot>

    <x-slot name="content">
        <div class="grid gap-y-2">
            <x-input name="name" label="Name" type="text" wire:model.defer='name' />

            <x-input name="email" label="Email" type="email" wire:model.defer='email' />

            <x-input name="phone" label="Phone Number" type="number" wire:model.defer='phone' />

            <x-input name="designation" label="Designation" type="text" wire:model.defer='designation' />

            <x-input name="image" label="Image" type="file" wire:model.defer='image' />
        </div>
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary" type="submit">Save</button>
    </x-slot>
</x-backend.modal-form>
