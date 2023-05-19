<x-backend.modal-form form-action="add">
    <x-slot name="title">
        Update {{ $company_name }}
    </x-slot>

    <x-slot name="content">
        <div class="grid-cols-2 gap-2 row-gap-0 sm:grid">
            <x-input name="company_name" label="Company Name" type="text" wire:model.defer='company_name' />

            <x-input name="company_email" label="Company Email" type="email" wire:model.defer='company_email' />

            <x-input name="company_address" label="Company Address" type="text" wire:model.defer='company_address' />

            <x-input name="company_number" label="Company Number" type="number" wire:model.defer='company_number' />

            <x-input name="company_locality" label="Company Locality" type="text" wire:model.defer='company_locality' />

            <x-input name="tagline" label="Tagline" type="text" wire:model.defer='tagline' />

            <x-input name="logo" label="Logo" type="file" wire:model.defer='logo' />

            <x-input name="yoe" label="Year of Establishment" type="number" wire:model.defer='yoe' />

            <x-input name="website_url" label="Website Url" type="text" wire:model.defer='website_url' />

            <x-input name="terms_conditions" label="Terms & Conditions" type="text" wire:model.defer='terms_conditions' />

            <x-input name="contact_person_name" label="Contact Person Name" type="text"
                wire:model.defer='contact_person_name' />

            <x-input name="contact_person_email" label="Contact Person Email" type="email"
                wire:model.defer='contact_person_email' />

            <x-input name="contact_person_number" label="Contact Person Number" type="number"
                wire:model.defer='contact_person_number' />
        </div>
        <div>
            <x-backend.ckEditor id="body1en" lang="EN" name="description" label="Description"
                wire:model.defer='description' />
        </div>
        <div>
            <x-backend.ckEditor id="body2en" lang="EN" name="terms_conditions" label="Terms & Conditions"
                wire:model.defer='terms_conditions' />
        </div>
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary" type="submit">Save</button>
    </x-slot>
</x-backend.modal-form>
