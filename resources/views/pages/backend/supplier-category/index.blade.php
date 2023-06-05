<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('supplier-category.index') }}</x-slot>

    <x-backend.grid>
        <x-slot name="rt_button">
            <button onclick="Livewire.emit('openModal', 'backend.forms.modal-supplier-category')"
                class="btn btn-primary mr-2 shadow-md">{{ 'Add' }}</button>
        </x-slot>

        <div class="col-span-12">
            @livewire('backend.tables.supplier-categories-table')
        </div>
    </x-backend.grid>
</x-app-layout>
