<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManufacturerController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Manufacturer');
    }

    public function index()
    {
        return view('pages.backend.manufacturer.index');
    }
}
