<x-backend.modal-form form-action="add" title='{{ $name }}'>
    <div class="grid gap-y-2">
        <x-input name="name" label="Name" type="text" wire:model.defer='name' />

        <x-input name="image" label="Image" type="file" wire:model.defer='image' />
    </div>
</x-backend.modal-form>
