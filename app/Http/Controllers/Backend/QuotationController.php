<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class QuotationController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Quotation');
    }

    public function index()
    {
        abort_if(Gate::denies('quotation_list'), 403);

        return view('pages.backend.quotation.index');
    }

    public function add()
    {
        abort_if(Gate::denies('quotation_add'), 403);
        view()->share('title', 'Quotation Add');

        return view('pages.backend.quotation.add_edit');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('quotation_edit'), 403);
        view()->share('title', 'Quotation Edit');

        return view('pages.backend.quotation.add_edit', compact('id'));
    }
}
