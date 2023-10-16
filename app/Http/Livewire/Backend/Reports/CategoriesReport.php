<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\Product;
use App\Models\Category;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CategoriesReport extends LivewireDatatable
{

    public $exportable = true;

    public function builder()
    {
        $distinctCategories = Product::query()
            ->distinct('category_id')
            ->pluck('category_id');

        return Category::query()->whereIn('id', $distinctCategories);
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

            Column::callback('categories.id', function ($id) {
                return Product::where([
                    'category_id' => $id
                ])->count();
            })->label('Product Count'),
        ];
    }
}
