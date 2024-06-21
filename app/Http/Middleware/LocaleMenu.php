<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use RyanChandler\FilamentNavigation\Models\Navigation;
use TomatoPHP\FilamentMenus\FilamentMenusPlugin;
class LocaleMenu
{
    public function handle(Request $request, Closure $next)
    {
        $locale = app()->getLocale();
        $mainMenuHandle = "main-menu-{$locale}";
        $footerMenuHandle = "footer-menu-{$locale}";

        $mainMenuItems = $this->getLocalizedMenuItems($mainMenuHandle, $locale);
        View::share('mainMenuItems', $mainMenuItems);

        $footerMenuItems = $this->getLocalizedMenuItems($footerMenuHandle, $locale);
        View::share('footerMenuItems', $footerMenuItems);

        return $next($request);
    }

    private function getLocalizedMenuItems($handle, $locale)
    {
        $navigation = Navigation::fromHandle($handle);
        $localizedItems = [];

        if ($navigation) {
            // dd($navigation);
            foreach ($navigation->items as $item) {
                if ($item['type'] === 'page') {
                    $page = Page::where("slug->{$locale}", $item['data']['url'])->first();
                    if ($page) {
                        $item['data']['url'] = url($page->getTranslation('slug', $locale));
                    }
                } elseif ($item['type'] === 'anchor-link') {
                    $item['data']['url'] = $item['data']['url'] . '#' . $item['data']['id'];
                }
                $localizedItems[] = $item;
            }
        }

        return $localizedItems;
    }
}
