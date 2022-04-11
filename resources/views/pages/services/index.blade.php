@extends('layouts.page')

@push('head')
    <title>{{ $page->title }}</title>
    @component('components.seo', ['instance' => $page, 'slug' => 'pages']) @endcomponent
@endpush

@section('header')
<!-- services Header -->
<div class="header-section policy-header dotted-background services-header">
    <div class="header-text p-4 col-12 col-md-7">
        <h1>خدمات <a class="aqua" href="{{ route('home') }}">دایا آرتز</a></h1>
        <br>
        <p>تیم طراحی <b class="aqua">دایا آرتز</b> با ارائه لیست کاملی از خدمات طراحی برای شما مشتریان در تلاش است تا ثبت سفارشات شما را به راحت ترین روش ممکن ایجاد کند.</p>
    </div>
    <div class="header-vector col-12 col-md-5 mb-3 mb-md-0">
        <img src="{{ asset('images/services.svg') }}" class="rules" alt="خدمات دایا آرتز">
        <img src="{{ asset('images/services-back-vector.png') }}" class="rules-back" alt="vector background">
    </div>
    <div class="triangle d-none d-md-block"></div>
</div>
<!-- end services Header -->
@endsection

@section('content')
<!-- services groups -->
<div class="section w-100 mt-5 mb-5">
    <div class="title-section w-100 mb-4">
        <div class="title-container">
            <h2 class="title-text">خدمات طراحی گرافیک</h2>
        </div>
    </div>
    <div class="services-groups-container w-100">
        @php
            $group_icons = get_setting('settings_page.groups.icon_list') ?: [];
            if (is_string($group_icons)) {
                $group_icons = explode(',', $group_icons);
            }
        @endphp
        @foreach ($service_groups->keys() as $group_name)
            <div class="group-item col-12 col-md-3 mb-5 mb-md-0">
                <span class="computer-container">
                    <i class="fas fa-desktop computer-icon"></i>
                    <i class="{{ $group_icons[$loop->index] ?? 'far fa-pencil-ruler' }} inside-computer"></i>
                </span>
                <h3 class="group-name">{{ $group_name }}</h3>
            </div>
            @if (! $loop->last)
            <div class="d-none d-md-block matcher-line match-line-{{ $loop->index + 1 }}"></div>
            @endif
        @endforeach
    </div>
</div>
<!-- services groups -->

<!-- search section -->
<div class="section dotted-background bg-purple-gr col-12 py-4 p-md-4">
    <p class="title title-bigger text-light text-center">دنبال چه نوع طراحی میگردی؟</p>
    <div class="input-group input-group-lg search-box-services col-xl-6 offset-xl-3 col-md-10 offset-md-1 col-lg-8 offset-lg-2 col-12 float-left p-0">
        <div class="input-group-prepend">
            <button class="btn btn-search" type="button">جستجو</button>
        </div>
        <input class="h-100 form-control text-light" type="text" placeholder="اینجا بنویس">
    </div>
</div>
<!-- end search section -->

