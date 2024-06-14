<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use App\Http\Middleware\SetLocale;

// Route::get('/', function () {
//     return view('welcome');
// });

// Definisci l'endpoint per ottenere le lingue disponibili
Route::get('/get-languages', function () {
    $languages = explode(',', env('AVAILABLE_LANGUAGES', 'en'));
    return response()->json(['languages' => $languages]);
});

// Definisci l'endpoint per cambiare la lingua
Route::get('/set-locale/{locale}', function ($locale) {
    if (in_array($locale, explode(',', env('AVAILABLE_LANGUAGES', 'en')))) {
        Session::put('locale', $locale);
        App::setLocale($locale);
    }
    return Redirect::back();
});


// Route::get('/{locale?}', function ($locale = null) {
//     if (isset($locale) && in_array($locale, explode(',', env('AVAILABLE_LANGUAGES', 'en')))) {
//         app()->setLocale($locale);
//     }
    
//     return Redirect::back();
// });

Route::post('/language-switch', [SetLocale::class, 'languageSwitch'])->name('language.switch');

Route::get('/', [PageController::class, 'show'])->name('site.home');

// Definisci per ultima la rotta generica
Route::get('/{slug?}', [PageController::class, 'show'])->name('page.default');