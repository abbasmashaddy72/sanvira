<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\SupplierManufacturerView;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SupplierManufacturerClicksReport extends LivewireDatatable
{
    public $supplier_id;

    public $exportable = true;

    public function builder()
    {
        return SupplierManufacturerView::query()->where('supplier_manufacturer_views.supplier_id', $this->supplier_id)->with('manufacturer', 'userData');
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

            Column::name('manufacturer.name')
                ->label('Manufacturer Name')
                ->searchable()
                ->filterable(),

            NumberColumn::name('clicks')
                ->searchable()
                ->alignCenter()
                ->filterable(),
        ];
    }
}
