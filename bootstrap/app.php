<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->remove([
            \Illuminate\Auth\Middleware\Authorize::class,
        ]);
        $middleware->append([
            \Api\Base\Http\Middlewares\ForceJsonResponseMiddleware::class,
            \Api\Base\Http\Middlewares\ExecutionTimeMiddleware::class,
            \Api\Auth\Http\Middlewares\GetTokenFromCookieMiddleware::class,
        ]);

    })
    ->withExceptions(function (Exceptions $exceptions) {

        $exceptions->render(function (Error $e) {
            if (config("app.env") === "local") {
                return response()->json([
                    "status" => false,
                    "message" => $e->getMessage(),
                    "line" => $e->getLine(),
                    "data" => null,
                ], 500);
            }
            return response()->json([
                "status" => false,
                "message" => __("messages.error")
            ], 500);
        });

        $exceptions->render(function (NotFoundHttpException $e) {

            return response()->json([
                "status" => false,
                "message" => __("messages.not_found_http_exception"),
                "data" => null,

            ], 500);
        });


    })->create();
