<x-backend.modal-form form-action="add" title='{{ $company_name }}'>
    <p class="text-md mb-2 rounded-lg bg-orange-200 p-2 text-gray-700">Note: The Contact Person First Name & Last 3
        Digits of Contact Person Number will be used as Password with '@' in Between both text, Example: Name@123 where
        Name is the First Name of Contact Person Name & 123 is the Last 3 Digits of the Contact Person Number</p>
    <div class="grid grid-cols-3 gap-2">
        <x-input name="company_name" label="{{ __('Company Name') }}" type="text" wire:model.defer='company_name'
            required />

        <x-input name="company_email" label="{{ __('Company Email') }}" type="email" wire:model.defer='company_email' />

        <x-input name="company_address" label="{{ __('Company Address') }}" type="text"
            wire:model.defer='company_address' required />

        <x-input name="company_number" label="{{ __('Company Number') }}" type="number"
            wire:model.defer='company_number' />

        <x-input name="company_locality" label="{{ __('Company Locality') }}" type="text"
            wire:model.defer='company_locality' required />

        <x-input name="tagline" label="{{ __('Tagline') }}" type="text" wire:model.defer='tagline' />

        <x-backend.image-upload :images="$this->logo" :isUploaded="$this->logoIsUploaded" label="{{ __('Upload Logo') }}" name="logo"
            model="logo" />

        <x-input name="license" label="{{ __('License') }}" type="text" wire:model.defer='license' />

        <x-input name="doe" label="{{ __('Year of Establishment') }}" type="date" wire:model.defer='doe'
            required />

        <x-input name="type" label="{{ __('Type of Company') }}" type="text" wire:model.defer='type'
            required />

        <x-input name="website_url" label="{{ __('Website Url') }}" type="text" wire:model.defer='website_url' />

        <x-input name="contact_person_name" label="{{ __('Contact Person Name') }}" type="text"
            wire:model.defer='contact_person_name' required />

        <x-input name="contact_person_email" label="{{ __('Contact Person Email') }}" type="email"
            wire:model.defer='contact_person_email' required />

        <x-input name="contact_person_number" label="{{ __('Contact Person Number') }}" type="number"
            wire:model.defer='contact_person_number' required />

        <x-input name="contact_person_designation" label="{{ __('Contact Person Designation') }}" type="text"
            wire:model.defer='contact_person_designation' required />
    </div>
    <div>
        <x-backend.ckEditor idPrefix="body1en" lang="EN" name="description" label="{{ __('Description') }}"
            wire:model.defer='description' />
    </div>
    <div>
        <x-backend.ckEditor idPrefix="body2en" lang="EN" name="terms_conditions"
            label="{{ __('Terms & Conditions') }}" wire:model.defer='terms_conditions' />
    </div>
</x-backend.modal-form>
