@extends('layouts.page')

@section('header')
<div class="header-section dotted-background blog-header">
    <div class="float-right p-4 col-lg-6 col-md-7 col-12 my-auto">
        <div class="header-title">
            <h1 class="w-100 title text-center">دایا <span class="aqua">بلاگ</span></h1>
        </div>
        <div class="input-group input-group-lg search-box">
            <input class="h-100 form-control eggplant" type="text" placeholder="دنبال چه مطلبی هستی؟">
            <div class="input-group-prepend">
                <button class="btn btn-search" type="button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </div>
    <div class="header-vector col-lg-6 col-md-5 col-12 mb-3 mb-md-0">
        <img src="{{ asset('images/blog.svg') }}">
    </div>
    <div class="triangle d-none d-md-block"></div>
</div>
@endsection

@section('content')
<div class="section col-12 mt-3">
    <div class="title-section col-12 mb-3">
        <div class="title-container">
            <h2 class="title-text">مقالات دایا</h2>
            <span class="title-underline"></span>
        </div>
    </div>
    <div class="blog-posts-container text-center">
        <article class="blog-post col-12 col-md-6 col-lg-4">
            <a href="{{ route('blog.show', ['title' => 'چگونه لوگوی خوب را بشناسیم']) }}">
                <div class="img-container w-100">
                    <img src="{{ asset('images/gallery/blog-post-1.jpg') }}" alt="post-cover" class="w-100 h-100">
                    <span class="article-date">19 فروردین <br> 1400</span>
                </div>
                <div class="article-info">
                    <p class="blog-post-source">نوشته شده توسط: ویکی پدیا</p>
                    <h3 class="block">چگونه لوگوی خوب را بشناسیم</h3>
                    <p class="blog-post-description text-secondary">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا </p>
                    <div class="article-time"><span>زمان مطالعه: 5 دقیقه <i class="far fa-clock"></i></span></div>
                </div>
            </a>
        </article>
        <article class="blog-post col-12 col-md-6 col-lg-4">
            <a href="{{ route('blog.show', ['title' => 'بهترین لوگوهای جهان']) }}">
                <div class="img-container w-100">
                    <img src="{{ asset('images/gallery/blog-post-2.jpg') }}" alt="post-cover" class="w-100 h-100">
                    <span class="article-date">19 فروردین <br> 1400</span>
                </div>
                <div class="article-info">
                    <p class="blog-post-source">نوشته شده توسط: تیم دایا</p>
                    <h3 class="block">بهترین لوگوهای جهان</h3>
                    <p class="blog-post-description text-secondary">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا </p>
                    <div class="article-time"><span>زمان مطالعه: 5 دقیقه <i class="far fa-clock"></i></span></div>
                </div>
            </a>
        </article>
        <article class="blog-post col-12 col-md-6 col-lg-4">
            <a href="{{ route('blog.show', ['title' => 'درباره برندینگ چه میدانید؟']) }}">
                <div class="img-container w-100">
                    <img src="{{ asset('images/gallery/blog-post-3.jpg') }}" alt="post-cover" class="w-100 h-100">
                    <span class="article-date">19 فروردین <br> 1400</span>
                </div>
                <div class="article-info">
                    <p class="blog-post-source">نوشته شده توسط: تیم دایا</p>
                    <h3 class="block">درباره برندینگ چه میدانید؟</h3>
                    <p class="blog-post-description text-secondary">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا </p>
                    <div class="article-time"><span>زمان مطالعه: 5 دقیقه <i class="far fa-clock"></i></span></div>
                </div> 
            </a>
        </article>
        @endforeach
    </div>
</div>
@endsection

