<x-backend.modal-form form-action="add" title='{{ $order_id }}'>
    <div class="grid gap-y-2">
        <x-input name="order_id" label="{{ __('Order Id') }}" type="text" wire:model='order_id' required />

        <x-native-select label="Select Status" placeholder="Select Status" :options="$status_enum" wire:model="status" />
    </div>
</x-backend.modal-form>
