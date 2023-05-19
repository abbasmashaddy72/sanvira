<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Role');
    }

    public function index()
    {
        // print_r(Permission::whereHas('roles', function ($query) {
        //     $query->where('id', 3);
        // })->get('id'));
        // exit;
        return view('pages.backend.role.index');
    }
}
