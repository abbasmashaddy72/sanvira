<?php

namespace App\Http\Livewire\Backend\Tables;

use App\ProductReview;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class ProductReviewsTable extends LivewireDatatable
{
    public $model = ProductReview::class;

    public function columns()
    {
        //
    }
}