<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Page;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        $page = get_website_page('/');
        return view('welcome', compact('page'));
    }
    public function services()
    {
        $service_groups = Service::whereNull('parent_id')->select("*")->where('group', '<>', 'main')->get()->groupBy('group');
        $main_services = Service::whereNull('parent_id')->where('group', 'main')->get();
        $page = get_website_page('/services');
        return view('pages.services.index', compact('service_groups', 'page'));
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
    public function page(Request $request)
    {
        $slug = $request->path();
        $page = get_website_page("/{$slug}");
        abort_if(! $page->view, 404);
        return view($page->view, compact('page'));
    }
}
