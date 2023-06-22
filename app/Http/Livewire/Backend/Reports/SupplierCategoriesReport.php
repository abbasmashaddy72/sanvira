<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\SupplierProduct;
use App\Models\SupplierProductCategory;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SupplierCategoriesReport extends LivewireDatatable
{
    public $supplier_id;

    public $exportable = true;

    public function builder()
    {
        $distinctCategories = SupplierProduct::query()
            ->where('supplier_id', $this->supplier_id)
            ->distinct('supplier_product_category_id')
            ->pluck('supplier_product_category_id');

        return SupplierProductCategory::query()->whereIn('id', $distinctCategories);
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

            Column::callback('supplier_product_categories.id', function ($id) use ($supplierId) {
                return SupplierProduct::where([
                    'supplier_id' => $supplierId,
                    'supplier_product_category_id' => $id
                ])->count();
            })->label('Product Count'),
        ];
    }
}
