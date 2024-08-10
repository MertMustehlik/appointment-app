<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        if ((!in_array("api", $guards) && !in_array("admin", $guards)) || (in_array("api", $guards) && !auth()->check()) || (in_array("admin", $guards) && !auth()->guard("admin")->check())){
            return response()->json([
                'message' => 'Unauthorized',
                'guards' => $guards
            ],401);
        }

        return $next($request);
    }
}
