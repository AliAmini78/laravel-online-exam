<?php

namespace Api\Auth\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->register(AuthRepositoryPatternServiceProvider::class);

        Route::prefix("api/auth")
            ->middleware("api")
            ->group(__DIR__ . "/../Routes/api_routes.php");
    }

    public function boot(): void
    {
    }
}
