<div>
    <x-frontend.index-container class='py-14' containerTitle="All Suppliers"
        containerSlot="{{ $suppliers->total() }} Suppliers">

        <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
            <div class="lg:col-span-3 md:col-span-6">
                <div class="sticky mt-8 top-20 bg-white p-4 rounded-md shadow border-2 border-gray-200">
                    <div class="flex justify-between">
                        <button wire:click="clearFilters"
                            class="px-2 py-2 font-bold text-white bg-red-600 rounded-lg hover:bg-red-700">Clear</button>
                        <button wire:click="apply"
                            class="px-2 py-2 font-bold text-white bg-blue-600 rounded-lg hover:bg-blue-700">Apply</button>
                    </div>
                    <div class="mt-4">
                        <h5 class="text-md font-semibold text-left dark:bg-slate-800 dark:shadow-gray-800">
                            Brand Name</h5>
                        <x-select wire:model.defer="brand_id" placeholder="Select Brand" :async-data="route('api.admin.brands')"
                            option-label="name" option-value="id" multiselect />
                    </div>
                    <div class="mt-4">
                        <h5 class="text-md font-semibold text-left dark:bg-slate-800 dark:shadow-gray-800">
                            Manufacturer Name</h5>
                        <x-select wire:model.defer="manufacturer_id" placeholder="Select Manufacturer" :async-data="route('api.admin.manufacturers')"
                            option-label="name" option-value="id" multiselect />
                    </div>
                    <div class="mt-4">
                        <h5 class="text-md font-semibold text-left dark:bg-slate-800 dark:shadow-gray-800">
                            Category Name</h5>
                        <x-select wire:model.defer="supplier_product_category_id" placeholder="Select Parent Category"
                            :async-data="route('api.admin.supplier_categories')" option-label="name" option-value="id" multiselect />
                    </div>
                </div>
            </div>

            <div class="lg:col-span-9 md:col-span-6">
                <section class="relative py-16 lg:pt-0 lg:py-24">
                    <div class="container">
                        <div class="grid lg:grid-cols-4 md:grid-cols-3 grid-cols-1 mt-8 gap-4">
                            @foreach ($suppliers as $item)
                                <x-frontend.supplier-profile :item="$item" />
                            @endforeach
                        </div>

                        <div class="mt-8">
                            {{ $suppliers->links() }}
                        </div>
                    </div>
                </section>
            </div>
    </x-frontend.index-container>
</div>
