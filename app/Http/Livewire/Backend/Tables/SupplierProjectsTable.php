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

    public $exportable = true;

    public function builder()
    {
        return SupplierProject::query()->where('supplier_id', $this->supplier_id)->with('country');
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

            Column::name('country.name')
                ->label('Country')
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

            Column::callback(['images', 'name'], function ($images, $name) {
                return view('components.backend.dt-image', ['images' => $images, 'name' => $name]);
            })->excludeFromExport()->unsortable()->label('Images'),

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
