<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('enquiry.index') }}</x-slot>

    <x-backend.grid>
        <div class="col-span-12">
            @livewire('backend.table-enquiry')
        </div>
    </x-backend.grid>
</x-app-layout>
