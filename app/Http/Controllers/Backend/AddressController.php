<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class AddressController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Address');
    }

    public function index()
    {
        abort_if(Gate::denies('address_list'), 403);

        return view('pages.backend.address.index');
    }
}
