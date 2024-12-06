<?php

namespace App\Http\Middleware;

use App\Utilities\ApiResponse;
use Closure;
use Illuminate\Http\Request;

class CheckUserRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param mixed ...$roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles): mixed
    {
        if (
            !auth()->check() ||
            !auth()->user()->hasAnyRole($roles)
        ) {
            return ApiResponse::unauthorized('unauthorized');
        }
        return $next($request);
    }
}
