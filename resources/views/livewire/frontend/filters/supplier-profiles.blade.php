<div>
    <x-frontend.index-container containerTitle="All Suppliers" containerSlot="{{ $supplier_profile_count }} Products">

        <div class="grid md:grid-cols-12 grid-cols-1 gap-[30px]">
            <div class="lg:col-span-3 md:col-span-6">
                <div class="sticky mt-8 top-20">
                    <h5
                        class="p-2 text-lg font-semibold text-center rounded-md shadow bg-gray-50 dark:bg-slate-800 dark:shadow-gray-800">
                        Brand Name</h5>
                    <div class="m-8">
                        <x-select label="Select Brand" wire:model.defer="brand_id" placeholder="Select Brand"
                            :async-data="route('api.admin.brands')" option-label="name" option-value="id" multiselect />
                    </div>
                    <h5
                        class="p-2 text-lg font-semibold text-center rounded-md shadow bg-gray-50 dark:bg-slate-800 dark:shadow-gray-800">
                        Manufacturer Name</h5>
                    <div class="m-8">
                        <x-select label="Select Manufacturer" wire:model.defer="manufacturer_id"
                            placeholder="Select Manufacturer" :async-data="route('api.admin.manufacturers')" option-label="name" option-value="id"
                            multiselect />
                    </div>
                    <h5
                        class="p-2 text-lg font-semibold text-center rounded-md shadow bg-gray-50 dark:bg-slate-800 dark:shadow-gray-800">
                        Category Name</h5>
                    <div class="m-8">
                        <x-select label="Select Parent Category" wire:model.defer="supplier_product_category_id"
                            placeholder="Select Parent Category" :async-data="route('api.admin.supplier_categories')" option-label="name" option-value="id"
                            multiselect />
                    </div>
                </div>
            </div>

            <div class="lg:col-span-9 md:col-span-6">
                <section class="relative py-16 lg:pt-0 lg:py-24">
                    <div class="container">
                        <div class="grid lg:grid-cols-3 md:grid-cols-2 grid-cols-1 mt-8 gap-[30px]">
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
