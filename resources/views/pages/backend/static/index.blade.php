<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('homepage.index') }}</x-slot>

    <x-backend.grid>
        <div class="col-span-12">
            @livewire('backend.forms.static-homepage')
        </div>
    </x-backend.grid>
</x-app-layout>
