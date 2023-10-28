<x-backend.modal-form form-action="add" title="{{ $name }}">
    <div class="row-gap-0 grid-cols-1 gap-2 sm:grid">
        <x-native-select label="{{ __('Select Role') }}" placeholder="Select one Role" :options="$roles"
            option-label="name" option-value="id" wire:model="role" required />

        <x-input name="name" label="{{ __('Name') }}" type="text" wire:model='name' required />

        <x-input name="email" label="{{ __('Email') }}" type="email" wire:model='email' required />

        <x-input name="mobile" label="{{ __('Mobile') }}" type="text" wire:model='mobile' required />

        <x-input name="street_no" label="{{ __('Street No') }}" type="text" wire:model='street_no' required />

        <x-input name="locality" label="{{ __('Locality') }}" type="text" wire:model='locality' required />

        <x-input name="landmark" label="{{ __('Landmark') }}" type="text" wire:model='landmark' required />

        <x-input name="zip_code" label="{{ __('Zip Code') }}" type="text" wire:model='zip_code' required />

        <x-checkbox id="subscription" label="{{ __('Subscription') }}" wire:model='subscription' />

        <x-input name="image" label="{{ __('Image') }}" type="text" wire:model='image' />

        <livewire:backend.location-dropdown cityId='{{ $city_id }}' />

        <x-inputs.password label="{{ __('Password') }}" name="password" wire:model='password' required />
    </div>
</x-backend.modal-form>
