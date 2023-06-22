<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\SupplierProductCategoryView;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SupplierCategoryClicksReport extends LivewireDatatable
{
    public $supplier_id;

    public $exportable = true;

    public function builder()
    {
        return SupplierProductCategoryView::query()->where('supplier_product_category_views.supplier_id', $this->supplier_id)->with('supplierProductCategory', 'userData');
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::name('userData.name')
                ->label('User Name')
                ->searchable()
                ->filterable(),

            Column::name('supplierProductCategory.name')
                ->label('Category Name')
                ->searchable()
                ->filterable(),

            NumberColumn::name('clicks')
                ->searchable()
                ->alignCenter()
                ->filterable(),
        ];
    }
}
