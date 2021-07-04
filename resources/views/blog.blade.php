@extends('layouts.page')

@section('header')
<div class="header-section dotted-background policy-header">
    <div class="header-title float-right h-100 p-4 col-lg-6 col-md-7 col-12">
        <h1 class="w-100 title text-center">دایا <span class="aqua">بلاگ</span></h1>
    </div>
    <div class="header-vector col-lg-6 col-md-5 col-12 mb-3 mb-md-0">
        <img src="{{ asset('images/blog.svg') }}">
    </div>
    <div class="triangle d-none d-md-block"></div>
</div>
@endsection

@section('content')
<div class="section dotted-background bg-light col-12 p-4">
    <p class="title title-bigger eggplant-light text-center">دنبال چه مطلبی هستی ؟</p>
    <div class="input-group input-group-lg search-box col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-12 float-left">
        <div class="input-group-prepend">
            <button class="btn btn-search" type="button"><i class="fas fa-search"></i></button>
        </div>
        <input class="h-100 form-control eggplant" type="text" placeholder="اینجا بنویس">
    </div>
</div>
<div class="section col-12 mt-3">
    <div class="title-section col-12 mb-3">
        <div class="title-container">
            <h2 class="title-text">مقالات دایا</h2>
            <span class="title-underline"></span>
        </div>
    </div>
    <div class="blog-posts-container w-100 text-center">
        <article class="blog-post col-12 col-md-3">
            <a href="#">
                <div class="img-container w-100">
                    <img src="{{ asset('images/gallery/blog-post-1.jpg') }}" alt="post-cover" class="w-100 h-100">
                    <span>19 <br> خرداد</span>
                </div>
                <p class="blog-post-source">نوشته شده توسط: ویکی پدیا</p>
                <h3 class="block">چگونه لوگوی خوب را بشناسیم</h3>
                <p class="blog-post-description text-secondary">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا </p>
            </a>
        </article>
        <article class="blog-post col-12 col-md-3">
            <a href="#">
                <div class="img-container w-100">
                    <img src="{{ asset('images/gallery/blog-post-2.jpg') }}" alt="post-cover" class="w-100 h-100">
                    <span>04 <br> تیر</span>
                </div>
                <p class="blog-post-source">نوشته شده توسط: تیم دایا</p>
                <h3 class="block">بهترین لوگوهای جهان</h3>
                <p class="blog-post-description text-secondary">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا </p>
            </a>
        </article>
        <article class="blog-post col-12 col-md-3">
            <a href="#">
                <div class="img-container w-100">
                    <img src="{{ asset('images/gallery/blog-post-3.jpg') }}" alt="post-cover" class="w-100 h-100">
                    <span>30 <br> مهر</span>
                </div>
                <p class="blog-post-source">نوشته شده توسط: تیم دایا</p>
                <h3 class="block">درباره برندینگ چه میدانید؟</h3>
                <p class="blog-post-description text-secondary">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا </p>
            </a>
        </article>
    </div>
</div>
@endsection