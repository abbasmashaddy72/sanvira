<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class BrandController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Brand');
    }

    public function index()
    {
        abort_if(Gate::denies('brand_list'), 403);

        return view('pages.backend.brand.index');
    }
}
