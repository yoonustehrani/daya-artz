<?php

namespace App\Http\Controllers;

use App\Models\Post;
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
        $posts = Post::published()->simplePaginate(12);
        return view('pages.posts.index', compact('posts'));
    }
    public function blog_post($slug)
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();
        $post->load('author');
        return view('pages.posts.show', compact('post'));
    }
    public function portfolio($slug)
    {
        return view('pages.portfolio');
    }
}
