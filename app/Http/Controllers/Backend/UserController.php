<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function __construct()
    {
        view()->share('title', 'Users');
    }

    public function index()
    {
        abort_if(Gate::denies('user_list'), 403);

        return view('pages.backend.users.index');
    }

    public function impersonate(User $user)
    {
        abort_if(Gate::denies('user_impersonate'), 403);
        auth()->user()->impersonate($user);

        return redirect()->route('admin.dashboard');
    }

    public function leaveImpersonate()
    {
        auth()->user()->leaveImpersonation();

        return redirect()->route('admin.dashboard');
    }
}
