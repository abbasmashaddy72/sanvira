<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\SupplierTestimonial;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class SupplierTestimonialsTable extends LivewireDatatable
{
    public $supplier_id;
    public $exportable = true;

    public function builder()
    {
        return SupplierTestimonial::query()->where('supplier_id', $this->supplier_id);
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

            Column::name('logo')
                ->searchable()
                ->filterable(),

            Column::name('message')
                ->searchable()
                ->filterable(),

            NumberColumn::name('year')
                ->searchable()
                ->filterable(),

            NumberColumn::name('rating')
                ->searchable()
                ->filterable([1, 2, 3, 4, 5]),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.backend.supplier.testimonial_actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
