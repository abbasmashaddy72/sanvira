<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Order');
    }

    public function index()
    {
        abort_if(Gate::denies('order_list'), 403);

        return view('pages.backend.order.index');
    }

    public function add()
    {
        abort_if(Gate::denies('order_add'), 403);
        view()->share('title', 'Order Add');

        return view('pages.backend.order.add_edit');
    }

    public function edit($id)
    {
        abort_if(Gate::denies('order_edit'), 403);
        view()->share('title', 'Order Edit');

        return view('pages.backend.order.add_edit', compact('id'));
    }
}
