<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\SupplierProductView;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SupplierProductClicksReport extends LivewireDatatable
{
    public $supplier_id;

    public $exportable = true;

    public function builder()
    {
        return SupplierProductView::query()->where('supplier_product_views.supplier_id', $this->supplier_id)->with('supplierProduct', 'userData');
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

            Column::name('supplierProduct.title')
                ->label('Product Name')
                ->searchable()
                ->filterable(),

            NumberColumn::name('clicks')
                ->searchable()
                ->alignCenter()
                ->filterable(),
        ];
    }
}
