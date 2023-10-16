<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PasswordChangeCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!App::environment('production')) {

            return $next($request);
        }
        $user = auth()->user();

        if (!($user && $user->last_password_change)) {
            return redirect()->route('password.change');
        }
        if ($user->last_password_change->addMonths(3)->isPast()) {
            return redirect()->route('password.change');
        }



        return $next($request);
    }
}
