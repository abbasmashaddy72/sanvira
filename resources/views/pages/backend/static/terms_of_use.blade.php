<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('homepage.terms_of_use') }}</x-slot>

    <x-backend.grid>
        <div class="col-span-12">
            @livewire('backend.static-homepage', ['type' => 'Terms of Use'])
        </div>
    </x-backend.grid>
</x-app-layout>
