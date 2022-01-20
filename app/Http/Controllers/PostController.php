<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::select([
                    'id', 'title', 'slug',
                    'description', 'reading_time',
                    'image_url', 'image_alt', 'created_at'
                    ])
                    ->latest()
                    ->simplePaginate(12);
        return view('pages.posts.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::with('tags')->findOrfail($slug);
        if ($post->author_id) {
            $post->load('author');
        }
        return view('pages.posts.show', compact('post'));
    }
}
