<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
        
        // Share settings with all views
        view()->composer('*', function ($view) {
            try {
                // Check if settings table exists
                if (Schema::hasTable('settings')) {
                    $view->with('settings', \App\Models\Setting::get());
                } else {
                    // Return empty settings object if table doesn't exist
                    $view->with('settings', new \App\Models\Setting());
                }
            } catch (\Exception $e) {
                // Return empty settings object on any error
                $view->with('settings', new \App\Models\Setting());
            }
        });
    }
}
