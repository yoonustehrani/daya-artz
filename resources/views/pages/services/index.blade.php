@extends('layouts.page')

@section('header')
<!-- services Header -->
<div class="header-section policy-header dotted-background services-header">
    <div class="header-text p-4 col-12 col-md-7">
        <h1>خدمات <a class="aqua" href="{{ route('home') }}">دایا آرتز</a></h1>
        <br>
        <p>تیم طراحی <b class="aqua">دایا آرتز</b> با ارائه لیست کاملی از خدمات طراحی برای شما مشتریان در تلاش است تا ثبت سفارشات شما را به راحت ترین روش ممکن ایجاد کند.</p>
    </div>
    <div class="header-vector col-12 col-md-5 mb-3 mb-md-0">
        <img src="{{ asset('images/services.svg') }}" class="rules">
        <img src="{{ asset('images/services-back-vector.png') }}" class="rules-back">
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
        <div class="group-item col-12 col-md-3 mb-5 mb-md-0">
            <span class="computer-container">
                <i class="fas fa-desktop computer-icon"></i>
                <i class="fas fa-print inside-computer"></i>
            </span>
            <h3 class="group-name">طراحی چاپی</h3>
        </div>
        <div class="d-none d-md-block matcher-line match-line-1"></div>
        <div class="group-item col-12 col-md-3 mb-5 mb-md-0">
            <span class="computer-container">
                <i class="fas fa-desktop computer-icon"></i>
                <i class="fas fa-pencil-ruler inside-computer"></i>
            </span>
            <h3 class="group-name">طراحی دیجیتالی</h3>
        </div>
        <div class="d-none d-md-block matcher-line match-line-2"></div>
        <div class="group-item col-12 col-md-3 mb-5 mb-md-0">
            <span class="computer-container">
                <i class="fas fa-desktop computer-icon"></i>
                <i class="fab fa-twitter inside-computer"></i>
            </span>
            <h3 class="group-name">طراحی فضای مجازی </h3>
        </div>
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
                <p class="service-description">لوگو نخستین بازتاب شخصیت و هویت برندآرمانی و تجاری شماست. لوگو طنابی تنیده شده از هدف ، باور و هسته فعالیت شماست</p>
                <div class="button-container">
                    <button class="btn btn-gradient mr-2">سفارش</button>
                    <button class="btn badge-pill">ادامه متن</button>
                </div>
            </div>
        </div>
        <div class="main-service">
            <div class="icon-container"><span class="back-aqua big-icon"><i class="fas fa-scroll"></i></span><h2>سربرگ</h2></div>
            <div class="info-container">
                <p class="title service-title">طراحی سربرگ رسمی و حرفه ای</p>
                <p class="service-description">سربرگ نشان دهنده ی هویت سازمانی و قانونی بودن یک کسب و کار است. سربرگ ها جدی ترین و جزئی ترین بخش های هویت یک فعالیت رسمی هستند</p>
                <div class="button-container">
                    <button class="btn btn-gradient mr-2">سفارش</button>
                    <button class="btn badge-pill">ادامه متن</button>
                </div>
            </div>
        </div>
        <div class="main-service">
            <div class="icon-container"><span class="back-aqua big-icon"><i class="fas fa-book-open"></i></span><h2>کاتالوگ</h2></div>
            <div class="info-container">
                <p class="title service-title">بهترین باز خورد ها با کاتالوگ های خاص</p>
                <p class="service-description">کاتالوگ مهم ترین ابزار برای تبلیغ و انتشار تبلیغات فروش یک محصول است. انتقال صحیح به مشتریان از مهم ترین ارمغان های کاتالوگ است</p>
                <div class="button-container">
                    <button class="btn btn-gradient mr-2">سفارش</button>
                    <button class="btn badge-pill">ادامه متن</button>
                </div>
            </div>
        </div>
        <div class="main-service">
            <div class="icon-container"><span class="back-aqua big-icon"><i class="fas fa-address-card"></i></span><h2>کارت ویزیت</h2></div>
            <div class="info-container">
                <p class="title service-title">انواع کارت ویزیت های ساده و خاص</p>
                <p class="service-description">سربرگ نشان دهنده ی هویت سازمانی و قانونی بودن یک کسب و کار است. سربرگ ها جدی ترین و جزئی ترین بخش های هویت یک فعالیت رسمی هستند</p>
                <div class="button-container">
                    <button class="btn btn-gradient mr-2">سفارش</button>
                    <button class="btn badge-pill">ادامه متن</button>
                </div>
            </div>
        </div>
        <div class="main-service">
            <div class="icon-container"><span class="back-aqua big-icon"><i class="fas fa-mail-bulk"></i></span><h2>ست اداری</h2></div>
            <div class="info-container">
                <p class="title service-title">ویزیت ، سربرگ ، تقویم و سررسید ، خودکار و ...</p>
                <p class="service-description">لوازم ست اداری همگی متحدالرنگ و همسو و هم جهت ارمان ها و برند شرکت طراحی می شوند ، و وابسته به هدف و نوع متقاضیان انتخاب می شود</p>
                <div class="button-container">
                    <button class="btn btn-gradient mr-2">سفارش</button>
                    <button class="btn badge-pill">ادامه متن</button>
                </div>
            </div>
        </div>
        <div class="main-service">
            <div class="icon-container"><span class="back-aqua big-icon"><i class="fas fa-plus-circle"></i></span><h2>ترکیبی</h2></div>
            <div class="info-container">
                <p class="title service-title">ترکیب خود را بسازید</p>
                <p class="service-description">اگه نیاز به طراحی های متنوع در بخش عا و خدمات مختلف هستید ، این بسته بهترین انتخاب برای شما و برندتان خواهد بود</p>
                <div class="button-container">
                    <button class="btn btn-gradient mr-2">سفارش</button>
                    <button class="btn badge-pill">ادامه متن</button>
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
                <p class="title service-title">{{ $service->title }}</p>
                <a class="service-subtitle" href="{{ route('services.show', ['slug' => $service->slug]) }}">{{ $service->subtitle }}</a>
                <div class="button-container">
                    <a href="#" class="btn mx-1 my-1 my-md-0 btn-gradient">ثبت سفارش</a>
                    <a href="{{ route('services.show', ['slug' => $service->slug]) }}" class="btn btn-gradient my-1 my-md-0">مشاهده نمونه کار</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
{{-- End Service Groups --}}

