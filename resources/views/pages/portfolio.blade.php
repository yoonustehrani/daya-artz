@extends('layouts.page')

@push('head')
    <title>نمونه کار | Daya Artz Blog</title>
@endpush

@section('content')
<div id="logo-info" class="w-100 float-left dotted-background p-4 p-md-2 p-lg-5">
    <div class="float-right col-12 col-md-8">
        <div class="sample-images-slider">
            @if ($portfolio->images->count() > 0)
            <div class="showing-image">
                <x-file-image :path="$portfolio->images[0]->path" :details="$portfolio->images[0]->pivot->details"/>
            </div>
            <div class="small-items-container">
                <span><i class="fas fa-chevron-left"></i></span>
                @foreach ($portfolio->images as $item)
                <div>
                    <x-file-image :path="$item->path" :details="$item->pivot->details"/>
                </div>
                @endforeach
                <span><i class="fas fa-chevron-right"></i></span>
            </div>
            @endif
        </div>
        <div class="sample-info mt-4 mt-md-0">
            <h1>نمونه طراحی {{ $portfolio->service->title }}</h1>
            <ul class="p-0 m-0 w-100">
                <li>نام برند: <h3>{{ $portfolio->title }}</h3></li>
                <li>طرف قرارداد: <h3>{{ $portfolio->company }}</h3></li>
                {{-- <li>نوع لوگو: <h3>تایپو گرافی</h3></li> --}}
                {{-- <li>امتیاز لوگو: <h3>8/10</h3></li> --}}
                {{-- <li>نظر کابران: <span class="mr-2"><i class="fab fa-gratipay"></i> 273</span></li> --}}
            </ul>
        </div>
    </div>
</div>
@if ($portfolio->details)
    @isset($portfolio->details->order)
        <x-portfolio-details :details="collect($portfolio->details->order)"/>
    @endisset
    @isset ($portfolio->details->timeline)
        <x-portfolio-timeline :timeline="collect($portfolio->details->timeline)"/>
    @endisset
@endif

<div id="customer-detail" class="header-section service-benefits-section auto-height p-3">
    <div class="header-text col-12 col-md-8">
        <ul>
            <li>نام شرکت: <h3>{{ $portfolio->company }}</h3></li>
            <br>
            <li>درباره شرکت: <p>{{ $portfolio->about_company }}</p></li>
            <br>
            <li>نظر شرکت {{ $portfolio->company }} درباره کار با دایا آرتز: <p>{{ $portfolio->company_opinion }}</p></li>
        </ul>
    </div>
    <div class="header-vector col-10 col-sm-8 col-md-4 mb-3 mb-md-0">
        <img src="{{ asset('images/profile.svg') }}" class="rules">
        <img src="{{ asset('images/profile-back.svg') }}" class="rules-back">
    </div>
</div>
@isset($portfolio->details->tabular)
    <x-portfolio-tabular :tabular="collect($portfolio->details->tabular)"/> 
@endisset
<div id="start-order" class="float-left w-100">
    <x-start-order />
</div>
<div id="daya-guide" class="section w-100 text-center mt-5 daya-guide">
    <div class="title-section w-100">
        <div class="title-container">
            <h2 class="title-text">مشاوره دایا آرتز</h2>
        </div>
    </div>
    <div class="section contact-us-first-section w-100 text-center">
        <div class="contact-us-background w-100">
            <div class="background-left">
                <img src="{{ asset('images/contact-us-background-2.png') }}" alt="">
            </div>
            <div class="background-right">
                <img src="{{ asset('images/contact-us-background-1.png') }}" alt="">
            </div>
            <div class="contact-us-vector-1">
                <img src="{{ asset('images/contact-us-vector-1.png') }}" alt="">
            </div>
        </div>
        <div class="contact-us-form">
            <h4 class="mb-3 mb-md-2 mb-md-4">به مشاوره آنلاین نیاز داری؟</h4>
            <form action="#">
                <div class="input-group mb-2 mb-md-4"><input class="form-control" type="text" name="name" placeholder="نام و نام خانوادگی"></div>
                <div class="form-group"><textarea class="form-control" name="message" cols="30" rows="10" placeholder="متن پیام شما"></textarea></div>
                <button class="float-left btn btn-dark">ارسال پیام</button>
            </form>
        </div>
    </div>
