<x-backend.modal-form form-action="add" title="{{ $title }}">
    <div class="grid gap-y-2">
        <x-input name="title" label="Title" type="text" wire:model.defer='title' required />

        <x-select name="type" label="Type" :options="['Award', 'Certificate']" wire:model.defer='type' required />

        <x-input name="attachment" label="Attachment" type="file" wire:model.defer='attachment' required />
    </div>
</x-backend.modal-form>
