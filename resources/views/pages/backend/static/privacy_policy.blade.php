<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('homepage.privacy_policy') }}</x-slot>

    <x-backend.grid>
        <div class="col-span-12">
            @livewire('backend.forms.static-homepage', ['type' => 'Privacy Policy'])
        </div>
    </x-backend.grid>
</x-app-layout>
