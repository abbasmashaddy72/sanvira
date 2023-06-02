<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\Slider;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class SlidersTable extends LivewireDatatable
{
    public $model = Slider::class;

    public $exportable = true;

    public function builder()
    {
        return Slider::query();
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

            Column::name('url')
                ->searchable()
                ->filterable(),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.backend.static.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
