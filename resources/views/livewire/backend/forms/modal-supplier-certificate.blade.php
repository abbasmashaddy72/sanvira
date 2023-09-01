<x-backend.modal-form form-action="add" title="{{ $title }}">
    <div class="grid gap-y-2">
        <x-input name="title" label="{{ __('Title') }}" type="text" wire:model.defer='title' required />

        <x-select name="type" label="{{ __('Type') }}" :options="['Award', 'Certificate']" wire:model.defer='type' required />

        <x-input name="attachment" label="{{ __('Attachment') }}" type="file" wire:model.defer='attachment' required />

        @role('Admin' || 'Super Admin')
            <x-checkbox name="verification" label="{{ __('Verification') }}" wire:model.defer='verification' />
        @endrole
    </div>
</x-backend.modal-form>
