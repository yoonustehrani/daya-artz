<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        // \Log::alert('run home' . time());
        // return route('api.forms.orders.quick');
        return view('welcome');
    }
    public function services()
    {
        $service_groups = Service::whereNull('parent_id')->select("*")->where('group', '<>', 'main')->get()->groupBy('group');
        
        return view('pages.services.index', compact('service_groups'));
    }
    public function service($slug)
    {
        $service = Service::whereSlug($slug)
                    ->with(['plans' => function($q) { $q->unexpired(); }])
                    ->firstOrFail();
        return view('pages.services.show', compact('service'));
    }
    public function portfolioIndexApi($service)
    {
        return $service;
    }
}