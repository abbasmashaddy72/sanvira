<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\Product;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class ProductsTable extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        return Product::query()->joinRelationship('vendors')->joinRelationship('country')->joinRelationship('brands');
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

            BooleanColumn::name('description')
                ->searchable()
                ->filterable(),

            Column::name('min_oq')
                ->searchable()
                ->filterable(),

            Column::name('max_oq')
                ->searchable()
                ->filterable(),

            NumberColumn::name('edt')
                ->label('EDT (in Days)')
                ->searchable()
                ->filterable(),

            NumberColumn::name('length')
                ->searchable()
                ->filterable(),

            Column::name('length_units')
                ->searchable()
                ->filterable(['m', 'cm', 'mm', 'in', 'ft']),

            NumberColumn::name('breadth')
                ->searchable()
                ->filterable(),

            Column::name('breadth_units')
                ->searchable()
                ->filterable(['m', 'cm', 'mm', 'in', 'ft']),

            NumberColumn::name('width')
                ->searchable()
                ->filterable(),

            Column::name('width_units')
                ->searchable()
                ->filterable(['m', 'cm', 'mm', 'in', 'ft']),

            NumberColumn::name('weight')
                ->searchable()
                ->filterable(),

            Column::name('weight_units')
                ->searchable()
                ->filterable(['kg', 'g', 't', 'oz']),

            Column::name('avb_stock')
                ->searchable()
                ->filterable(),

            Column::name('vendors.name')
                ->label('Vendor')
                ->searchable()
                ->filterable(),

            Column::name('country.name')
                ->label('Country')
                ->searchable()
                ->filterable(),

            Column::name('brands.name')
                ->label('Brand')
                ->searchable()
                ->filterable(),

            Column::name('model')
                ->searchable()
                ->filterable(),

            Column::name('item_type')
                ->searchable()
                ->filterable(),

            Column::name('barcode')
                ->searchable()
                ->filterable(),

            Column::name('sku')
                ->searchable()
                ->filterable(),

            BooleanColumn::name('on_sale')
                ->searchable()
                ->filterable(),

            Column::callback(['images', 'title'], function ($images, $title) {
                return view('components.backend.dt-image', ['images' => $images, 'name' => $title]);
            })->excludeFromExport()->unsortable()->label('Images'),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.backend.product.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
