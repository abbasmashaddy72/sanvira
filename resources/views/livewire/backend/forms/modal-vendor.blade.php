<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid gap-y-2">
        <x-input name="name" label="{{ __('Name') }}" type="text" wire:model='name' required />
    </div>
</x-backend.modal-form>
