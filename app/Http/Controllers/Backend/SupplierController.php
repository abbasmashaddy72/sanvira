<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
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

    public function supplier_profile(Supplier $supplier)
    {
        view()->share('title', $supplier->company_name);

        return view('pages.backend.supplier.profile', compact('supplier'));
    }
}
