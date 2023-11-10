<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('delivery_note.index') }}</x-slot>

    <x-backend.grid>
        <div class="col-span-12">
            @livewire('backend.form-delivery-note', ['delivery_note_id' => $id ?? null])
        </div>
    </x-backend.grid>
</x-app-layout>
