<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class VendorController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Vendor');
    }

    public function index()
    {
        abort_if(Gate::denies('vendor_list'), 403);

        return view('pages.backend.vendor.index');
    }
}
