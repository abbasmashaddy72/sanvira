<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('homepage.return_refund') }}</x-slot>

    <x-backend.grid>
        <div class="col-span-12">
            @livewire('backend.forms.static-homepage', ['type' => 'Return Refund'])
        </div>
    </x-backend.grid>
</x-app-layout>
