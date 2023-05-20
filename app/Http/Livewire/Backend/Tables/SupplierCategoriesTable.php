<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\SupplierProductCategory;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SupplierCategoriesTable extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        return SupplierProductCategory::query()->with('categories');
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::name('name')
                ->searchable()
                ->filterable(),

            Column::name('image')
                ->searchable()
                ->filterable(),

            Column::name('categories.name')
                ->label('Sub Category Name')
                ->searchable()
                ->filterable(),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.backend.supplier-category.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
