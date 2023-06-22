<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\Manufacturer;
use App\Models\SupplierProduct;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SupplierManufacturersReport extends LivewireDatatable
{
    public $supplier_id;

    public $exportable = true;

    public function builder()
    {
        $distinctCategories = SupplierProduct::query()
            ->where('supplier_id', $this->supplier_id)
            ->distinct('manufacturer_id')
            ->pluck('manufacturer_id');

        return Manufacturer::query()->whereIn('id', $distinctCategories);
    }

    public function columns()
    {
        $supplierId = $this->supplier_id;

        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::raw('name')
                ->searchable()
                ->filterable(),

            Column::callback('manufacturers.id', function ($id) use ($supplierId) {
                return SupplierProduct::where([
                    'supplier_id' => $supplierId,
                    'manufacturer_id' => $id
                ])->count();
            })->label('Product Count'),
        ];
    }
}
