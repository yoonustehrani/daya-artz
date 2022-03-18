<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class LandingsController extends Controller
{
    public function show(Request $request, $slug)
    {
        $page = Page::select(['title', 'slug', 'view'])->where('type', 'landing-page')->where('slug', $slug)->firstOrFail();
        if (view()->exists($page->view)) {
            return view($page->view, compact('page'));
        }
    }
}