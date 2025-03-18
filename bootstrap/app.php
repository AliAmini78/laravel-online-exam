<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append([
            \Api\Base\Http\Middlewares\ForceJsonResponseMiddleware::class,
            \Api\Base\Http\Middlewares\ExecutionTimeMiddleware::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {

        $exceptions->render(function (Error $e) {
            if (config("app.env") === "local") {
                return response()->json([
                    "status" => "error",
                    "message" => $e->getMessage(),
                    "line" => $e->getLine(),
                ], 500);
            }
            return response()->json([
                "status" => "error",
                "message" => __("messages.error")
            ], 500);
        });

    })->create();