<!-- main services section -->
<div class="section w-100 mt-5 mb-0 mb-md-3">
    <div class="title-section w-100 mb-4">
        <div class="title-container">
            <h4 class="title-text">خدمات اصلی دایا آرتز</h4>
        </div>
    </div>
    <div class="main-services-container w-100 p-2">
        <div class="main-service">
            <div class="icon-container"><span class="back-aqua big-icon"><i class="fab fa-apple"></i></span><h2>لوگو</h2></div>
            <div class="info-container">
                <p class="title service-title">طراحی لوگو با بالاترین کیفیت</p>
                <p class="service-description">لوگو نخستین بازتاب شخصیت و هویت برندآرمانی و تجاری شماست. لوگو طنابی تنیده شده از هدف، باور و هسته فعالیت شماست</p>
                <div class="button-container">
                    <a class="btn btn-gradient mr-2 scroll-to-form">سفارش</a>
                    <a class="btn badge-pill">ادامه متن</a>
                </div>
            </div>
        </div>
        <div class="main-service">
            <div class="icon-container"><span class="back-aqua big-icon"><i class="fas fa-scroll"></i></span><h2>سربرگ</h2></div>
            <div class="info-container">
                <p class="title service-title">طراحی سربرگ رسمی و حرفه ای</p>
                <p class="service-description">سربرگ نشان دهنده ی هویت سازمانی و قانونی بودن یک کسب و کار است. سربرگ ها جدی ترین و جزئی ترین بخش های هویت یک فعالیت رسمی هستند</p>
                <div class="button-container">
                    <a class="btn btn-gradient mr-2 scroll-to-form">سفارش</a>
                    <a class="btn badge-pill">ادامه متن</a>
                </div>
            </div>
        </div>
        <div class="main-service">
            <div class="icon-container"><span class="back-aqua big-icon"><i class="fas fa-book-open"></i></span><h2>کاتالوگ</h2></div>
            <div class="info-container">
                <p class="title service-title">بهترین باز خورد ها با کاتالوگ های خاص</p>
                <p class="service-description">کاتالوگ مهم ترین ابزار برای تبلیغ و انتشار تبلیغات فروش یک محصول است. انتقال صحیح به مشتریان از مهم ترین ارمغان های کاتالوگ است</p>
                <div class="button-container">
                    <a class="btn btn-gradient mr-2 scroll-to-form">سفارش</a>
                    <a class="btn badge-pill">ادامه متن</a>
                </div>
            </div>
        </div>
        <div class="main-service">
            <div class="icon-container"><span class="back-aqua big-icon"><i class="fas fa-address-card"></i></span><h2>کارت ویزیت</h2></div>
            <div class="info-container">
                <p class="title service-title">انواع کارت ویزیت های ساده و جذاب</p>
                <p class="service-description">سربرگ نشان دهنده ی هویت سازمانی و قانونی بودن یک کسب و کار است. سربرگ ها جدی ترین و جزئی ترین بخش های هویت یک فعالیت رسمی هستند</p>
                <div class="button-container">
                    <a class="btn btn-gradient mr-2 scroll-to-form">سفارش</a>
                    <a class="btn badge-pill">ادامه متن</a>
                </div>
            </div>
        </div>
        <div class="main-service">
            <div class="icon-container"><span class="back-aqua big-icon"><i class="fas fa-mail-bulk"></i></span><h2>ست اداری</h2></div>
            <div class="info-container">
                <p class="title service-title">کارت ویزیت، سربرگ، تقویم و سررسید، خودکار و...</p>
                <p class="service-description">لوازم ست اداری همگی متحدالرنگ و همسو و هم جهت ارمان ها و برند شرکت طراحی می شوند، و وابسته به هدف و نوع متقاضیان انتخاب می شود</p>
                <div class="button-container">
                    <a class="btn btn-gradient mr-2 scroll-to-form">سفارش</a>
                    <a class="btn badge-pill">ادامه متن</a>
                </div>
            </div>
        </div>
        <div class="main-service">
            <div class="icon-container"><span class="back-aqua big-icon"><i class="fas fa-plus-circle"></i></span><h2>ترکیبی</h2></div>
            <div class="info-container">
                <p class="title service-title">ترکیب خود را بسازید</p>
                <p class="service-description">اگه نیاز به طراحی های متنوع در بخش ها و خدمات مختلف هستید، این بسته بهترین انتخاب برای شما و برندتان خواهد بود</p>
                <div class="button-container">
                    <a class="btn btn-gradient mr-2 scroll-to-form">سفارش</a>
                    <a class="btn badge-pill">ادامه متن</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main services -->

<!-- guide section -->
<div class="section w-100 text-center mb-4 daya-guide">
    <div class="title-section w-100">
        <div class="title-container">
            <p class="title-text">راهنمای دایا</p>
        </div>
    </div>
    <div class="section contact-us-first-section w-100 text-center">
        <div class="contact-us-background w-100">
            <div class="background-left">
                <img src="{{ asset('images/contact-us-background-2.png') }}" alt="vector background">
            </div>
            <div class="background-right">
                <img src="{{ asset('images/contact-us-background-1.png') }}" alt="vector background">
            </div>
            <div class="contact-us-vector-1">
                <img src="{{ asset('images/contact-us-vector-1.png') }}" alt="ارتباط با دایا">
            </div>
        </div>
        <div class="contact-us-form">
            <p class="title contact-us-title mb-3 mb-md-2 mb-md-4">راهنمایی احتیاج دارید ؟</p>
            <form action="#">
                <div class="input-group mb-2 mb-md-4"><input class="form-control" type="text" name="name" placeholder="نام و نام خانوادگی"></div>
                <div class="form-group"><textarea class="form-control" name="message" cols="30" rows="10" placeholder="متن پیام شما"></textarea></div>
                <button class="float-left btn btn-dark">ارسال پیام</button>
            </form>
        </div>
    </div>
</div>
<!-- end guide section -->

{{-- Service Groups --}}
<div class="service-groups-container">
    @foreach ($service_groups as $group => $services)
    <div class="section w-100 mt-3 mt-md-5">
        <div class="title-section w-100 mb-4">
            <div class="title-container">
                <p class="title-text">{{ $group }}</p>
            </div>
        </div>
        <div class="other-services-container w-100">
            @foreach ($services as $service)
            <div class="other-service">
                <span class="back-aqua"><i class="{{ $service->icon_class }}"></i></span>
                <h3 class="title service-title">{{ $service->title }}</h3>
                <a class="service-subtitle" href="{{ route('services.show', ['slug' => $service->slug]) }}">{{ $service->subtitle }}</a>
                <div class="button-container">
                    <a href="#" class="btn mx-1 my-1 my-md-0 btn-gradient scroll-to-form">ثبت سفارش</a>
                    <a href="{{ route('services.show', ['slug' => $service->slug]) }}" class="btn btn-gradient my-1 my-md-0">مشاهده نمونه کار</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
{{-- End Service Groups --}}

<x-quick-order-form />
@endsection