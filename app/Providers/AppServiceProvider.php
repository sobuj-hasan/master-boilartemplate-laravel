<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\TrustedClientInterface;
use App\Repositories\Interfaces\TrustedClientItemInterface;
use App\Repositories\TrustedClientRepository;
use App\Repositories\TrustedClientItemRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->bind(TrustedClientInterface::class, TrustedClientRepository::class);
        $this->app->bind(TrustedClientItemInterface::class, TrustedClientItemRepository::class);
    }
}
