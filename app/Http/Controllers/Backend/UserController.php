<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Users');
    }

    public function index()
    {
        return view('pages.backend.users.index');
    }

    public function impersonate(User $user)
    {
        auth()->user()->impersonate($user);

        return redirect()->route('admin.dashboard');
    }

    public function leaveImpersonate()
    {
        auth()->user()->leaveImpersonation();

        return redirect()->route('admin.dashboard');
    }
}
