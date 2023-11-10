<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ProductController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('product_list'), 403);
        view()->share('title', 'Products');

        return view('pages.backend.product.index');
    }

    public function add()
    {
        abort_if(Gate::denies('product_add'), 403);
        view()->share('title', 'Product Add');

        return view('pages.backend.product.add_edit');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('product_edit'), 403);
        view()->share('title', 'Product Edit');

        return view('pages.backend.product.add_edit', compact('id'));
    }

    public function review()
    {
        abort_if(Gate::denies('product_review_list'), 403);
        view()->share('title', 'Product Reviews');

        return view('pages.backend.product.review');
    }
}
