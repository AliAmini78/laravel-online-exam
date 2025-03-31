<?php

namespace Api\Base\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;

class ForceJsonResponseMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $request->headers->set('Accept', 'application/json');

         $response = $next($request);

        // اطمینان از اینکه پاسخ به صورت JSON برگردد
        if (!$response instanceof \Illuminate\Http\JsonResponse) {
            $response = response()->json($response->getOriginalContent(), $response->status());
        }
        return $response;
    }
}
