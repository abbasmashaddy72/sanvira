<?php

namespace App\Http\Livewire\Backend\Tables;

use App\Order;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class OrdersTable extends LivewireDatatable
{
    public $model = Order::class;

    public function columns()
    {
        //
    }
}