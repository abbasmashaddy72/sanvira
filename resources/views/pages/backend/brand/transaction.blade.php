<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('brand.transaction') }}</x-slot>

    <x-backend.grid>
        <x-slot name="rt_button">
            <button onclick="Livewire.emit('openModal', 'backend.forms.modal-brand-transaction')"
                class="mr-2 shadow-md btn btn-primary">{{ 'Add' }}</button>
        </x-slot>

        <div class="col-span-12">
            @livewire('backend.tables.brand-transactions-table')
        </div>
    </x-backend.grid>
</x-app-layout>
