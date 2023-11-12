<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('quotation.index') }}</x-slot>

    <x-backend.grid>
        <div class="col-span-12">
            @livewire('backend.table-quotation')
        </div>
    </x-backend.grid>
</x-app-layout>
