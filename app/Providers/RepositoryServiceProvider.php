<?php

namespace App\Providers;

use App\Repository\Departement\Departmentcontract;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(Departmentcontract::class, DepartmentRepo);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