<!-- printing design services -->
{{-- <div class="section w-100 mt-3 mt-md-5">
    <div class="title-section w-100 mb-4">
        <div class="title-container">
            <h2 class="title-text">خدمات طراحی چاپی</h2>
        </div>
    </div>
    <div class="other-services-container w-100">
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-ad"></i></span>
            <h2>بنر تبلیغاتی</h2>
            <h3>طراحی بنر دیجیتالی و چاپی</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-map"></i></span>
            <h2>بروشور</h2>
            <h3>طراحی انواع بروشور ها</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>        
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-sticky-note"></i></span>
            <h2>تراکت</h2>
            <h3>طراحی تراکت در انواع سایز و مدل</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fab fa-elementor"></i></span>
            <h2>منو رستوران و کافی شاپ</h2>
            <h3>منو های خاص و شکیل</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-envelope"></i></span>
            <h2>پاکت نامه</h2>
            <h3>پاکت های نامه رسمی و فانتزی</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-images"></i></span>
            <h2>بیلبورد</h2>
            <h3>طراحی انواع بیلبورد و استند و استرابورد</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-calendar-check"></i></span>
            <h2>تقویم</h2>
            <h3>طراحی انواع تقویم و سررسید</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-receipt"></i></span>
            <h2>فاکتور</h2>
            <h3>طراحی انواع فاکتور های خاص و اداری</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-box"></i></span>
            <h2>بسته بندی</h2>
            <h3>بسته بندی های ساده و خاص</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-book"></i></span>
            <h2>جلد کتاب</h2>
            <h3>جلد انواع کتاب ، مجلات و ...</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
    </div>
</div> --}}
<!-- end other services -->
<x-quick-order-form />
@endsection