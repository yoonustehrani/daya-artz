<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'q' => 'required|string|min:2|max:20'
        ]);
        $query = $request->query('q');
        $service = \Cache::remember('services.index.query.' . \Str::slug($query), 5 * 60, function () use($query) {
            return Service::select(['id', 'title', 'slug', 'icon_class', 'group'])
            ->where('package', false)
            ->where('title', 'like', "%{$query}%")->orWhere('subtitle', 'like', "%{$query}%")
            ->limit(5)
            ->get()
            ->append('uri');
        });
        return response()->json($service);
    }
}