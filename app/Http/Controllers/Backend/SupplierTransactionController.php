<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class SupplierTransactionController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Supplier Transaction');
    }

    public function index()
    {
        abort_if(Gate::denies('supplier_transaction_list'), 403);

        return view('pages.backend.supplier.transaction');
    }
}
