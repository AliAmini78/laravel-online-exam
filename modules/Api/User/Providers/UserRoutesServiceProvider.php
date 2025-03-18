<?php

namespace Api\User\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class UserRoutesServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {
        Route::prefix('api/admin/user')
            ->middleware(['api'])
            ->group(__DIR__ . '/../Routes/admin_api_routes.php');
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
