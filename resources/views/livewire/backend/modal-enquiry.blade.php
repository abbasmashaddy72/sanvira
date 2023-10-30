<x-backend.modal-form form-action="add" title='{{ $rfq_id }}'>
    <div class="grid gap-y-2">
        <x-input name="rfq_id" label="{{ __('rfq_id') }}" type="text" wire:model='rfq_id' required />

        <x-input name="user_id" label="{{ __('user_id') }}" type="text" wire:model='user_id' required />

        <x-native-select label="Select Status" placeholder="Select Status" :options="$status_enum" wire:model="status" />
    </div>
</x-backend.modal-form>
