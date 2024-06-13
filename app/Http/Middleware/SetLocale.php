<?php

namespace App\Http\Middleware;

use Closure;
use URL;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    public function handle(Request $request, Closure $next)
    {
        app()->setLocale($request->segment(1));
 
        URL::defaults(['locale' => $request->segment(1)]);
 
        return $next($request);
    }
}
