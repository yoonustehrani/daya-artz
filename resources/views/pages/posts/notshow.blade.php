@extends('layouts.page')

@push('head')
    <title>{{ $post->title }} - وبلاگ دایا آرتز</title>
    @component('components.seo', ['instance' => $post, 'slug' => 'posts']) @endcomponent
@endpush

@section('content')
    <div itemscope itemtype="https://schema.org/BlogPosting">
        <div class="section w-100">
            <div class="horizontal-centerlize-w col-12 col-lg-11 col-xl-10 post-info-section mt-3">
                <div class="post-info-container vertical-centerlize p-4">
                    <h1 itemprop="headline" class="horizontal-centerlize post-title mb-4 pr-2">{{ $post->title }}</h1>
                    <meta itemprop="datePublished" content="{{ $post->created_at->format('Y-m-d') }}">
                    <meta itemprop="dateModified" content="{{ $post->updated_at->format('Y-m-d') }}">
                    <div class="post-info-flex rtl">
                        <div class="col-12 col-md-6 mb-4 mb-md-3 mb-lg-4 pr-2">
                            <i class="fas fa-icons"></i>
                            <span>دسته بندی موضوعی: </span>
                            <span itemprop="genre">{{ optional($post->category)->title }}</span>
                        </div>
                        <div class="col-12 col-md-6 mb-4 mb-md-3 mb-lg-4 pr-2">
                            <i class="fas fa-calendar-day"></i>
                            <span>تاریخ انتشار: </span>
                            <span>
                                <time datetime="{{ $post->created_at->format('Y-m-d') }}">{{ jdate($post->created_at)->format('%e %B %Y') }}</time>
                            </span>
                        </div>
                        <div class="col-12 col-md-6 mb-4 mb-md-3 mb-lg-4 pr-2"><i class="fas fa-hourglass-start"></i><span>مدت زمان مطالعه: </span><span>{{ $post->reading_time }}</span></div>
                        @if ($post->author_id)
                            <div class="col-12 col-md-6 mb-md-3 mb-lg-4 pr-2"><i class="fas fa-user-edit"></i><span>نویسنده: </span><span>{{ $post->author->fullname }}</span></div>
                        @endif
                    </div>
                </div>
                <div itemscope itemtype="https://schema.org/ImageObject" class="post-info-cover float-left mt-2 mt-md-0">
                    @if ($post->image && $post->image->file)
                        <img itemprop="image" data-src="{{ asset($post->image->file->path) }}" alt="{{ $post->image->alt }}" class="w-100 h-100 lazyload">
                    @endif
                </div>
            </div>
        </div>
        <div class="section post-main-section p-2 mt-4">
            <div itemprop="articleBody" class="post-main-text">{!! $post->body !!}</div>
        </div>
    </div>
    {{-- @if ($post->related->count())
    <div class="section w-100">
        <div class="title-section col-12 mb-3">
            <div class="title-container">
                <h2 class="title-text">مطالب مرتبط</h2>
                <span class="title-underline"></span>
            </div>
        </div>
        <div class="blog-posts-container {{ $post->related->count() > 3 ? 'swiper-container' : 'd-flex justify-content-center' }} w-100">
            <div class="swiper-wrapper">
                @foreach ($post->related as $post_item)
                <article class="blog-post col-12 col-md-4 col-lg-3 swiper-slide">
                    <a href="{{ route('blog.show', ['slug' => $post_item->slug]) }}">
                        <div class="img-container w-100">
                            <img src="{{ asset($post_item->image_url ?? 'images/gallery/sampi-logo.jpg') }}" alt="{{ $post_item->image_alt }}" class="w-100 h-100">
                            <span class="article-date">{{ jdate($post_item->created_at)->format('%e %B') }}<br>{{ jdate($post_item->created_at)->format('%Y') }}</span>
                        </div>
                        <div class="article-info">
                            <h3 class="title block">{{ $post_item->title }}</h3>
                            <p class="blog-post-description text-secondary">{{ $post_item->description }}</p>
                            <div class="article-time"><span>{{ $post_item->reading_time }} <i class="far fa-clock"></i></span></div>
                        </div>
                    </a>
                </article>
                @endforeach
            </div>
            @if($post->related->count() > 3)
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
            @endif
        </div>
    </div>

    @endif --}}
            {{-- TODO Centralize if related posts are less than 3 --}}
    <div class="section col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2 blog-post-end">
        <img data-src="{{ asset('images/blog-post-end.svg') }}" class="lazyload" alt="وبلاگ دایا آرتز">
    </div>
@endsection