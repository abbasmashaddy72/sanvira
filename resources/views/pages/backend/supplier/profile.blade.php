<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('supplier.profile', $supplier) }}</x-slot>

    @if ($supplier_profile)
        <x-backend.grid>
            <x-slot name="externalLink">
                <a class="ml-2" href="{{ route('supplier_profile', ['slug' => $supplier->slug]) }}" target="__blank">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-external-link">
                        <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path>
                        <polyline points="15 3 21 3 21 9"></polyline>
                        <line x1="10" y1="14" x2="21" y2="3"></line>
                    </svg>
                </a>
            </x-slot>

            <x-slot name="rt_button">
                <button
                    onclick="Livewire.emit('openModal', 'backend.forms.modal-supplier', {{ json_encode(['supplier_id' => $supplier->id]) }})"
                    class="btn btn-primary mr-2 shadow-md">{{ __('Edit') }}</button>
            </x-slot>

            <div class="col-span-12">
                <div class="box mt-5 px-5 pt-5">
                    <div
                        class="dark:border-darkmode-400 -mx-5 flex flex-col border-b border-slate-200/60 pb-5 lg:flex-row">
                        <div class="flex flex-1 items-center justify-center px-5 lg:justify-start">
                            <div class="image-fit relative h-20 w-20 flex-none sm:h-24 sm:w-24 lg:h-32 lg:w-32">
                                <img alt="{{ $supplier->company_name }}" class="rounded-md border-2 border-blue-600"
                                    src="{{ asset('storage/' . $supplier->logo) }}"
                                    onerror="this.onerror=null; this.src='https://placehold.co/200';">
                                @if ($item->verification)
                                    <span
                                        class="absolute bottom-0 right-0 mb-1 mr-1 inline-flex rounded-lg text-sm font-medium text-blue-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="lucide lucide-shield-check">
                                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                                            <path d="m9 12 2 2 4-4" />
                                        </svg>
                                    </span>
                                @endif
                            </div>
                            <div class="ml-5">
                                <div class="w-24 truncate text-lg font-medium sm:w-40 sm:whitespace-normal">
                                    {{ $supplier->company_name }}</div>
                                <div class="text-slate-500">{{ Str::limit($supplier->tagline, 40) }}</div>
                                <div class="text-slate-500">
                                    <span class="text-primary font-semibold">{{ __('YOE:') }}
                                    </span>{{ $supplier->doe }}
                                </div>
                                <a href="{{ $supplier->website_url }}" class="text-primary">{{ __('Website') }}</a>
                            </div>
                        </div>
                        <div
                            class="dark:border-darkmode-400 mt-6 flex-1 border-l border-r border-t border-slate-200/60 px-5 pt-5 lg:mt-0 lg:border-t-0 lg:pt-0">
                            <div class="text-center font-medium lg:mt-3 lg:text-left">{{ __('Contact Details') }}</div>
                            <div class="mt-4 flex flex-col items-center justify-center lg:items-start">
                                <div class="flex items-center truncate sm:whitespace-normal">
                                    <i data-feather="map-pin" class="mr-2 h-4 w-4 text-slate-500"></i>
                                    {{ $supplier->company_locality }}
                                </div>
                                <div class="mt-3 flex items-center truncate sm:whitespace-normal">
                                    <i data-feather="map" class="mr-2 h-4 w-4 text-slate-500"></i>
                                    {{ $supplier->company_address }}
                                </div>
                                <a href="{{ 'mailto:' . $supplier->company_email }}"
                                    class="text-primary mt-3 flex items-center truncate sm:whitespace-normal">
                                    <i data-feather="at-sign" class="mr-2 h-4 w-4 text-slate-500"></i>
                                    {{ $supplier->company_email }}
                                </a>
                                <a href='{{ 'tel:' . $supplier->company_number }}'
                                    class="text-primary mt-3 flex items-center truncate sm:whitespace-normal">
                                    <i data-feather="phone" class="mr-2 h-4 w-4 text-slate-500"></i>
                                    {{ $supplier->company_number }}
                                </a>
                            </div>
                        </div>
                        <div
                            class="dark:border-darkmode-400 mt-6 flex-1 border-l border-r border-t border-slate-200/60 px-5 pt-5 lg:mt-0 lg:border-t-0 lg:pt-0">
                            <div class="text-center font-medium lg:mt-3 lg:text-left">{{ __('Manager Details') }}</div>
                            <div class="mt-4 flex flex-col items-center justify-center lg:items-start">
                                <div class="flex items-center truncate sm:whitespace-normal">
                                    <i data-feather="user" class="mr-2 h-4 w-4 text-slate-500"></i>
                                    {{ $supplier->manager->name }}
                                </div>
                                <a href="{{ 'mailto:' . $supplier->manager->email }}"
                                    class="text-primary mt-3 flex items-center truncate sm:whitespace-normal">
                                    <i data-feather="at-sign" class="mr-2 h-4 w-4 text-slate-500"></i>
                                    {{ $supplier->manager->email }}
                                </a>
                                <a href='{{ 'tel:' . $supplier->manager->phone }}'
                                    class="text-primary mt-3 flex items-center truncate sm:whitespace-normal">
                                    <i data-feather="phone" class="mr-2 h-4 w-4 text-slate-500"></i>
                                    {{ $supplier->manager->phone }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </x-backend.grid>
    @endif

    @if ($team_member_index)
        @can('supplier_team_member_list')
            <x-backend.grid title="Team Members">
                <x-slot name="rt_button">
                    <button
                        onclick="Livewire.emit('openModal', 'backend.forms.modal-supplier-team-member', {{ json_encode(['supplier_id' => $supplier->id]) }})"
                        class="btn btn-primary mr-2 shadow-md">{{ __('Add') }}</button>
                </x-slot>

                <div class="col-span-12">
                    @livewire('backend.tables.supplier-team-members-table', ['supplier_id' => $supplier->id])
                </div>
            </x-backend.grid>
        @endcan
    @endif

    @if ($certificate_index)
        @can('supplier_certificate_list')
            <x-backend.grid title="Certificates">
                <x-slot name="rt_button">
                    <button
                        onclick="Livewire.emit('openModal', 'backend.forms.modal-supplier-certificate', {{ json_encode(['supplier_id' => $supplier->id]) }})"
                        class="btn btn-primary mr-2 shadow-md">{{ __('Add') }}</button>
                </x-slot>

                <div class="col-span-12">
                    @livewire('backend.tables.supplier-certificates-table', ['supplier_id' => $supplier->id])
                </div>
            </x-backend.grid>
        @endcan
    @endif

    @if ($testimonial_index)
        @can('supplier_testimonial_list')
            <x-backend.grid title="Testimonials">
                <x-slot name="rt_button">
                    <button
                        onclick="Livewire.emit('openModal', 'backend.forms.modal-supplier-testimonial', {{ json_encode(['supplier_id' => $supplier->id]) }})"
                        class="btn btn-primary mr-2 shadow-md">{{ __('Add') }}</button>
                </x-slot>

                <div class="col-span-12">
                    @livewire('backend.tables.supplier-testimonials-table', ['supplier_id' => $supplier->id])
                </div>
            </x-backend.grid>
        @endcan
    @endif

    @if ($project_index)
        @can('supplier_project_list')
            <x-backend.grid title="Projects">
                <x-slot name="rt_button">
                    <button
                        onclick="Livewire.emit('openModal', 'backend.forms.modal-supplier-project', {{ json_encode(['supplier_id' => $supplier->id]) }})"
                        class="btn btn-primary mr-2 shadow-md">{{ __('Add') }}</button>
                </x-slot>

                <div class="col-span-12">
                    @livewire('backend.tables.supplier-projects-table', ['supplier_id' => $supplier->id])
                </div>
            </x-backend.grid>
        @endcan
    @endif

    @if ($product_index)
        @can('supplier_product_list')
            <x-backend.grid title="Products">
                <x-slot name="rt_button">
                    <button
                        onclick="Livewire.emit('openModal', 'backend.forms.modal-supplier-product', {{ json_encode(['supplier_id' => $supplier->id]) }})"
                        class="btn btn-primary mr-2 shadow-md">{{ __('Add') }}</button>
                </x-slot>

                <div class="col-span-12">
                    @livewire('backend.tables.supplier-products-table', ['supplier_id' => $supplier->id])
                </div>
            </x-backend.grid>
        @endcan
    @endif
</x-app-layout>
