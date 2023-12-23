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
                                        <i data-feather="fast-forward" class="report-box__icon text-primary"></i>
                                    </div>
                                    <div class="mt-6 text-3xl font-medium leading-8">{{ $product_count }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('Products') }}</div>
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
                                        {{ count($products_data['filledRows']) }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('Completly Filled Products') }}
                                    </div>
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
                                        {{ count($products_data['emptyRows']) }}</div>
                                    <div class="mt-1 text-base text-slate-500">{{ __('Partialy Filled Products') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-backend.grid>
</x-app-layout>
