<?php

namespace App\Providers;

use App\Repositories\Search\EloquentSearchReopository;
use App\Repositories\Search\SearchRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(SearchRepositoryInterface::class, EloquentSearchReopository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
