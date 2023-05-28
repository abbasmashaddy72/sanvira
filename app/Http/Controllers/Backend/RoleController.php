<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Role');
    }

    public function index()
    {
        abort_if(Gate::denies('role_list'), 403);

        return view('pages.backend.role.index');
    }
}
