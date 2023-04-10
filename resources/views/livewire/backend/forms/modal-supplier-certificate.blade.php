<x-backend.modal-form form-action="add">
    <x-slot name="title">
        Update {{ $title }}
    </x-slot>

    <x-slot name="content">
        <div class="grid gap-y-2">
            <x-input name="title" label="Title" type="text" wire:model='title' />

            <x-select name="type" label="Type" :options="['Award', 'Certificate']" wire:model='type' />

            <x-input name="attachment" label="Attachment" type="file" wire:model='attachment' />
        </div>
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary" type="submit">Save</button>
    </x-slot>
</x-backend.modal-form>
