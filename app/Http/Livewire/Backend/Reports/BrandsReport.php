<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\Brand;
use App\Models\Product;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class BrandsReport extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        $distinctCategories = Product::query()
            ->distinct('brand_id')
            ->pluck('brand_id');

        return Brand::query()->whereIn('id', $distinctCategories);
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::raw('name')
                ->searchable()
                ->filterable(),

            Column::callback('brands.id', function ($id) {
                return Product::where([
                    'brand_id' => $id
                ])->count();
            })->label('Product Count'),
        ];
    }
}
