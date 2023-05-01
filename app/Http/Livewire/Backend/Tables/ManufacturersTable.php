<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\Manufacturer;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ManufacturersTable extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        return Manufacturer::query();
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

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.backend.manufacturer.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
