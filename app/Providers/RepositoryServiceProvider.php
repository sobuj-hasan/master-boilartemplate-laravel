<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Home\HBannerRepository;
use App\Repositories\Home\HBannerBtnRepository;
use App\Repositories\Home\HBannerServiceRepository;
use App\Repositories\Home\Interfaces\HBannerInterface;
use App\Repositories\Home\Interfaces\HBannerBtnInterface;
use App\Repositories\Home\Interfaces\HBannerServiceInterface;
use App\Repositories\RolePermissionRepository;
use App\Repositories\Home\CompareItemRepository;
use App\Repositories\Home\CompareHeaderRepository;
use App\Repositories\Home\Interfaces\CompareItemInterface;
use App\Repositories\Home\Interfaces\CompareHeaderInterface;
use App\Repositories\Interfaces\RolePermissionRepositoryInterface;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(CompareHeaderInterface::class , CompareHeaderRepository::class);
        $this->app->bind(RolePermissionRepositoryInterface::class, RolePermissionRepository::class);
        $this->app->bind(CompareItemInterface::class , CompareItemRepository::class);
        $this->app->bind(HBannerInterface::class , HBannerRepository::class);
        $this->app->bind(HBannerBtnInterface::class , HBannerBtnRepository::class);
        $this->app->bind(HBannerServiceInterface::class , HBannerServiceRepository::class);
    }
}
