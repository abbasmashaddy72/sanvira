<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaticController extends Controller
{
    public function homepage()
    {
        view()->share('title', 'Home Page');

        return view('pages.backend.static.index');
    }
}
