<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
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
}
