<?php

namespace Api\User\Providers;

use Api\User\Database\Repositories\Contracts\UserRepositoryInterface;
use Api\User\Database\Repositories\Repos\UserRepository;
use Illuminate\Support\ServiceProvider;

class UserRepositoryPatternServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
{
    $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
{
    //
}
}
