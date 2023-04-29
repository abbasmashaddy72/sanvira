<x-backend.modal-form form-action="add">
    <x-slot name="title">
        Update {{ $name }}
    </x-slot>

    <x-slot name="content">
        <div class="grid-cols-1 gap-2 row-gap-0 sm:grid">
            <div class="flex space-x-6">
                <x-radio id="main-category" label="Main Category" wire:model="type" value='Main Category' />
                <x-radio id="sub-category" label="Sub Category" wire:model="type" value='Sub Category' />
            </div>

            <x-input name="name" label="Name" type="text" wire:model='name' />

            <x-input name="image" label="Image" type="file" wire:model='image' />

            @if ($type == 'Sub Category')
                <x-select label="Select Parent Category" wire:model.defer="parent_id"
                    placeholder="Select Parent Category" :async-data="route('api.admin.supplier_categories')" option-label="name" option-value="id" />
            @endif
        </div>
    </x-slot>

    <x-slot name="buttons">
        <button class="btn btn-primary" type="submit">Save</button>
    </x-slot>
</x-backend.modal-form>
