<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('supplier-category.index') }}</x-slot>

    <x-backend.grid>
        <x-slot name="rt_button">
            <button onclick="Livewire.emit('openModal', 'backend.forms.modal-supplier-category')"
                class="mr-2 shadow-md btn btn-primary">{{ 'Add' }}</button>
        </x-slot>

        <div class="col-span-12">
            @livewire('backend.tables.supplier-categories-table')
        </div>
    </x-backend.grid>
</x-app-layout>
