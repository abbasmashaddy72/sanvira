<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('supplier.profile', $supplier) }}</x-slot>

    <x-backend.grid>
        <x-slot name="rt_button">
            <button
                onclick="Livewire.emit('openModal', 'backend.forms.modal-supplier', {{ json_encode(['supplier_id' => $supplier->id]) }})"
                class="mr-2 shadow-md btn btn-primary">{{ 'Edit' }}</button>
        </x-slot>

        <div class="col-span-12">
            <div class="grid-cols-2 gap-2 row-gap-0 sm:grid">
                <p>{{ $supplier->company_name }}</p>
                <p>{{ $supplier->company_email }}</p>
                <p>{{ $supplier->company_address }}</p>
                <p>{{ $supplier->company_number }}</p>
                <p>{{ $supplier->company_locality }}</p>
                <p>{{ $supplier->tagline }}</p>
                <p>{{ $supplier->logo }}</p>
                <p>{{ $supplier->yoe }}</p>
                <p>{{ $supplier->website_url }}</p>
                <div>{!! $supplier->description !!}</div>
                <div>{!! $supplier->terms_conditions !!}</div>
                <p>{{ $supplier->contact_person_name }}</p>
                <p>{{ $supplier->contact_person_email }}</p>
                <p>{{ $supplier->contact_person_number }}</p>
            </div>
        </div>
    </x-backend.grid>

    <x-backend.grid title="Certificates">
        <x-slot name="rt_button">
            <button
                onclick="Livewire.emit('openModal', 'backend.forms.modal-supplier-certificate', {{ json_encode(['supplier_id' => $supplier->id]) }})"
                class="mr-2 shadow-md btn btn-primary">{{ 'Add' }}</button>
        </x-slot>

        <div class="col-span-12">
            @livewire('backend.tables.supplier-certificates-table', ['supplier_id' => $supplier->id])
        </div>
    </x-backend.grid>

    <x-backend.grid title="Projects">
        <x-slot name="rt_button">
            <button
                onclick="Livewire.emit('openModal', 'backend.forms.modal-supplier-project', {{ json_encode(['supplier_id' => $supplier->id]) }})"
                class="mr-2 shadow-md btn btn-primary">{{ 'Add' }}</button>
        </x-slot>

        <div class="col-span-12">
            @livewire('backend.tables.supplier-projects-table', ['supplier_id' => $supplier->id])
        </div>
    </x-backend.grid>

    <x-backend.grid title="Products">
        <x-slot name="rt_button">
            <button
                onclick="Livewire.emit('openModal', 'backend.forms.modal-supplier-product', {{ json_encode(['supplier_id' => $supplier->id]) }})"
                class="mr-2 shadow-md btn btn-primary">{{ 'Add' }}</button>
        </x-slot>

        <div class="col-span-12">
            @livewire('backend.tables.supplier-products-table', ['supplier_id' => $supplier->id])
        </div>
    </x-backend.grid>
</x-app-layout>
