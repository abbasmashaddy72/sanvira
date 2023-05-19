<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class SupplierCategoryController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Supplier Categories');
    }

    public function index()
    {
        return view('pages.backend.supplier-category.index');
    }
}
