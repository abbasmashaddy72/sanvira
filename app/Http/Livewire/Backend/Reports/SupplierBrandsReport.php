<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\Brand;
use App\Models\SupplierProduct;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SupplierBrandsReport extends LivewireDatatable
{
    public $supplier_id;

    public $exportable = true;

    public function builder()
    {
        $distinctCategories = SupplierProduct::query()
            ->where('supplier_id', $this->supplier_id)
            ->distinct('brand_id')
            ->pluck('brand_id');

        return Brand::query()->whereIn('id', $distinctCategories);
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

            Column::callback('brands.id', function ($id) use ($supplierId) {
                return SupplierProduct::where([
                    'supplier_id' => $supplierId,
                    'brand_id' => $id
                ])->count();
            })->label('Product Count'),
        ];
    }
}
