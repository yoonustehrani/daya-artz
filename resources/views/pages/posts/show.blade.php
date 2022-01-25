@extends('layouts.page')

@push('head')
    <title>{{ $post->title }} - وبلاگ دایا آرتز</title>
@endpush

@section('content')
    <div class="section w-100">
        <div class="horizontal-centerlize-w col-12 col-lg-11 col-xl-10 post-info-section mt-3">
            <div class="post-info-container vertical-centerlize p-4">
                <h1 class="horizontal-centerlize post-title mb-4 pr-2">{{ $post->title }}</h1>
                <div class="post-info-flex rtl">
                    <div class="col-12 col-md-6 mb-4 mb-md-3 mb-lg-4 pr-2"><i class="fas fa-icons"></i><span>دسته بندی موضوعی: </span><span>{{ optional($post->category)->title }}</span></div>
                    <div class="col-12 col-md-6 mb-4 mb-md-3 mb-lg-4 pr-2"><i class="fas fa-calendar-day"></i><span>تاریخ انتشار: </span><span>{{ jdate($post->created_at)->format('%e %B %Y') }}</span></div>
                    <div class="col-12 col-md-6 mb-4 mb-md-3 mb-lg-4 pr-2"><i class="fas fa-hourglass-start"></i><span>مدت زمان مطالعه: </span><span>{{ $post->reading_time }}</span></div>
                    @if ($post->author_id)
                        <div class="col-12 col-md-6 mb-md-3 mb-lg-4 pr-2"><i class="fas fa-user-edit"></i><span>نویسنده: </span><span>{{ $post->author->fullname }}</span></div>
                    @endif
                </div>
            </div>
            <div class="post-info-cover float-left mt-2 mt-md-0">
                <img src="{{ asset('images/gallery/sampi-logo.jpg') }}" alt="blog-post-cover">
            </div>
        </div>
    </div>

    <div class="section post-main-section p-2 mt-4">
        <div class="post-main-text">
            {!! $post->body !!}
        </div>
    </div>
    <div class="section w-100">
        <div class="title-section col-12 mb-3">
            <div class="title-container">
                <h2 class="title-text">مطالب مرتبط</h2>
                <span class="title-underline"></span>
            </div>
        </div>
        <div class="blog-posts-container swiper-container w-100">
            <div class="swiper-wrapper">
                <article class="blog-post col-12 col-md-4 col-lg-3 swiper-slide">
                    <a href="#">
                        <div class="img-container w-100">
                            <img src="{{ asset('images/gallery/blog-post-1.jpg') }}" alt="post-cover" class="w-100 h-100">
                            <span class="article-date">19 فروردین <br> 1400</span>
                        </div>
                        <div class="article-info">
                            <p class="blog-post-source">نوشته شده توسط: ویکی پدیا</p>
                            <h3 class="title block">چگونه لوگوی خوب را بشناسیم</h3>
                            <p class="blog-post-description text-secondary"> ، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، ت لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا </p>
                            <div class="article-time"><span>زمان مطالعه: 5 دقیقه <i class="far fa-clock"></i></span></div>
                        </div>
                    </a>
                </article>
                <article class="blog-post col-12 col-md-4 col-lg-3 swiper-slide">
                    <a href="#">
                        <div class="img-container w-100">
                            <img src="{{ asset('images/gallery/blog-post-2.jpg') }}" alt="post-cover" class="w-100 h-100">
                            <span class="article-date">19 فروردین <br> 1400</span>
                        </div>
                        <div class="article-info">
                            <p class="blog-post-source">نوشته شده توسط: تیم دایا</p>
                            <h3 class="title block">بهترین لوگوهای جهان</h3>
                            <p class="blog-post-description text-secondary">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا </p>
                            <div class="article-time"><span>زمان مطالعه: 5 دقیقه <i class="far fa-clock"></i></span></div>
                        </div>
                    </a>
                </article>
                <article class="blog-post col-12 col-md-4 col-lg-3 swiper-slide">
                    <a href="#">
                        <div class="img-container w-100">
                            <img src="{{ asset('images/gallery/blog-post-3.jpg') }}" alt="post-cover" class="w-100 h-100">
                            <span class="article-date">19 فروردین <br> 1400</span>
                        </div>
                        <div class="article-info">
                            <p class="blog-post-source">نوشته شده توسط: تیم دایا</p>
                            <h3 class="title block">درباره برندینگ چه میدانید؟</h3>
                            <p class="blog-post-description text-secondary">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا </p>
                            <div class="article-time"><span>زمان مطالعه: 5 دقیقه <i class="far fa-clock"></i></span></div>
                        </div>
                    </a>
                </article>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

    <div class="section col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2 blog-post-end">
        <img src="{{ asset('images/blog-post-end.svg') }}">
    </div>
@endsection