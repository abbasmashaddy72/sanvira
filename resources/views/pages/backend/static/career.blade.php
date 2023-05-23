<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('homepage.career') }}</x-slot>

    <x-backend.grid>
        <div class="col-span-12">
            @livewire('backend.forms.static-homepage', ['type' => 'Career'])
        </div>
    </x-backend.grid>
</x-app-layout>
