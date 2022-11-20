<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class PortfolioController extends Controller
{
    public function index(Request $request)
    {
        if (request()->has('service')) {
            $service_items = (array) request()->get('service');
            $cache_key = 'service.' . implode('-', $service_items) . '.portfolios';
            $portfolios = Cache::remember($cache_key, 60 * 5, function () use($service_items) {
                $results = Portfolio::select(['id', 'title', 'slug'])
                    ->whereIn('service_id', $service_items)
                    ->get()
                    ->append('url');
                if ($results->count()) {
                    $results->load('images.file');
                }
                return $results;
            });
        } else {
            $portfolios = Cache::remember('services.random.portfolios', 60 * 10, function () {
                $results = Portfolio::select(['id', 'title', 'slug'])->take(6)->inRandomOrder()->get()->append('url');
                if ($results->count()) {
                    $results->load('images.file');
                }
                return $results;
            });
        }
        return response()->json($portfolios);
    }
    public function show($slug)
    {
        $portfolio = Portfolio::whereSlug($slug)->with('service', 'images.file')->firstOrFail();
        return view('pages.portfolio', compact('portfolio'));
    }
}
