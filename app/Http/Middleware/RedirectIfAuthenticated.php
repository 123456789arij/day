<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if ($guard == "employee" && Auth::guard($guard)->check()) {
            return redirect(route('employee.tasks'));
        }
        if ($guard == null && Auth::guard('employee')->check()) {
            return redirect(route('employee.tasks'));
        }
        if ($guard == "employee" && Auth::guard('web')->check()) {
            return redirect('dashbord');
        }
        if (Auth::guard($guard)->check()) {
            return redirect(RouteServiceProvider::HOME);
        }

        return $next($request);
    }
}
