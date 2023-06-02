<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\Supplier;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SuppliersTable extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        return Supplier::query();
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::callback(['logo'], function ($logo) {
                return view('components.backend.dt-image', ['image' => $logo]);
            })->excludeFromExport()->unsortable()->label('Logo'),

            Column::name('company_name')
                ->searchable()
                ->filterable(),

            Column::name('company_email')
                ->searchable()
                ->filterable(),

            Column::name('company_address')
                ->searchable()
                ->filterable(),

            Column::name('company_number')
                ->searchable()
                ->filterable(),

            Column::name('company_locality')
                ->searchable()
                ->filterable(),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.backend.supplier.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
