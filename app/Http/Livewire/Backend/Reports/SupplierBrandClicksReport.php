<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\SupplierBrandView;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SupplierBrandClicksReport extends LivewireDatatable
{
    public $supplier_id;

    public $exportable = true;

    public function builder()
    {
        return SupplierBrandView::query()->where('supplier_brand_views.supplier_id', $this->supplier_id)->with('brand', 'userData');
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

            Column::name('brand.name')
                ->label('Brand Name')
                ->searchable()
                ->filterable(),

            NumberColumn::name('clicks')
                ->searchable()
                ->alignCenter()
                ->filterable(),
        ];
    }
}
