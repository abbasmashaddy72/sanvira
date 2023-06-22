<x-app-layout>
    <x-slot name="breadcrumb">{{ Breadcrumbs::render('#') }}</x-slot>

    <x-backend.grid>
        <div class="col-span-12">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12">
                    <div class="flex h-10 items-center">
                        <h2 class="mr-5 truncate text-lg font-medium">
                            {{ __('Total Count') }}
                        </h2>
                    </div>
                    <div class="mt-5 grid grid-cols-12 gap-6">
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="activity" class="report-box__icon text-primary"></i>
                                    </div>
                                    <div class="mt-6 text-2xl font-medium leading-8">
                                        <div class="flex items-center">
                                            {{ $supplierTransaction->amount }}
                                            <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg"
                                                class="fill-primary mx-2 h-4 w-4" viewBox="0 0 117.77 122.88">
                                                <path
                                                    d="M19.81,113.35a7.89,7.89,0,0,1-1.74,3.45,5.87,5.87,0,0,1-2.46,1.31L0,122.88a16.13,16.13,0,0,1,2.51-3.75,11.83,11.83,0,0,1,3.72-2,12.16,12.16,0,0,1-2.93-2.41,3.47,3.47,0,0,1-.92-2.21A5.19,5.19,0,0,1,3,110.37,13.08,13.08,0,0,1,4.47,108c3.15-4.2,6.25-6.28,9.33-6.28a2.91,2.91,0,0,1,2.21.89,3.39,3.39,0,0,1,.82,2.36,5.39,5.39,0,0,1-.32,2,18.35,18.35,0,0,1-1.34,2.5q-3.59-1.78-4.89-1.78a5.82,5.82,0,0,0-2.58.64,6.66,6.66,0,0,0-1.59,1.17c0,.65,1.16,1.61,3.47,2.93s4,2,5,2a34.37,34.37,0,0,0,5.24-1ZM20,67.17A43.15,43.15,0,0,1,18.42,79a95.91,95.91,0,0,1-6,14.37L8,91.6A83,83,0,0,0,9.83,76.46c0-3-.25-7.3-.72-13S8,52.06,7.27,46.45s-1.91-12.29-3.57-20a33.76,33.76,0,0,1-.87-5.61c0-1.49.75-4,2.26-7.67S8.69,5.14,11.4,0l4.41,25.77q2.46,14.7,3.4,25.47c.5,5.53.75,10.85.75,15.93Zm15.91,42.45V89.22H56.28v20.4Zm81.9-21.3h-33c-3.21,0-5.66-.67-7.38-2-2.08-1.66-3.13-4.37-3.13-8.09,0-2.16.13-4.47.35-6.93s.55-5,1-7.52l3-.15a5.6,5.6,0,0,0,2.59,3.75A9.39,9.39,0,0,0,86,68.51h24.93q-1.68-10.71-5.81-17.1a30.44,30.44,0,0,0-9.54-9.18l5.29-22.72a38.18,38.18,0,0,1,13.31,18.2q3.61,10.27,3.6,27.23V88.32Z" />
                                            </svg>
                                            {{ '/ ' . $supplierTransaction->end_days . ' Days' }}
                                        </div>
                                    </div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('Current Plan:') }}
                                        {{ $supplierTransaction->account_type }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="package" class="report-box__icon text-primary"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">{{ $supplierProductsCount }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('Total Products') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="star" class="report-box__icon text-pending"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">{{ $supplierRating }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('Rating') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="chevrons-up" class="report-box__icon text-info"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">
                                        {{ $supplierProductCategoryCount }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('Dealing Catigeories') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="globe" class="report-box__icon text-info"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">
                                        {{ $supplierProductBrandCount }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('Dealing Brands') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="bar-chart-2" class="report-box__icon text-info"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">
                                        {{ $supplierProductManufacturerCount }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('Dealing Manufactures') }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="check" class="report-box__icon text-success"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">
                                        {{ count($supplierProduct_data['filledRows']) }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('Complete Profile Products') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-span-12 sm:col-span-6 xl:col-span-2">
                            <div class="report-box zoom-in">
                                <div class="box p-5">
                                    <div class="flex">
                                        <i data-feather="alert-circle" class="report-box__icon text-warning"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">
                                        {{ count($supplierProduct_data['emptyRows']) }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('Partial Profile Products') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: General Report -->
                <div class="col-span-12 mt-8">
                    <div class="block h-10 items-center sm:flex">
                        <h2 class="mr-5 truncate text-lg font-medium">
                            {{ __('Profile Views') }}
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
                            {{ __('Category Views') }}
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
                            {{ __('Product Views') }}
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
                            {{ __('Brand Views') }}
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
                            {{ __('Manufacturer Views') }}
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
