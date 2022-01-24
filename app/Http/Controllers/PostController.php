<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'q' => 'nullable|string|min:3',
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
        $posts = $posts->simplePaginate(12)->withQueryString();
        $pagination = $posts->toArray();
        return view('pages.posts.index', compact('posts', 'pagination'));
    }
    public function indexApi(Request $request)
    {
        $request->validate([
            'limit' => 'required|numeric|min:1|max:10',
            'mode' => ['nullable', Rule::in(['latest', 'random'])]
        ]);
        $posts = Post::select([
            'id', 'title', 'slug',
            'description', 'reading_time',
            'image_url', 'image_alt', 'created_at'
        ])->limit(intval($request->query('limit')));
        switch ($request->query('mode')) {
            case 'latest':
                $posts->latest();
                break;
            case 'random':
                $posts->inRandomOrder();
                break;
        }
        return response()->json($posts->get());
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
