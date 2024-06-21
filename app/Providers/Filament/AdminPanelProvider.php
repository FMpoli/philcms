<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use RyanChandler\FilamentNavigation\FilamentNavigation;
use App\Models\Page;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\SpatieLaravelTranslatablePlugin;
use Filament\Forms\Get;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->colors([
                'primary' => Color::Amber,
            ])
            ->maxContentWidth('full')
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->plugins([
                \Awcodes\Curator\CuratorPlugin::make()
                    ->label('Media')
                    ->pluralLabel('Media')
                    ->navigationIcon('heroicon-o-photo')
                    ->navigationGroup('Content')
                    ->navigationSort(3)
                    ->navigationCountBadge()
                    ->registerNavigation(true)
                    ->defaultListView('grid' || 'list'),
                FilamentNavigation::make()
                    ->itemType('Anchor link', [
                        TextInput::make('id')
                            ->label('ID')
                            ->required(),
                        Select::make('url')
                            ->options(Page::where('is_published', 1)->get()->mapWithKeys(function ($page) {
                                $locale = app()->getLocale();
                                $slug = $page->getTranslation('slug', $locale); // Assicurati che il modello Page abbia la funzione getTranslation
                                return [$slug => $page->title];
                            }))
                            ->label('Page')
                            ->required(),
                    ])
                    ->itemType('Heading', [
                        TextInput::make('name')
                            ->hidden()
                            ->required(),
                    ])
                    ->itemType('Page', [
                        Select::make('localelink')
                            ->options([
                                'en' => 'English',
                                'it' => 'Italian',
                            ])
                            ->default(app()->getLocale())
                            ->label('Language')
                            ->required()
                            ->live(), // Assicura che la select 'url' si aggiorni quando cambia 'localelink'
                        Select::make('url')
                            ->options(function (Get $get) {
                                $locale = $get('localelink') ? $get('localelink') : app()->getLocale();
                                return Page::where('is_published', 1)->get()->mapWithKeys(function ($page) use ($locale) {
                                    $slug = $page->getTranslation('slug', $locale); // Assicurati che il modello Page abbia la funzione getTranslation
                                    $title = $page->getTranslation('title', $locale); // Assicurati che il modello Page abbia la funzione getTranslation
                                    return [$slug => $title];
                                });
                            })
                            ->label('Page')
                            ->required(),
                    ]),
                SpatieLaravelTranslatablePlugin::make()
                    ->defaultLocales(['en', 'it']),
                \TomatoPHP\FilamentMenus\FilamentMenusPlugin::make()


            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->viteTheme('resources/css/filament/admin/theme.css')
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
}
