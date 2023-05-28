<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use App\Models\Supplier;

class SupplierController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Supplier');
    }

    public function index()
    {
        abort_if(Gate::denies('supplier_list'), 403);

        return view('pages.backend.supplier.index');
    }

    public function supplier_profile(Supplier $supplier)
    {
        abort_if(Gate::denies('supplier_profile_view'), 403);
        view()->share('title', $supplier->company_name);
        $supplier->with('manager');

        return view('pages.backend.supplier.profile', compact('supplier'));
    }
}
