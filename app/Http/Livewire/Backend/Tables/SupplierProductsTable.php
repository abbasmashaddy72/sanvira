<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\SupplierProduct;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class SupplierProductsTable extends LivewireDatatable
{
    public $supplier_id;
    public $exportable = true;

    public function builder()
    {
        return SupplierProduct::query()->where('supplier_id', $this->supplier_id);
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::name('name')
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
                ->searchable()
                ->filterable(),

            Column::name('avb_stock')
                ->searchable()
                ->filterable(),

            Column::name('manufacturer')
                ->searchable()
                ->filterable(),

            Column::name('brand')
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

            BooleanColumn::name('images')
                ->searchable()
                ->filterable(),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.backend.supplier.product_actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
