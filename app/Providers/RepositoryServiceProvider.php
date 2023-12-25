<?php

namespace App\Providers;

use App\Repository\Departement\Departmentcontract;
use App\Repository\Departement\DepartmentRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(Departmentcontract::class, DepartmentRepo::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
