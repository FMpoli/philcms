<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{slug}', [PageController::class, 'show'])->name('page.default');

// Route::middleware([SetLocale::class])->group(function () {
//     Route::get('/{slug}', [PageController::class, 'show'])->name('page.default');
// });