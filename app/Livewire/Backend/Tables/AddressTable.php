<?php

namespace App\Livewire\Backend\Tables;

use App\Address;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class AddressTable extends LivewireDatatable
{
    public $model = Address::class;

    public function columns()
    {
        //
    }
}