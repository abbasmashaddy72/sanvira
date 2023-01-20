<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('pages.frontend.index');
    }

    public function supplier_profile()
    {
        view()->share('title', 'Supplier Profile');

        return view('pages.frontend.supplier');
    }

    public function products()
    {
        view()->share('title', 'Products');

        return view('pages.frontend.products');
    }

    public function products_details()
    {
        view()->share('title', 'Products Details');

        return view('pages.frontend.products_details');
    }
}
