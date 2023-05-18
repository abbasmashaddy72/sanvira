<x-backend.modal-form form-action="add">
    <x-slot name="title">
        Update {{ $name }}
    </x-slot>

    <x-slot name="content">
        <div class="grid-cols-2 gap-2 row-gap-0 sm:grid">
            <x-input name="name" label="Name" type="text" wire:model='name' />

            <x-input name="email" label="Email" type="email" wire:model='email' />

            <x-input name="address" label="Address" type="text" wire:model='address' />

            <x-input name="number" label="Number" type="number" wire:model='number' />

            <x-input name="locality" label="Locality" type="text" wire:model='locality' />
        </div>
        <div>
            <x-backend.ckEditor id="body1en" lang="EN" name="description" label="Description"
                wire:model='description' />
        </div>
        <div>
            <x-backend.ckEditor id="body2en" lang="EN" name="terms_conditions" label="Terms & Conditions"
                wire:model='terms_conditions' />
        </div>
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary" type="submit">Save</button>
    </x-slot>
</x-backend.modal-form>
