<div class="col-span-12">
    @if ($typeProducts)
        @livewire('backend.reports.supplier-product-clicks-report', ['supplier_id' => $supplier_id])
    @endif
    @if ($typeCategories)
        @livewire('backend.reports.supplier-category-clicks-report', ['supplier_id' => $supplier_id])
    @endif
    @if ($typeBrands)
        @livewire('backend.reports.supplier-brand-clicks-report', ['supplier_id' => $supplier_id])
    @endif
    @if ($typeManufacturers)
        @livewire('backend.reports.supplier-manufacturer-clicks-report', ['supplier_id' => $supplier_id])
    @endif
    @if ($typeNoData)
        <p class="text-center">{{ __('Please Select Report Type From Top Right Dropdown') }}</p>
    @endif
</div>
