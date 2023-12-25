<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('faq.index') }}</x-slot>

    <x-backend.grid>
        <x-slot name="rt_button">
            <button onclick="Livewire.dispatch('openModal', { component: 'backend.modal-faq' } )"
                class="btn btn-primary mr-2 shadow-md">{{ __('Add') }}</button>
        </x-slot>

        <div class="col-span-12">
            @livewire('backend.table-faq')
        </div>
    </x-backend.grid>
</x-app-layout>
