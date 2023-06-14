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
                                        <i data-feather="clock" class="report-box__icon text-primary"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">
                                        {{ $supplierTransaction->amount . ' / ' . $supplierTransaction->end_days . ' Days' }}
                                    </div>
                                    <div class="mt-1 text-base text-slate-500">Current Plan:
                                        {{ $supplierTransaction->account_type }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="bar-chart-2" class="report-box__icon text-primary"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">{{ $supplierProductsCount }}</div>
                                    <div class="mt-1 text-base text-slate-500">Total Products</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="link" class="report-box__icon text-pending"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">{{ $supplierRating }}</div>
                                    <div class="mt-1 text-base text-slate-500">Rating</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="globe" class="report-box__icon text-warning"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">
                                        {{ $supplierProductCategoryCount }}</div>
                                    <div class="mt-1 text-base text-slate-500">Dealing Catigeories</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="globe" class="report-box__icon text-warning"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">
                                        {{ $supplierProductBrandCount }}</div>
                                    <div class="mt-1 text-base text-slate-500">Dealing Brands</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="bar-chart-2" class="report-box__icon text-success"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">
                                        {{ $supplierProductManufacturerCount }}</div>
                                    <div class="mt-1 text-base text-slate-500">Dealing Manufactures</div>
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
                                        {{ count($supplierProduct_data['filledRows']) }}</div>
                                    <div class="mt-1 text-base text-slate-500">Complete Profile Products</div>
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
                                        {{ count($supplierProduct_data['emptyRows']) }}</div>
                                    <div class="mt-1 text-base text-slate-500">Partial Profile Products</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium">
                            Profile Views
                        </h2>
                    </div>
                    <div class="box mt-12 p-5 sm:mt-5">
                        <div class="report-chart">
                            <div class="h-96">
                                <livewire:livewire-line-chart :line-chart-model="$profileViewsChart" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 mt-8 lg:col-span-6">
                    <div class="block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium">
                            Category Views
                        </h2>
                    </div>
                    <div class="box mt-12 p-5 sm:mt-5">
                        <div class="report-chart">
                            <div class="h-96">
                                <livewire:livewire-column-chart :column-chart-model="$categoryViewsChart" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 mt-8 lg:col-span-6">
                    <div class="block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium">
                            Product Views
                        </h2>
                    </div>
                    <div class="box mt-12 p-5 sm:mt-5">
                        <div class="report-chart">
                            <div class="h-96">
                                <livewire:livewire-column-chart :column-chart-model="$productViewsChart" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 mt-8 lg:col-span-6">
                    <div class="block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium">
                            Brand Views
                        </h2>
                    </div>
                    <div class="box mt-12 p-5 sm:mt-5">
                        <div class="report-chart">
                            <div class="h-96">
                                <livewire:livewire-column-chart :column-chart-model="$brandViewsChart" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 mt-8 lg:col-span-6">
                    <div class="block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium">
                            Manufacturer Views
                        </h2>
                    </div>
                    <div class="box mt-12 p-5 sm:mt-5">
                        <div class="report-chart">
                            <div class="h-96">
                                <livewire:livewire-column-chart :column-chart-model="$manufacturerViewsChart" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-backend.grid>
</x-app-layout>
