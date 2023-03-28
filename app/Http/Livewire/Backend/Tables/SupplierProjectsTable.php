<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\SupplierProject;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SupplierProjectsTable extends LivewireDatatable
{
    public $supplier_id;
    public $model = SupplierProject::class;
    public $exportable = true;

    public function builder()
    {
        return SupplierProject::query()->where('supplier_id', $this->supplier_id);
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

            Column::name('country')
                ->searchable()
                ->filterable(),

            Column::name('city')
                ->searchable()
                ->filterable(),

            BooleanColumn::name('description')
                ->searchable()
                ->filterable(),

            Column::name('year_range')
                ->searchable()
                ->filterable(),

            BooleanColumn::name('images')
                ->searchable()
                ->filterable(),

            Column::name('feedback')
                ->searchable()
                ->truncate(16)
                ->filterable(),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.backend.supplier.project_actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}