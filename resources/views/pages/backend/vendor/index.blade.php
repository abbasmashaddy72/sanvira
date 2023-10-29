<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('vendor.index') }}</x-slot>

    <x-backend.grid>
        <x-slot name="rt_button">
            <button onclick="Livewire.dispatch('openModal', { component: 'backend.modal-vendor' } )"
                class="btn btn-primary mr-2 shadow-md">{{ __('Add') }}</button>
        </x-slot>

        <div class="col-span-12">
            @livewire('backend.table-vendor')
        </div>
    </x-backend.grid>
</x-app-layout>
