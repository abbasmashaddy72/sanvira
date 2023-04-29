<x-backend.modal-form form-action="add">
    <x-slot name="title">
        Update {{ $company_name }}
    </x-slot>

    <x-slot name="content">
        <div class="grid-cols-1 gap-2 row-gap-0 sm:grid">
            <x-input name="company_name" label="Company Name" type="text" wire:model='company_name' />

            <x-input name="company_email" label="Company Email" type="email" wire:model='company_email' />

            <x-input name="company_address" label="Company Address" type="text" wire:model='company_address' />

            <x-input name="company_number" label="Company Number" type="number" wire:model='company_number' />

            <x-input name="company_locality" label="Company Locality" type="text" wire:model='company_locality' />

            <x-input name="tagline" label="Tagline" type="text" wire:model='tagline' />

            <x-input name="logo" label="Logo" type="file" wire:model='logo' />

            <x-input name="yoe" label="Year of Establishment" type="number" wire:model='yoe' />

            <x-input name="website_url" label="Website Url" type="text" wire:model='website_url' />

            <x-input name="description" label="Description" type="text" wire:model='description' />

            <x-input name="terms_conditions" label="Terms & Conditions" type="text" wire:model='terms_conditions' />

            <x-input name="contact_person_name" label="Contact Person Name" type="text"
                wire:model='contact_person_name' />

            <x-input name="contact_person_email" label="Contact Person Email" type="email"
                wire:model='contact_person_email' />

            <x-input name="contact_person_number" label="Contact Person Number" type="number"
                wire:model='contact_person_number' />
        </div>
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary" type="submit">Save</button>
    </x-slot>
</x-backend.modal-form>
