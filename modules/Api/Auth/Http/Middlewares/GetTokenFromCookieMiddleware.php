<?php

namespace Api\Auth\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;

class GetTokenFromCookieMiddleware
{
    public function handle(Request $request, Closure $next)
    {

        if ($token = $request->cookie('auth_token'))
            $request->headers->set('Authorization' , "Bearer {$token}");

        return $next($request);
    }
}
