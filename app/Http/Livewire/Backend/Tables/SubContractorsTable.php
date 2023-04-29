<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\SubContractor;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SubContractorsTable extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        return SubContractor::query();
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

            Column::name('email')
                ->searchable()
                ->filterable(),

            Column::name('address')
                ->searchable()
                ->filterable(),

            Column::name('number')
                ->searchable()
                ->filterable(),

            Column::name('locality')
                ->searchable()
                ->filterable(),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.backend.sub-contractor.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
