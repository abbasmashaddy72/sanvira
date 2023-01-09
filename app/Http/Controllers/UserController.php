<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function impersonate(User $user)
    {
        auth()->user()->impersonate($user);

        return redirect()->route('home.index');
    }

    public function leaveImpersonate()
    {
        auth()->user()->leaveImpersonation();

        return redirect()->route('home.index');
    }
}
