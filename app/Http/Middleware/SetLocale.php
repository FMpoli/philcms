<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $language = session('language');
        // $locale = Session::get('locale', (env('APP_LOCALE', config('app.locale'))));
        app()->setLocale($language);
        Log::info("Locale set to: " . $language . " (Selected language: " . $language . ")");

        return $next($request);
    }
  
}
