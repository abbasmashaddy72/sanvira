<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\SupplierProduct;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SupplierProductsTable extends LivewireDatatable
{
    public $supplier_id;
    public $model = SupplierProduct::class;
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

            // Column::name('company_name')
            // ->searchable()
            //     ->filterable(),

            // Column::name('company_email')
            // ->searchable()
            //     ->filterable(),

            // Column::name('company_address')
            // ->searchable()
            //     ->filterable(),

            // Column::name('company_number')
            // ->searchable()
            //     ->filterable(),

            // Column::name('company_locality')
            // ->searchable()
            //     ->filterable(),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.backend.supplier.product_actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
