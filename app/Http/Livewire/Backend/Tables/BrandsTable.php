<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\Brand;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class BrandsTable extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        return Brand::query();
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

            BooleanColumn::name('image')
            ->searchable()
                ->filterable(),

            DateColumn::name('created_at')
            ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.backend.brand.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}