<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('quotation.index') }}</x-slot>

    <x-backend.grid>
        <div class="col-span-12">
            @livewire('backend.form-quotation', ['quotation_id' => $id ?? null])
        </div>
    </x-backend.grid>
</x-app-layout>
