<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContractorController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Contractor');
    }

    public function index()
    {
        return view('pages.backend.contractor.index');
    }
}
