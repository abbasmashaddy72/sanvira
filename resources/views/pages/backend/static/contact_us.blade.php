<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('homepage.index') }}</x-slot>

    <x-backend.grid title='Contact Us'>
        <div class="col-span-12">

            <div class="py-12">
                @livewire('backend.tables.contact-us-table')
            </div>
        </div>
    </x-backend.grid>
</x-app-layout>
