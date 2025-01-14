<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        /**
         * Redirecting to a specific Post if the Query param `p`
         * is set to a number representing the `id` of a Post
         */
        if ($request->query('p') && preg_match('/[0-9]/', $request->query('p'))) {
            $post = Post::select(['id', 'slug'])->findOrFail($request->query('p'));
            return response()->redirectTo(route('blog.show', ['slug' => $post->slug]));
        }
        $request->validate([
            'q' => 'nullable|string|min:3',
        ]);
        $page = Page::whereSlug('/blog')->firstOrFail();
        $posts = Post::select(['id','title', 'slug', 'description', 'reading_time', 'created_at'])
            ->published()
            ->with('image.file')
            ->latest();
        $query = $request->query('q');
        if ($query) {
            $posts->where('title', 'like', "%{$query}%")->orWhere('description', 'like', "%{$query}%");
        }
        $posts = $posts->simplePaginate(12)->withQueryString();
        $pagination = $posts->toArray();
        return view('pages.posts.index', compact('posts', 'pagination', 'page'));
    }
    public function indexApi(Request $request)
    {
        $request->validate([
            'limit' => 'required|numeric|min:1|max:10',
            'mode' => ['nullable', Rule::in(['latest', 'random'])]
        ]);
        $mode = $request->query('mode');
        $limit = intval($request->query('limit'));
        $result = $posts = Post::select(
                ['id','title', 'slug', 'description', 'reading_time', 'created_at']
            )->published()->with('image.file')->limit($limit);
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
        $post = Post::with('image.file')->whereSlug($slug)->published()->firstOrFail();
        $post->load('tags', 'category');
        if ($post->author_id) {
            $post->load('author');
        }
        // if ($post->tags->count() > 0) {
        //     $post->related = $post->related()->take(3)->get();
        // }
        return view('pages.posts.show', compact('post'));
    }
}