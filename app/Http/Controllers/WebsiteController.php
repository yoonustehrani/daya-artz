<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        return view('welcome');
    }
    public function services()
    {
        return view('pages.services.index');
    }
    public function service($service)
    {
        return view('pages.services.show', compact('service'));
    }
    public function blog()
    {
        return view('pages.posts.index', compact('pages.posts.index'));
    }
    public function blog_post($slug)
    {
        return view('pages.posts.show', compact('slug'));
    }
    public function portfolio()
    {
        return view('pages.portfolio');
    }
}
