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

    public function update(Request $request, $id)
    {
        $data = $request->all();

        // Verifica e decodifica JSON se necessario
        if (isset($data['content']) && is_string($data['content'])) {
            $data['content'] = json_decode($data['content'], true);
        }

        // Assicurati che 'content' sia un array
        if (!is_array($data['content'])) {
            $data['content'] = [];
        }

        // Verifica che 'video' sia un array
        foreach ($data['content'] as &$langContent) {
            if (isset($langContent['data']['video']) && !is_array($langContent['data']['video'])) {
                $langContent['data']['video'] = [$langContent['data']['video']];
            }
        }

        // Salva i dati nel modello
        $page = Page::find($id);
        $page->content = $data['content'];
        $page->save();

        return response()->json(['success' => true]);
    }
}
