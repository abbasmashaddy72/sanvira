<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\Product;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ProductsReport extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        return Product::query()->joinRelationship('vendors')->joinRelationship('brands')->joinRelationship('Category');
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

            Column::name('Category.name')
                ->label('Category Type')
                ->searchable()
                ->filterable(),

            Column::name('brands.name')
                ->label('Brand')
                ->searchable()
                ->filterable(),

            Column::name('vendors.name')
                ->label('Vendor')
                ->searchable()
                ->filterable(),

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
