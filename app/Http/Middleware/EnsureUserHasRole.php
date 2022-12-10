<?php

namespace App\Http\Middleware;

use App\Models\Role;
use Closure;

class EnsureUserHasRole
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $role
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        $userRole = auth()->user()->role;
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // return abort(403);
        $route  = $userRole === 'user' ? 'home.index' : 'dashboard.index';
        return redirect()->route($route)
            ->with('failed', 'Kamu tidak memilik izin untuk mengakses halaman tersebut.');
    }
}
