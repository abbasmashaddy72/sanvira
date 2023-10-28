<?php

namespace App\Livewire\Backend\Tables;

use App\Models\ContactUs;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ContactUsTable extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        return ContactUs::query();
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

            Column::name('company_name')
                ->searchable()
                ->filterable(),

            Column::name('job_title')
                ->searchable()
                ->filterable(),

            Column::name('tob')
                ->label('Type of Business')
                ->searchable()
                ->filterable(),

            Column::name('contact_no')
                ->searchable()
                ->filterable(),

            Column::name('message')
                ->truncate(35)
                ->filterable(),

            BooleanColumn::name('agree')
                ->filterable(),

            DateColumn::name('created_at')
                ->filterable(),
        ];
    }
}
