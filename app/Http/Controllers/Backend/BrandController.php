<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
