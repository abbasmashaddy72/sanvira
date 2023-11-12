<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('invoice.index') }}</x-slot>

    <x-backend.grid>
        <div class="col-span-12">
            @livewire('backend.table-invoice')
        </div>
    </x-backend.grid>
</x-app-layout>
