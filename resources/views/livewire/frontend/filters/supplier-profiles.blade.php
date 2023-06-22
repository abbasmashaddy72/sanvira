<div>
    <x-frontend.index-container class='py-14' containerTitle="All Suppliers"
        containerSlot="{{ $suppliers->total() }} Suppliers">
        <div class="grid grid-cols-1 gap-4 md:grid-cols-12">
            <div class="md:col-span-3 lg:col-span-3">
                <div class="sticky top-20 mt-8 rounded-md border-2 border-gray-200 bg-white p-4 shadow">
                    <div class="flex justify-between">
                        <button wire:click="clearFilters"
                            class="rounded-lg bg-red-600 px-2 py-2 font-bold text-white hover:bg-red-700">{{ __('Clear') }}</button>
                        <button wire:click="apply"
                            class="rounded-lg bg-blue-600 px-2 py-2 font-bold text-white hover:bg-blue-700">{{ __('Apply') }}</button>
                    </div>
                    <div class="mt-4">
                        <h5 class="text-md text-left font-semibold dark:bg-slate-800 dark:shadow-gray-800">
                            {{ __('Brand') }}</h5>
                        <x-select wire:model.defer="brand_id" placeholder="Select Brand" :async-data="route('api.admin.brands')"
                            option-label="name" option-value="id" multiselect />
                    </div>
                    <div class="mt-4">
                        <h5 class="text-md text-left font-semibold dark:bg-slate-800 dark:shadow-gray-800">
                            {{ __('Manufacturer') }}</h5>
                        <x-select wire:model.defer="manufacturer_id" placeholder="Select Manufacturer" :async-data="route('api.admin.manufacturers')"
                            option-label="name" option-value="id" multiselect />
                    </div>
                    <div class="mt-4">
                        <h5 class="text-md text-left font-semibold dark:bg-slate-800 dark:shadow-gray-800">
                            {{ __('Category') }}</h5>
                        <x-select wire:model.defer="supplier_product_category_id" placeholder="Select Parent Category"
                            :async-data="route('api.admin.supplier_categories')" option-label="name" option-value="id" multiselect />
                    </div>
                </div>
            </div>

            <div class="md:col-span-9 lg:col-span-9">
                <div class="mt-8 grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($suppliers as $item)
                        <x-frontend.supplier-profile :item="$item" />
                    @endforeach
                </div>

                <div class="mt-8">
                    @if ($agent->isTablet() == 1)
                        {{ $suppliers->onEachSide(0)->links() }}
                    @else
                        {{ $suppliers->links() }}
                    @endif
                </div>
            </div>
        </div>
    </x-frontend.index-container>
</div>
