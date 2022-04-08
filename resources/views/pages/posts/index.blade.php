@extends('layouts.page')

@push('head')
    <title>{{ $page->title }}</title>
    @component('components.seo', ['instance' => $page, 'slug' => 'pages']) @endcomponent
@endpush

@section('header')
<div class="header-section dotted-background blog-header">
    <div class="float-right p-4 col-lg-6 col-md-7 col-12 my-auto">
        <div class="header-title">
            <h1 class="w-100 title text-center">دایا <span>بلاگ</span></h1>
        </div>
        <form action="{{ route('blog.index') }}" class="form-group p-0">
            <div class="input-group input-group-lg search-box">
                <input name="q" class="h-100 form-control eggplant" required minlength="3" type="text" value="{{ old('q') ?? request()->query('q') }}" placeholder="دنبال چه مطلبی هستی؟ سه حرف یا بیشتر">
                <div class="input-group-prepend">
                    @if (request()->query('q'))
                    <a href="{{ route('blog.index') }}" class="input-group-text mx-2 bg-white text-danger"><i class="fas mx-1 fa-times"></i></a>
                    @endif
                    <button class="btn btn-search" type="submit"><i class="fas fa-search"></i></button>
                </div>
            </div>
            <div class="pt-2 px-2 text-center">
                @foreach ($errors->get('q') as $e)
                <span class="text-light">{{ $e }}</span>
                @endforeach
            </div>
        </form>
    </div>
    <div class="header-vector col-lg-6 col-md-5 col-12 mb-3 mb-md-0">
        <img src="{{ asset('images/blog.svg') }}" alt="وبلاگ دایا آرتز">
    </div>
    <div class="triangle d-none d-md-block"></div>
</div>
@endsection

@section('content')
<div class="section col-12 mt-4" itemscope itemtype="https://schema.org/Blog">
    <div class="title-section col-12 mb-3">
        <div class="title-container">
            <h2 class="title-text">مقالات دایا آرتز</h2>
            <span class="title-underline"></span>
        </div>
    </div>
    @if ($posts->count() < 1)
    <div class="w-100 mt-3">
        <p class="w-100 d-flex justify-content-center">
            متاسفانه پستی برای نمایش وجود ندارد
            <i class="far fa-2x fa-frown text-secondary mx-1"></i><i class="fas fa-2x fa-heart-broken text-danger"></i>
        </p>
    </div>
    @else
    <div class="blog-posts-container text-center">
        @foreach ($posts as $post)
        <article class="blog-post col-12 col-md-6 col-lg-4" itemprop="blogPost" itemscope itemtype="https://schema.org/BlogPosting">
            <a itemprop="url" href="{{ route('blog.show', ['slug' => $post->slug]) }}">
                <div class="img-container w-100">
                    @if ($post->image && $post->image->file)
                        <img itemprop="image" data-src="{{ asset($post->image->file->path) }}" src="{{ asset($post->image->file->thumbnail_path) }}" alt="{{ $post->image->alt }}" class="w-100 h-100">
                    @endif
                    <span class="article-date">
                        <time itemprop="datePublished" datetime="{{ $post->created_at->format('Y-m-d') }}">{{ jdate($post->created_at)->format('%e %B') }}<br>{{ jdate($post->created_at)->format('%Y') }}</time>
                    </span>
                </div>
                <div class="article-info">
                    @if ($post->author_id)
                        <p class="blog-post-source">نوشته شده توسط: ویکی پدیا</p>
                    @endif
                    <h3 itemprop="name" class="block mt-4">{{ $post->title }}</h3>
                    <p class="blog-post-description text-secondary">{{ $post->description }}</p>
                    <div class="article-time"><span>زمان مطالعه: {{ $post->reading_time }} <i class="far fa-clock"></i></span></div>
                </div>
            </a>
        </article>
        @endforeach
    </div>
    <nav class="pagination-nav">
        <a class="pagination-btn {{  $pagination['prev_page_url'] ? "" : "disabled" }}" href="{{ $pagination['prev_page_url'] }}">
            <i class="fad fa-chevron-double-left mr-1"></i>
            <span>قبلی</span>
        </a>
        <span class="page-index">{{ $pagination['current_page'] }}</span>
        <a class="pagination-btn {{ $pagination['next_page_url'] ? "" : "disabled" }}" href="{{ $pagination['next_page_url'] }}">
            <span>بعدی</span>
            <i class="fad fa-chevron-double-right ml-1"></i>
        </a>
    </nav>
    @endif
</div>
@endsection
