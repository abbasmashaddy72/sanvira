<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('invoice.index') }}</x-slot>

    <x-backend.grid>
        <x-slot name="rt_button">
            <button wire:navigate href="{{ route('admin.invoice_add') }}"
                class="btn btn-primary mr-2 shadow-md">{{ __('Add') }}</button>
        </x-slot>

        <div class="col-span-12">
            @livewire('backend.table-invoice')
        </div>
    </x-backend.grid>
</x-app-layout>
