<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repository\Department\DepartmentRepo;
use App\Repository\Department\DepartmentContract;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(DepartmentContract::class, DepartmentRepo::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
