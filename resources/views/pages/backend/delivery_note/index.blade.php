<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('delivery-note.index') }}</x-slot>

    <x-backend.grid>
        <div class="col-span-12">
            @livewire('backend.table-delivery-note')
        </div>
    </x-backend.grid>
</x-app-layout>
