<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\SupplierTeam;
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

            Column::callback(['image'], function ($image) {
                return view('components.backend.dt-image', ['image' => $image]);
            })->excludeFromExport()->unsortable()->label('Image'),

            Column::name('email')
                ->searchable()
                ->filterable(),

            Column::name('phone')
                ->searchable()
                ->filterable(),

            Column::name('poc')
                ->label('Point of Contact')
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
