<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class BrandTransactionController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Brand Transaction');
    }

    public function index()
    {
        abort_if(Gate::denies('brand_transaction_list'), 403);

        return view('pages.backend.brand.transaction');
    }
}
