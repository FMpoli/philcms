<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PageController extends Controller
{
    public function show($slug)
    {
        try {
            // Recupera la lingua corrente
            $locale = app()->getLocale();

            // Cerca la pagina in base allo slug nella lingua corrente
            $page = Page::where("slug->{$locale}", $slug)->firstOrFail();
            
            return view('pages.default', compact('page'));

        } catch (ModelNotFoundException $e) {
            abort(404);
        } catch (\Exception $e) {
            abort(500);
        }
    }
}
