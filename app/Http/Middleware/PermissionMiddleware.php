<?php

namespace App\Http\Middleware;

use Closure;
use Sentinel;
use Route;
use Request;
use Session;

class PermissionMiddleware
{
    public function handle($request, Closure $next, $api="")
    {
        $routeName = $request->route()->getName();

        if (empty($routeName) || Sentinel::hasAccess($routeName)) {
            return $next($request);
        }

        if (!empty($api))
        {
            return response()->json(['message' => 'you_dont_have_permission_to_use_this_route'], 403);
        }else{
            toast()->warning('Anda Tidak Memiliki Izin Kesini.', 'Warning');
            toast()->warning('Silakan Hubungi Admin Untuk Meminta Izin.', 'Warning');
            return redirect()->back();
        }
    }
}
