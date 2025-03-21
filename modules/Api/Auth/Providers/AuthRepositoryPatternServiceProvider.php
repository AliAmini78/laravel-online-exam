<?php

namespace Api\Auth\Providers;

use Api\Auth\Database\Repositories\Contracts\AuthRepositoryInterface;
use Api\Auth\Database\Repositories\Repos\AuthRepository;
use Illuminate\Support\ServiceProvider;

class AuthRepositoryPatternServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(AuthRepositoryInterface::class , AuthRepository::class);
    }

    public function boot(): void
    {
    }
}
