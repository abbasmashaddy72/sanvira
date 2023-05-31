<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid gap-y-2">
        <x-select label="Select Brand" wire:model.defer="brand_id" placeholder="Select Brand" :async-data="route('api.admin.brands')"
            option-label="name" option-value="id" required />

        <x-native-select label="Select Account Type" placeholder="Select  Account Type" :options="getEnum('brand_transactions', 'account_type')"
            wire:model.defer="account_type" required />

        <x-native-select label="Select Transaction Type" placeholder="Select Transaction Type" :options="getEnum('brand_transactions', 'transaction_type')"
            wire:model.defer="transaction_type" />

        <x-input name="amount" label="Amount" type="number" wire:model.defer='amount' />

        <x-input name="start_date" label="Start Date" type="date" wire:model.defer='start_date' />

        <x-input name="end_days" label="End Days" type="number" wire:model.defer='end_days' />

        <x-backend.image-upload :images="$this->image" :isUploaded="$this->imageIsUploaded" label="Upload Image" name="images"
            model="image" />

        <x-native-select label="Select Account Status" placeholder="Select Account Status" :options="getEnum('brand_transactions', 'status')"
            wire:model.defer="status" required />
    </div>
</x-backend.modal-form>
