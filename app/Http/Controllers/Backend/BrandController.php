<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Brand');
    }

    public function index()
    {
        return view('pages.backend.brand.index');
    }
}
