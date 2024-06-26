<?php
namespace App\Providers;

use App\Models\Page;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use App\Http\Controllers\PageController;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class PagesServiceProvider extends PackageServiceProvider
{
    public static string $name = 'Pages';
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPageRoutes();
    }

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name);
    }

    /**
     * Register page routes dynamically.
     *
     * @return void
     */
    protected function registerPageRoutes()
    {
        // Get all pages from the database
        $pages = Page::all();

        // Register a route for each page
        foreach ($pages as $page) {
            Route::get('/' . $page->slug, [PageController::class, 'show'])
                 ->name('page.' . $page->slug);
        }

        // Fallback route for the default controller
        Route::get('/{slug?}', [PageController::class, 'show'])->name('default');
    }
}