</div>
{{-- <div id="daya-samples" class="section col-12 p-4 mt-5">
    <div class="col-12 title-section">
        <div class="title-container">
            <h2 class="title-text">طرح های مشابه</h2>
        </div>
    </div>
    <div class="col-12 mt-4 float-left portfolio-section p-2">
        <a href="{{ route('portfolio.show', ['slug' => 'test']) }}">
        <div class="portfolio col-xl-2 col-lg-3 col-md-4 col-6 p-0 animated fadeIn">
            <div class="portfolio-avatar">
                <img src="{{ asset('images/gallery/orange-studio-logo.jpg') }}" alt="">
            </div>
            <div class="portfolio-detail">
                <p class="title">استدیو ترنج</p>
                <ul>
                    <li>صنایع دستی <i class="fas fa-brush"></i></li>
                    <li>طراحی تخصصی</li>
                    <li>عناصر مرتبط</li>
                    <li>رنگ شناسی حرفه ای</li>
                </ul>
            </div>
        </div>
        </a>
        <a href="{{ route('portfolio.show', ['slug' => 'test']) }}">
        <div class="portfolio col-xl-2 col-lg-3 col-md-4 col-6 p-0 animated fadeIn">
            <div class="portfolio-avatar">
                <img src="{{ asset('images/gallery/reverse-logo.jpg') }}" alt="">
            </div>
            <div class="portfolio-detail">
                <p class="title">Reverse Band</p>
                <ul>
                    <li>موسیقی <i class="fas fa-headphones"></i></li>
                    <li>طراحی تخصصی</li>
                    <li>عناصر مرتبط</li>
                    <li>رنگ شناسی حرفه ای</li>
                </ul>
            </div>
        </div>
        </a>
        <a href="{{ route('portfolio.show', ['slug' => 'test']) }}">
        <div class="portfolio col-xl-2 col-lg-3 col-md-4 col-6 p-0 animated fadeIn">
            <div class="portfolio-avatar">
                <img src="{{ asset('images/gallery/elnovel-logo.jpg') }}" alt="">
            </div>
            <div class="portfolio-detail">
                <p class="title">ال ناول</p>
                <ul>
                    <li>داستان و ادبیات <i class="fas fa-book-open"></i></li>
                    <li>طراحی تخصصی</li>
                    <li>عناصر مرتبط</li>
                    <li>رنگ شناسی حرفه ای</li>
                </ul>
            </div>
        </div>
        </a>
        <a href="{{ route('portfolio.show', ['slug' => 'test']) }}">
        <div class="portfolio col-xl-2 col-lg-3 col-md-4 col-6 p-0 animated fadeIn">
            <div class="portfolio-avatar">
                <img src="{{ asset('images/gallery/vispubish-logo.jpg') }}" alt="">
            </div>
            <div class="portfolio-detail">
                <p class="title">ویسپوبیش</p>
                <ul>
                    <li>پایگاه مقالات ادبی <i class="fas fa-pen"></i></li>
                    <li>طراحی تخصصی</li>
                    <li>عناصر مرتبط</li>
                    <li>رنگ شناسی حرفه ای</li>
                </ul>
            </div>
        </div>
        </a>
        <a href="{{ route('portfolio.show', ['slug' => 'test']) }}">
        <div class="portfolio col-xl-2 col-lg-3 col-md-4 col-6 p-0 animated fadeIn">
            <div class="portfolio-avatar">
                <img src="{{ asset('images/gallery/sampi-logo.jpg') }}" alt="">
            </div>
            <div class="portfolio-detail">
                <p class="title">Sampi Tech Group</p>
                <ul>
                    <li>استارتاپ استدیو <i class="fas fa-code"></i></li>
                    <li>طراحی تخصصی</li>
                    <li>عناصر مرتبط</li>
                    <li>رنگ شناسی حرفه ای</li>
                </ul>
            </div>
        </div>
        </a>
        <a href="{{ route('portfolio.show', ['slug' => 'test']) }}">
        <div class="portfolio col-xl-2 col-lg-3 col-md-4 col-6 p-0 animated fadeIn">
            <div class="portfolio-avatar">
                <img src="{{ asset('images/gallery/tehran-tejarat-logo.jpg') }}" alt="">
            </div>
            <div class="portfolio-detail">
                <p class="title">تهران تجارت</p>
                <ul>
                    <li>شرکت بازرگانی <i class="fas fa-briefcase"></i></li>
                    <li>طراحی تخصصی</li>
                    <li>عناصر مرتبط</li>
                    <li>رنگ شناسی حرفه ای</li>
                </ul>
            </div>
        </div>
        </a>
    </div>
</div> --}}
<div class="section-guide-container animated slideInLeft closed">
    <div class="section-guide-bg">
        <div class="section-guide">
            <h4>راهنمای صفحه</h4>
            <ul id="guide-list">
                <li class="current"><span>مشخصات کلی لوگو</span> <span></span></li>
                <li><span>جزئیات سفارش</span> <span></span></li>
                <li><span>درباره مشتری</span> <span></span></li>
                <li><span>فلسفه فکری لوگو</span> <span></span></li>
                <li><span>شروع ثبت سفارش</span> <span></span></li>
                <li><span>راهنمای دایا</span> <span></span></li>
                <li><span>طرح های مشابه</span> <span></span></li>
            </ul>
        </div>
    </div>
    <span id="guide-toggler">
        <span>
            <i class="fas fa-angle-left"></i>
        </span>
    </span>
</div>
@endsection