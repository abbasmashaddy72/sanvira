<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('supplier.profile', $supplier) }}</x-slot>

    <x-backend.grid>
        <x-slot name="rt_button">
            <button
                onclick="Livewire.emit('openModal', 'backend.forms.modal-supplier', {{ json_encode(['supplier_id' => $supplier->id]) }})"
                class="mr-2 shadow-md btn btn-primary">{{ 'Edit' }}</button>
        </x-slot>

        <div class="col-span-12">
            <div class="px-5 pt-5 mt-5 box">
                <div class="flex flex-col pb-5 -mx-5 border-b lg:flex-row border-slate-200/60 dark:border-darkmode-400">
                    <div class="flex items-center justify-center flex-1 px-5 lg:justify-start">
                        <div class="relative flex-none w-20 h-20 sm:w-24 sm:h-24 lg:w-32 lg:h-32 image-fit">
                            <img alt="{{ $supplier->company_name }}" class="rounded-md"
                                src="{{ asset('storage/' . $supplier->logo) }}">
                        </div>
                        <div class="ml-5">
                            <div class="w-24 text-lg font-medium truncate sm:w-40 sm:whitespace-normal">
                                {{ $supplier->company_name }}</div>
                            <div class="text-slate-500">{{ Str::limit($supplier->tagline, 40) }}</div>
                            <div class="text-slate-500">
                                <span class="font-semibold text-primary">YOE: </span>{{ $supplier->yoe }}
                            </div>
                            <a href="{{ $supplier->website_url }}" class="text-primary">Website</a>
                        </div>
                    </div>
                    <div
                        class="flex-1 px-5 pt-5 mt-6 border-t border-l border-r lg:mt-0 border-slate-200/60 dark:border-darkmode-400 lg:border-t-0 lg:pt-0">
                        <div class="font-medium text-center lg:text-left lg:mt-3">Contact Details</div>
                        <div class="flex flex-col items-center justify-center mt-4 lg:items-start">
                            <div class="flex items-center truncate sm:whitespace-normal">
                                <i data-feather="map-pin" class="w-4 h-4 mr-2 text-slate-500"></i>
                                {{ $supplier->company_locality }}
                            </div>
                            <div class="flex items-center mt-3 truncate sm:whitespace-normal">
                                <i data-feather="map" class="w-4 h-4 mr-2 text-slate-500"></i>
                                {{ $supplier->company_address }}
                            </div>
                            <a href="{{ 'mailto:' . $supplier->company_email }}"
                                class="flex items-center mt-3 truncate sm:whitespace-normal text-primary">
                                <i data-feather="at-sign" class="w-4 h-4 mr-2 text-slate-500"></i>
                                {{ $supplier->company_email }}
                            </a>
                            <a href='{{ 'tell:' . $supplier->company_number }}'
                                class="flex items-center mt-3 truncate sm:whitespace-normal text-primary">
                                <i data-feather="phone" class="w-4 h-4 mr-2 text-slate-500"></i>
                                {{ $supplier->company_number }}
                            </a>
                        </div>
                    </div>
                    <div
                        class="flex-1 px-5 pt-5 mt-6 border-t border-l border-r lg:mt-0 border-slate-200/60 dark:border-darkmode-400 lg:border-t-0 lg:pt-0">
                        <div class="font-medium text-center lg:text-left lg:mt-3">Manager Details</div>
                        <div class="flex flex-col items-center justify-center mt-4 lg:items-start">
                            <div class="flex items-center truncate sm:whitespace-normal">
                                <i data-feather="user" class="w-4 h-4 mr-2 text-slate-500"></i>
                                {{ $supplier->contact_person_name }}
                            </div>
                            <a href="{{ 'mailto:' . $supplier->contact_person_email }}"
                                class="flex items-center mt-3 truncate sm:whitespace-normal text-primary">
                                <i data-feather="at-sign" class="w-4 h-4 mr-2 text-slate-500"></i>
                                {{ $supplier->contact_person_email }}
                            </a>
                            <a href='{{ 'tell:' . $supplier->contact_person_number }}'
                                class="flex items-center mt-3 truncate sm:whitespace-normal text-primary">
                                <i data-feather="phone" class="w-4 h-4 mr-2 text-slate-500"></i>
                                {{ $supplier->contact_person_number }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-backend.grid>

    <x-backend.grid title="Team Members">
        <x-slot name="rt_button">
            <button
                onclick="Livewire.emit('openModal', 'backend.forms.modal-supplier-team-member', {{ json_encode(['supplier_id' => $supplier->id]) }})"
                class="mr-2 shadow-md btn btn-primary">{{ 'Add' }}</button>
        </x-slot>

        <div class="col-span-12">
            @livewire('backend.tables.supplier-team-members-table', ['supplier_id' => $supplier->id])
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
