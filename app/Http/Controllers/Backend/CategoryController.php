<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Categories');
    }

    public function index()
    {
        abort_if(Gate::denies('category_list'), 403);

        return view('pages.backend.category.index');
    }
}
