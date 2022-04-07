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
        $posts = Post::select(['id','title', 'slug', 'description', 'reading_time', 'created_at'])
            ->with('image.file')
            ->latest();
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
        $mode = $request->query('mode');
        $limit = intval($request->query('limit'));
        $result = cache()->remember("api.posts.index::{$mode}", 60 * 60, function() use($mode, $limit) {
            $posts = Post::select(
                ['id','title', 'slug', 'description', 'reading_time', 'created_at']
            )->with('image.file')->limit($limit);
            switch ($mode) {
                case 'latest':
                    $posts->latest();
                    break;
                case 'random':
                    $posts->inRandomOrder();
                    break;
            }
            return $posts->get()->map(function($post) {
                $post->url = route('blog.show', ['slug' => $post->slug]);
                return $post;
            });
        });
        return response()->json($result);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::with('image.file')->whereSlug($slug)->firstOrFail();
        $post->load('tags', 'category');
        if ($post->author_id) {
            $post->load('author');
        }
        if ($post->tags->count() > 0) {
            $post->related = $post->related()->take(3)->get();
        }
        return view('pages.posts.show', compact('post'));
    }
}