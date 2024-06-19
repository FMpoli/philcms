<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function changeLocale(Request $request)
    {
        $request->validate(['locale' => 'required|in:en,it']); // Aggiorna con le lingue supportate

        $newLocale = $request->locale;
        $currentSlug = $request->input('slug', '/');

        // Ottieni la lingua corrente prima di cambiarla
        $currentLocale = App::getLocale();

        Log::info("Current slug: $currentSlug, Current Locale: $currentLocale, New Locale: $newLocale");

        // Aggiorna la sessione con la nuova lingua
        Session::put('locale', $newLocale);

        // Trova la pagina attuale utilizzando lo slug attuale e la lingua corrente
        $page = Page::where("slug->{$currentLocale}", $currentSlug)->first();

        // Se la pagina è trovata, ottieni lo slug tradotto
        if ($page) {
            $translatedSlug = $page->getTranslation('slug', $newLocale);
            Log::info("Translated slug: $translatedSlug");
        } else {
            // Se la pagina non è trovata, reindirizza alla home page
            $translatedSlug = '/';
            Log::info("Page not found, redirecting to home");
        }

        // Reindirizza alla pagina tradotta
        return redirect($translatedSlug == '/' ? '/' : '/' . $translatedSlug);
    }
}
