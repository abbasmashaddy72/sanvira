<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="grid gap-y-2">
        <x-select label="{{ __('Select Supplier') }}" wire:model.defer="supplier_id" placeholder="Select Supplier"
            :async-data="route('api.admin.suppliers')" option-label="company_name" option-value="id" required />

        <x-native-select label="{{ __('Select Account Type') }}" placeholder="Select Account Type" :options="getEnum('supplier_transactions', 'account_type')"
            wire:model.defer="account_type" required />

        <x-native-select label="{{ __('Select Transaction Type') }}" placeholder="Select Transaction Type"
            :options="getEnum('supplier_transactions', 'transaction_type')" wire:model.defer="transaction_type" />

        <x-input name="amount" label="{{ __('Amount') }}" type="number" wire:model.defer='amount' />

        <x-input name="start_date" label="{{ __('Start Date') }}" type="date" wire:model.defer='start_date' />

        <x-input name="end_days" label="{{ __('End Days') }}" type="number" wire:model.defer='end_days' />

        <x-backend.image-upload :images="$this->image" :isUploaded="$this->imageIsUploaded" label="{{ __('Upload Image') }}" name="images"
            model="image" />

        <x-native-select label="{{ __('Select Account Status') }}" placeholder="Select Account Status" :options="getEnum('supplier_transactions', 'status')"
            wire:model.defer="status" required />
    </div>
</x-backend.modal-form>
