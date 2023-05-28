<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class SubContractorController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Sub Contractor');
    }

    public function index()
    {
        abort_if(Gate::denies('sub_contractor_list'), 403);

        return view('pages.backend.sub-contractor.index');
    }
}
