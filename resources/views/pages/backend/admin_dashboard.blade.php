<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('#') }}</x-slot>

    <x-backend.grid>
        <div class="col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <!-- BEGIN: General Report -->
                <div class="col-span-12">
                    <div class="flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium">
                            Total Count
                        </h2>
                    </div>
                    <div class="mt-5 grid grid-cols-12 gap-6">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="fast-forward" class="report-box__icon text-primary"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">{{ $suppliers_count }}</div>
                                    <div class="mt-1 text-base text-slate-500">Suppliers</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="bar-chart-2" class="report-box__icon text-primary"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">{{ $contractors_count }}</div>
                                    <div class="mt-1 text-base text-slate-500">Contractors</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="link" class="report-box__icon text-pending"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">{{ $subContractor_count }}</div>
                                    <div class="mt-1 text-base text-slate-500">Sub Contractor</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="globe" class="report-box__icon text-warning"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">{{ $brands_count }}</div>
                                    <div class="mt-1 text-base text-slate-500">Brands</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="bar-chart-2" class="report-box__icon text-success"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">{{ $manufactures_count }}</div>
                                    <div class="mt-1 text-base text-slate-500">Manufactures</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="fast-forward" class="report-box__icon text-primary"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">
                                        {{ count($supplier_data['filledRows']) }}</div>
                                    <div class="mt-1 text-base text-slate-500">Complete Profile Suppliers</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="fast-forward" class="report-box__icon text-primary"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">
                                        {{ count($supplier_data['emptyRows']) }}</div>
                                    <div class="mt-1 text-base text-slate-500">Partial Profile Suppliers</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
            </div>
        </div>
    </x-backend.grid>
</x-app-layout>
