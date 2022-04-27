<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function index($service = null)
    {
        if ($service) {
            $service = Service::findOrFail($service);
            $portfolios = \Cache::remember("service.{$service->id}.portfolios", 60 * 5, function () use($service) {
                $results = Portfolio::select(['id', 'title', 'image', 'slug'])
                    ->where('service_id', $service->id)
                    ->get()
                    ->append('url');
                if ($results->count()) {
                    $results->load('images.file');
                }
                return $results;
            });
        } else {
            $portfolios = \Cache::remember('services.random.portfolios', 60 * 10, function () {
                $results = Portfolio::select(['id', 'title', 'image', 'slug'])->take(6)->inRandomOrder()->get()->append('url');
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
