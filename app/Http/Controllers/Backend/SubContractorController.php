<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class SubContractorController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Sub Contractor');
    }

    public function index()
    {
        return view('pages.backend.sub-contractor.index');
    }
}
