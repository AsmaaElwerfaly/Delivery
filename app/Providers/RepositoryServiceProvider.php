<?php

namespace App\Providers;

use App\Interface\BranchInterface;
use App\Interface\RepresentInterface;
use App\Interface\ShipmentInterface;
use App\Models\Represent;
use App\Repository\BranchRepository;
use App\Repository\RepresentRepository;
use App\Repository\ShipmentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(BranchInterface::class , BranchRepository::class);
        $this->app->bind(RepresentInterface::class,RepresentRepository::class);
        $this->app->bind(ShipmentInterface::class,ShipmentRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
