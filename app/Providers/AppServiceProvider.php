<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use RyanChandler\FilamentNavigation\Models\Navigation;

use BladeUI\Icons\Factory;
use App\Models\Page;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        \App\Http\Middleware\SetLocale::class;
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

        //Get all available languages
        // $locale = Session::get('locale', config('app.locale'));
        // dd($locale);
        // App::setLocale($locale);
        
    }
}
