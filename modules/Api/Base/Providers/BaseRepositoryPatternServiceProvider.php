<?php

namespace Api\Base\Providers;

use Api\Base\Database\Repositories\Contracts\BaseRepositoryInterface;
use Api\Base\Database\Repositories\Repos\BaseRepository;
use Illuminate\Support\ServiceProvider;

class BaseRepositoryPatternServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
{
    $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
{
    //
}
}
