<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\SupplierProductCategory;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SupplierCategoriesTable extends LivewireDatatable
{
    public $supplier_id;
    public $model = SupplierProductCategory::class;
    public $exportable = true;

    public function builder()
    {
        return SupplierProductCategory::query()->where('supplier_id', $this->supplier_id);
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
                return view('pages.backend.supplier.categories_actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
