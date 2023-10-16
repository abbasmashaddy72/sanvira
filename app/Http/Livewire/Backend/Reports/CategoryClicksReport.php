<?php

namespace App\Http\Livewire\Backend\Reports;

use App\Models\CategoryView;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class CategoryClicksReport extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        return CategoryView::query()->with('Category', 'userData');
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::name('userData.name')
                ->label('User Name')
                ->searchable()
                ->filterable(),

            Column::name('Category.name')
                ->label('Category Name')
                ->searchable()
                ->filterable(),

            NumberColumn::name('clicks')
                ->searchable()
                ->alignCenter()
                ->filterable(),
        ];
    }
}
