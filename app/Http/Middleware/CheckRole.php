<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            abort(403);
        }
        if (Auth::user()->status != 'active') {
            abort(403);
        }
        if ($role == 'superadmin' && Auth::user()->role != 'superadmin') {
            abort(403);
        }
        if ($role == 'admin' && !in_array(Auth::user()->role, ['admin', 'superadmin'])) {
            abort(403);
        }
        if ($role == 'student' && !in_array(Auth::user()->role, ['customer', 'superadmin'])) {
            abort(403);
        }
        return $next($request);
    }
}
