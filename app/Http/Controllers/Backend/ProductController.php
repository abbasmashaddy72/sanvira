<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Products');
    }

    public function index()
    {
        abort_if(Gate::denies('product_list'), 403);

        return view('pages.backend.product.index');
    }
}
