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
        request()->validate([
            'q' => 'nullable|string|min:3'
        ]);
        $posts = Post::select([
                    'id', 'title', 'slug',
                    'description', 'reading_time',
                    'image_url', 'image_alt', 'created_at'
                ])->latest();
        $query = request()->query('q');
        if ($query) {
            $posts->where('title', 'like', "%{$query}%")->orWhere('description', 'like', "%{$query}%");
        }
        $posts = $posts->simplePaginate(12);
        $pagination = $posts->toArray();
        return view('pages.posts.index', compact('posts', 'pagination'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::with('tags')->whereSlug($slug)->firstOrFail();
        if ($post->author_id) {
            $post->load('author');
        }
        return view('pages.posts.show', compact('post'));
    }
}
