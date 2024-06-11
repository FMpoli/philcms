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

            $jsonSlug = json_encode($slug);
            $page = Page::where('slug', $jsonSlug)->firstOrFail();
            
            return view('pages.default', compact('page'));

        } catch (ModelNotFoundException $e) {
            abort(404);
        } catch (\Exception $e) {
            abort(500);
        }
    }
}
