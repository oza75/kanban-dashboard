<?php

namespace App\Providers;

use App\Repositories\Board\BoardRepository;
use App\Repositories\Board\DefaultBoardRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(BoardRepository::class, DefaultBoardRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
