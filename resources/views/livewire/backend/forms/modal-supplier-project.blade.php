<x-backend.modal-form form-action="add">
    <x-slot name="title">
        Update {{ $name }}
    </x-slot>

    <x-slot name="content">
        <div class="grid-cols-1 gap-2 row-gap-0 sm:grid">
            <x-input name="name" label="Name" type="text" wire:model='name' />

            <x-input name="country" label="Country" type="text" wire:model='country' />

            <x-input name="city" label="City" type="text" wire:model='city' />

            <x-textarea name="description" label="Description" type="text" wire:model='description' />

            <x-input name="year_range" label="Year Range" type="text" wire:model='year_range' />

            <x-textarea name="feedback" label="Feedback" type="text" wire:model='feedback' />
        </div>
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary" type="submit">Save</button>
    </x-slot>
</x-backend.modal-form>
