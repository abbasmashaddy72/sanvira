<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class InvoiceController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Invoice');
    }

    public function index()
    {
        abort_if(Gate::denies('invoice_list'), 403);

        return view('pages.backend.invoice.index');
    }
}
