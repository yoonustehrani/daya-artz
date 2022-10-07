<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Portfolio;
use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    public function index()
    {
        $sitemaps = ['pages', 'services', 'posts', 'portfolios'];
        return response(
            view('sitemaps.index', compact('sitemaps'))->render(),
            200,
            ['Content-Type' => 'application/xml']
        );
    }
    public function show($slug)
    {
        $sitemaps = [
            'pages' => [
                'method' => 'pagesSitemap',
                'image' => false
            ],
            'services' => [
                'method' => 'servicesSitemap',
                'image' => false
            ],
            'posts' => [
                'method' => 'postsSitemap',
                'image' => true
            ],
            'portfolios' => [
                'method' => 'portfoliosSitemap',
                'image' => true
            ]
        ];
        if (in_array($slug, array_keys($sitemaps))) {
            $items = $this->cache_sitemaps($slug, function() use($sitemaps, $slug) {
                return $this->{$sitemaps[$slug]['method']}();
            });
            $image = $sitemaps[$slug]['image'];
            return response(
                view('sitemaps.show', compact('items', 'image'))->render(),
                200,
                ['Content-Type' => 'application/xml']
            );
        }
        abort(404);
    }
    public function pagesSitemap()
    {
        $pages = Page::all();
        $frequencies = ['/' => 'weekly', '/blog' => 'daily', '/services' => 'weekly'];
        $priorities = ['/' => '1.0', '/blog' => '0.8', '/services' => '0.9', '/about' => '0.7'];
        return $pages->map(function($page) use($frequencies, $priorities) {
            return (object) [
                'url' => $page->type == 'landing-page' ? route('landings.show', ['slug' => $page->slug]) : asset($page->slug),
                'updated_at' => $page->updated_at,
                'change_frequency' => $frequencies[$page->slug] ?? 'monthly',
                'priority' => $priorities[$page->slug] ?? '0.5'
            ];
        });
    }
    public function servicesSitemap()
    {
        $services = Service::wherePackage(false)->get();
        return $services->map(function($service) {
            return (object) [
                'url' => route('services.show', ['slug' => $service->slug]),
                'updated_at' => $service->updated_at,
                'change_frequency' => 'weekly',
                'priority' => $service->group == 'main' ? '0.8' : '0.6'
            ];
        });
    }
    public function postsSitemap()
    {
        $posts = Post::select(['id', 'slug', 'updated_at'])->with('image.file')->get();
        return $posts->map(function($post) {
            $images = [];
            if ($post->image && $post->image->file) {
                array_push($images, (object) [
                    'url' => asset($post->image->file->path),
                    'alt' => $post->image->file->alt
                ]);
            }
            return (object) [
                'url' => route('blog.show', ['slug' => $post->slug]),
                'updated_at' => $post->updated_at,
                'change_frequency' => 'never',
                'priority' => '0.5',
                'images' => $images
            ];
        });
    }
    public function portfoliosSitemap() {
        $portfolios = Portfolio::select(['id', 'slug', 'updated_at'])->with('images.file')->get();
        return $portfolios->map(function($portfolio) {
            $images = $portfolio->images->map(function($image) {
                return (object) [
                    'url' => asset($image->file->path),
                    'alt' => $image->file->alt
                ];
            });
            return (object) [
                'url' => route('portfolio.show', ['slug' => $portfolio->slug]),
                'updated_at' => $portfolio->updated_at,
                'change_frequency' => 'never',
                'priority' => '0.5',
                'images' => $images
            ];
        });
    }
    protected function cache_sitemaps($key, $callback)
    {
        return \Cache::remember("sitemaps.{$key}", 24 * 60 * 60, $callback);
    }
}
