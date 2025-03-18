<?php

namespace Api\Base\Http\Middlewares;

use Closure;
use Illuminate\Http\Request;

class ExecutionTimeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $startTime = microtime(true);

        $response = $next($request);

        if ($response instanceof \Illuminate\Http\JsonResponse) {
            $executionTime = round(microtime(true) - $startTime, 3);
            $data = $response->getData(true);
            $data['execution_time'] = $executionTime . ' seconds';
            $response->setData($data);
        }

        return $response;
    }
}
