<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Sentinel;

class RoleMiddleware
{
    public function handle($request, Closure $next)
    {
        $roles = explode("|", $role);
        if (!in_array(Sentinel::getUser()->role->name, $roles)) {
            return redirect('/');
        }

        return $next($request);
    }
}