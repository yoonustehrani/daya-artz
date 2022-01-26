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
            $portfolios = Portfolio::where('service_id', $service);
        }

        $response = $portfolios->get();
        return response()->json($response);
    }
    public function show($slug)
    {
        $portfolio = Portfolio::whereSlug($slug)->with('service')->firstOrFail();
        return $portfolio;
    }
}
