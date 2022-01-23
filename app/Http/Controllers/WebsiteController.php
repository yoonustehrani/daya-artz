<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function index()
    {
        // return route('api.forms.orders.quick');
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
    public function portfolio($slug)
    {
        return view('pages.portfolio');
    }
}
