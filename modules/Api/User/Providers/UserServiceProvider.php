<?php

namespace Api\User\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     */
    public function register(): void
    {
        // for register user repository pattern
        $this->app->register(UserRepositoryPatternServiceProvider::class);

        // register migration path
        $this->loadMigrationsFrom(__DIR__ . '/../Database/Migrations');

        // register route path
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
