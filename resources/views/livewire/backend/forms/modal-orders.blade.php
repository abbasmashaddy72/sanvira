<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid gap-y-2">
        <x-native-select label="{{ __('Select User') }}" wire:model.live="status" placeholder="Select Status" :options="getEnum('orders', 'status')"
            required />
    </div>
</x-backend.modal-form>
