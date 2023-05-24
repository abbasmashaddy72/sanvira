<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class BrandTransactionController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Brand Transaction');
    }

    public function index()
    {
        return view('pages.backend.brand.transaction');
    }
}
