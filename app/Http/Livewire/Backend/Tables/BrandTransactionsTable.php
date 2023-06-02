<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\BrandTransaction;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class BrandTransactionsTable extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        return BrandTransaction::query()->joinRelationship('brands');
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::name('brands.name')
                ->searchable()
                ->filterable(),

            Column::name('account_type')
                ->searchable()
                ->filterable(['Trial', 'Regular', 'Featured']),

            Column::name('transaction_type')
                ->searchable()
                ->filterable(['Paid', 'Unpaid', 'Pending']),

            NumberColumn::name('amount')
                ->searchable()
                ->filterable(),

            DateColumn::name('start_date')
                ->filterable(),

            NumberColumn::name('end_days')
                ->filterable(),

            Column::callback(['image'], function ($image) {
                return view('components.backend.dt-image', ['image' => $image]);
            })->excludeFromExport()->unsortable()->label('Image'),

            Column::name('status')
                ->searchable()
                ->filterable(['Active', 'InActive', 'Expired']),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.backend.brand.transaction_actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
