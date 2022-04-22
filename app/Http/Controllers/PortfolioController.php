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
            $portfolios = \Cache::remember("service.{$service}.portfolios", 60 * 5, function () use($service) {
                return Portfolio::where('service_id', $service)
                    ->orWhere('parent_id', $service)
                    ->with('images.file')
                    ->get()
                    ->appends('url');
            });
        } else {
            $portfolios = \Cache::remember('services.random.portfolios', 60 * 10, function () {
                return Portfolio::take(6)->with('images.file')->inRandomOrder()->get()->appends('url');
            });
        }
        return response()->json($portfolios);
    }
    public function show($slug)
    {
        $portfolio = Portfolio::whereSlug($slug)->with('service', 'images.file')->firstOrFail();
        if (request()->has('debug')) {
            return $portfolio;
        }
        return view('pages.portfolio', compact('portfolio'));
    }
}
