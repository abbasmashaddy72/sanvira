<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid gap-y-2">
        <x-select label="Select Brand" wire:model.defer="brand_id" placeholder="Select Brand" :async-data="route('api.admin.brands')"
            option-label="name" option-value="id" />

        <x-native-select label="Select Status" placeholder="Select one status" :options="getEnum('supplier_transactions', 'account_type')"
            wire:model.defer="account_type" />

        <x-native-select label="Select Status" placeholder="Select one status" :options="getEnum('supplier_transactions', 'transaction_type')"
            wire:model.defer="transaction_type" />

        <x-input name="amount" label="Amount" type="number" wire:model.defer='amount' />

        <x-input name="start_date" label="Start Date" type="date" wire:model.defer='start_date' />

        <x-input name="end_days" label="End Days" type="number" wire:model.defer='end_days' />

        <x-input name="image" label="Image" type="file" wire:model.defer='image' />

        <x-native-select label="Select Status" placeholder="Select one status" :options="getEnum('supplier_transactions', 'status')"
            wire:model.defer="status" />
    </div>
</x-backend.modal-form>
