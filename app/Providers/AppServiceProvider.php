<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use RyanChandler\FilamentNavigation\Models\Navigation;

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
        $mainMenuItems = Navigation::fromHandle('main-menu');
        View::share('mainMenuItems', $mainMenuItems);

        $footerMenuItems = Navigation::fromHandle('footer-menu');
        View::share('footerMenuItems', $footerMenuItems);


    }
}
