<x-backend.modal-form form-action="add" title='{{ $enquiry_id }}'>
    <div class="grid gap-y-2">
        <x-input name="enquiry_id" label="{{ __('enquiry_id') }}" type="text" wire:model='enquiry_id' required />

        <x-native-select label="Select Status" placeholder="Select Status" :options="$status_enum" wire:model="status" />
    </div>
</x-backend.modal-form>
