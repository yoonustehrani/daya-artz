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
            $portfolios = Portfolio::where('service_id', $service)
                    ->get()
                    ->each(function($p) {
                        $p->url = route('portfolio.show', ['slug' => $p->slug]);
                    });
                    $portfolios->load('images.file');
                    return $portfolios;
            // $portfolios = \Cache::rememberForever("service.{$service}.portfolios", function () use($service) {
                
            // });
        } else {
            $portfolios = Portfolio::take(6)->with('images.file')->inRandomOrder()->get()->each(function($p) {
                $p->url = route('portfolio.show', ['slug' => $p->slug]);
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
