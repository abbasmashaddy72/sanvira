<div>
    <div class="mt-4">
        <x-select label="{{ __('Country') }}" wire:model="parent_id" placeholder="Select Country"
            :async-data="route('api.admin.countries')" option-label="name" option-value="id" required />
    </div>
    <div class="mt-4">
        <x-select label="{{ __('State') }}" wire:model="parent_id" placeholder="Select State"
            :async-data="route('api.admin.states')" option-label="name" option-value="id" required />
    </div>
    <div class="mt-4">
        <x-select label="{{ __('City') }}" wire:model="parent_id" placeholder="Select City"
            :async-data="route('api.admin.cities')" option-label="name" option-value="id" required />
    </div>
</div>