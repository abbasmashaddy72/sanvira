<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ContractorController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Contractor');
    }

    public function index()
    {
        abort_if(Gate::denies('contractor_list'), 403);

        return view('pages.backend.contractor.index');
    }
}
