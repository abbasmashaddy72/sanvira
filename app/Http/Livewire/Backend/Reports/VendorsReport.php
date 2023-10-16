<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\Vendor;
use App\Models\Product;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class VendorsReport extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        $distinctCategories = Product::query()
            ->distinct('vendor_id')
            ->pluck('vendor_id');

        return Vendor::query()->whereIn('id', $distinctCategories);
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

            Column::callback('vendors.id', function ($id) {
                return Product::where([
                    'vendor_id' => $id
                ])->count();
            })->label('Product Count'),
        ];
    }
}
