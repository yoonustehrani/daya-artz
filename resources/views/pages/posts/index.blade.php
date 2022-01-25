@extends('layouts.page')

@push('head')
    <title>وبلاگ دایا آرتز</title>
@endpush

@section('header')
<div class="header-section dotted-background blog-header">
    <div class="float-right p-4 col-lg-6 col-md-7 col-12 my-auto">
        <div class="header-title">
            <h1 class="w-100 title text-center">دایا <span class="aqua">بلاگ</span></h1>
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
        <img src="{{ asset('images/blog.svg') }}">
    </div>
    <div class="triangle d-none d-md-block"></div>
</div>
@endsection

@section('content')
<div class="section col-12 mt-4" itemscope itemtype="https://schema.org/Blog">
    <div class="title-section col-12 mb-3">
        <div class="title-container">
            <h2 class="title-text">مقالات دایا</h2>
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
                    <img itemprop="image" src="{{ asset($post->image_url) }}" alt="{{ $post->image_alt }}" class="w-100 h-100">
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
    @endif
    <div>
        <table class="table text-center">
            <thead>
                <tr>
                    <th>name</th>
                    <th>key</th>
                    <th>current value</th>
                </tr>
            </thead>
            <tbody>
                @foreach (['current_page', 'first_page_url', 'next_page_url', 'prev_page_url', 'per_page'] as $item)
                <tr>
                    <td>{{ ucwords(str_replace('_', ' ', $item)) }}</td>
                    <td>$pagination['{{ $item }}']</td>
                    @if (! is_array($pagination[$item]))
                    <td>{{ $pagination[$item] ?? 'null' }}</td>
                    @else
                    <td>Array</td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $posts->links() }} --}}
    </div>
</div>
@endsection
