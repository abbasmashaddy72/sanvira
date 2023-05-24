<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class SupplierTransactionController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Supplier Transaction');
    }

    public function index()
    {
        return view('pages.backend.supplier.transaction');
    }
}
