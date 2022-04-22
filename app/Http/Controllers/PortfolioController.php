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
                return Portfolio::whereIn('service_id', [$service->id, $service->parent_id])
                    ->with('images.file')
                    ->get()
                    ->append('url');
            });
        } else {
            $portfolios = \Cache::remember('services.random.portfolios', 60 * 10, function () {
                return Portfolio::take(6)->with('images.file')->inRandomOrder()->get()->append('url');
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
