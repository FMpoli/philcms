<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\LocaleController;

Route::get('/debug-session', function () {
    dd(session()->all());
});
Route::get('/', [PageController::class, 'show'])->name('home');
// Route::get('/{slug}', [PageController::class, 'show'])->name('default');
// Route::get('/{slug?}', [PageController::class, 'show'])->name('default');
Route::post('/locale', [LocaleController::class, 'changeLocale'])->name('locale.change');


