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
            $portfolios = \Cache::rememberForever("service.{$service}.portfolios", function () use($service) {
                $portfolios = Portfolio::where('service_id', $service)
                ->get()
                ->each(function($p) {
                    $p->url = route('portfolio.show', ['slug' => $p->slug]);
                });
                $portfolios->load('images');
                return $portfolios;
            });
        } else {
            $portfolios = Portfolio::take(6)->with('images')->inRandomOrder()->get()->each(function($p) {
                $p->url = route('portfolio.show', ['slug' => $p->slug]);
            });
        }
        return response()->json($portfolios);
    }
    public function show($slug)
    {
        $portfolio = Portfolio::whereSlug($slug)->with('service')->firstOrFail();
        return $portfolio;
    }
}
