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
        $services = Service::whereNull('parent_id')->where('main', true)->select(['id', 'title', 'subtitle', 'slug', 'icon_class'])->get();
        return view('welcome', compact('page', 'services'));
    }
    public function services()
    {
        $page = get_website_page('/services');
        $services = Service::whereNull('parent_id')->select("*")->get();
        $main_services = $services->filter(fn($s) => $s->main);
        $service_groups = $services->groupBy('group');
        return view('pages.services.index', compact('service_groups', 'main_services', 'page'));
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
