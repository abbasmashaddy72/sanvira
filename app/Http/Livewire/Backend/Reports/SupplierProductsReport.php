<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\SupplierProduct;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SupplierProductsReport extends LivewireDatatable
{
    public $supplier_id;

    public $exportable = true;

    public function builder()
    {
        return SupplierProduct::query()->joinRelationship('manufacturers')->joinRelationship('brands')->joinRelationship('supplierProductCategory')->where('supplier_id', $this->supplier_id);
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::name('title')
                ->searchable()
                ->filterable(),

            Column::name('supplierProductCategory.name')
                ->label('Category Type')
                ->searchable()
                ->filterable(),

            Column::name('brands.name')
                ->label('Brand')
                ->searchable()
                ->filterable(),

            Column::name('manufacturers.name')
                ->label('Manufacturer')
                ->searchable()
                ->filterable(),

            Column::raw("CASE WHEN min_price IS NOT NULL AND max_price IS NOT NULL THEN CONCAT(min_price, ' - ', max_price) ELSE price END AS price_range")
                ->label('Min - Max Price'),

            Column::raw("concat(min_oq , ' - ' , max_oq) AS min_max_oq")
                ->label('Min - Max OQ'),

            NumberColumn::name('edt')
                ->label('EDT in Days')
                ->searchable()
                ->filterable(),

            Column::name('avb_stock')
                ->label('Available Stock')
                ->searchable()
                ->filterable(),

            Column::name('model')
                ->searchable()
                ->filterable(),

            Column::name('item_type')
                ->searchable()
                ->filterable(),

            Column::name('sku')
                ->searchable()
                ->filterable(),

            BooleanColumn::name('on_sale')
                ->searchable()
                ->filterable(),

            BooleanColumn::name('description')
                ->searchable()
                ->filterable(),

            BooleanColumn::name('images')
                ->searchable()
                ->filterable(),

            BooleanColumn::name('data_sheets')
                ->searchable()
                ->filterable(),

            DateColumn::name('created_at')
                ->filterable(),
        ];
    }
}
