<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ManufacturerController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Manufacturer');
    }

    public function index()
    {
        abort_if(Gate::denies('manufacturer_list'), 403);

        return view('pages.backend.manufacturer.index');
    }
}
