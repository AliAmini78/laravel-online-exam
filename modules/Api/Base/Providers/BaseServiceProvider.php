<?php

namespace Api\Base\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class BaseServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {
        // for register  repository pattern
        $this->app->register(BaseRepositoryPatternServiceProvider::class);
        // register route path
        Route::
            middleware(['api' , "sanctum"])
            ->group(__DIR__ . '/../Routes/api_routes.php');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
