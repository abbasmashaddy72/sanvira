<?php

namespace App\Http\Controllers\Backend;

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

    public function add()
    {
        abort_if(Gate::denies('invoice_add'), 403);
        view()->share('title', 'Invoice Add');

        return view('pages.backend.invoice.add_edit');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('invoice_edit'), 403);
        view()->share('title', 'Invoice Edit');

        return view('pages.backend.invoice.add_edit', compact('id'));
    }
}
