<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Models\Order;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class OrdersTable extends LivewireDatatable
{
    public $exportable = true;

    public function builder()
    {
        $userID = auth()->id();
        if (auth()->user()->roles->first()->name == 'Buyer') {
            return Order::query()
                ->with('rfq')
                ->whereHas('rfq', function ($query) use ($userID) {
                    $query->where('user_id', $userID);
                });
        } else {
            return Order::query()->with('rfq');
        }
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            Column::index($this)
                ->unsortable(),

            Column::name('rfq_id'),

            Column::name('rfq.user_id'),

            Column::name('status')
                ->searchable()
                ->filterable(getEnum('orders', 'status')),

            DateColumn::name('rfq_submission_date')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.backend.order.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
