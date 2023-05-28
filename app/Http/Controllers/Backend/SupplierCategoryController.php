<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class SupplierCategoryController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Supplier Categories');
    }

    public function index()
    {
        abort_if(Gate::denies('supplier_category_list'), 403);

        return view('pages.backend.supplier-category.index');
    }
}
