<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('delivery-note.index') }}</x-slot>

    <x-backend.grid>
        <x-slot name="rt_button">
            <button wire:navigate href="{{ route('admin.delivery_note_add') }}"
                class="btn btn-primary mr-2 shadow-md">{{ __('Add') }}</button>
        </x-slot>

        <div class="col-span-12">
            @livewire('backend.table-delivery-note')
        </div>
    </x-backend.grid>
</x-app-layout>
