<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        if (Session::get('password_change')) {
            $request->user()->update([
                'password' => Hash::make($validated['password']),
                'password_changed' => 1,
            ]);

            return redirect()->intended(RouteServiceProvider::HOME());
        } else {
            $request->user()->update([
                'password' => Hash::make($validated['password']),
            ]);

            return back()->with('status', 'password-updated');
        }
    }

    public function change()
    {
        view()->share('title', 'Change Password');

        return view('auth.change-password');
    }
}
