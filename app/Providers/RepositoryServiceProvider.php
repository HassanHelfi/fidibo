<?php

namespace App\Providers;

use App\Repositories\Search\MysqlSearchReopository;
use App\Repositories\Search\SearchRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SearchRepositoryInterface::class, MysqlSearchReopository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
