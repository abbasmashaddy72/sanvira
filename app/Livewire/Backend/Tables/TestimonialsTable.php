<?php

namespace App\Livewire\Backend\Tables;

use App\Models\Testimonial;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class TestimonialsTable extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        return Testimonial::query()->with('users');
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

            Column::callback(['logo'], function ($logo) {
                return view('components.backend.dt-image', ['image' => $logo]);
            })->excludeFromExport()->unsortable()->label('Logo'),

            Column::name('message')
                ->searchable()
                ->filterable(),

            BooleanColumn::name('show_designation')
                ->searchable()
                ->filterable(),

            NumberColumn::name('rating')
                ->searchable()
                ->filterable([1, 2, 3, 4, 5]),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.backend.testimonial.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
