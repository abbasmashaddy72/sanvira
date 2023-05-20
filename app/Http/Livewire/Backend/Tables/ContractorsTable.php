<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\Contractor;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ContractorsTable extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        return Contractor::query()->joinRelationship('users');
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::name('users.name')
                ->searchable()
                ->filterable(),

            Column::name('users.email')
                ->searchable()
                ->filterable(),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.backend.contractor.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
