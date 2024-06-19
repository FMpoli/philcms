<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PageController extends Controller
{
    public function show($slug = '')
    {
        // Controlla se lo slug è vuoto
        if (empty($slug)) {
            // Imposta lo slug allo slug della pagina home
            $slug = '/';
        }

        $page = Page::where('slug->' . app()->getLocale(), $slug)->first();

        if (!$page) {
            abort(404);
        }

        return view('pages.default', compact('page'));
    }
}
