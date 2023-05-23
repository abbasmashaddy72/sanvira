<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid gap-y-2">
        <x-input name="name" label="Name" type="text" wire:model.defer='name' />

        <x-textarea name="message" label="Message" wire:model.defer='message' />

        <x-input name="year" label="Year" type="number" wire:model.defer='year' />

        <x-input name="rating" label="Rating" type="number" max="5" wire:model.defer='rating' />

        <x-input name="logo" label="Logo" type="file" wire:model.defer='logo' />
    </div>
</x-backend.modal-form>
