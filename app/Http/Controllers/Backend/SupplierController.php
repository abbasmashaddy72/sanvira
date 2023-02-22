<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Supplier');
    }

    public function index()
    {
        return view('pages.backend.supplier.index');
    }
}
