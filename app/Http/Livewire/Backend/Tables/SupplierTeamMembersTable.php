<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\SupplierTeam;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SupplierTeamMembersTable extends LivewireDatatable
{
    public $supplier_id;
    public $exportable = true;

    public function builder()
    {
        return SupplierTeam::query()->where('supplier_id', $this->supplier_id);
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

            Column::name('designation')
                ->searchable()
                ->filterable(),

            BooleanColumn::name('image')
                ->searchable()
                ->filterable(),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.backend.supplier.team_member_actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
