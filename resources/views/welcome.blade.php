@extends('layouts.default')
@push('head')
    <title>Daya Artz</title>
@endpush
<!-- Header -->
@section('header')
    <div class="header-section">
        <div class="header-text p-4 col-12 col-md-6">
            <h1><span>دایا آرتز</span> گامی تا مدرنیته</h1>
            <br>
            <p><b>دایا آرتز</b> ؛ نخستین مرکز طراحی گرافیک با رویکرد استارتاپی<br>
            تیم طراحی دایا ارائه دهنده خدمات گرافیکی با رویکردی متفاوت است ، در دایا رنگ ها و ترسیمات از زیر ذره بین ایده و مفهوم می گذرند تا به جلایی تازه به هویت برند شما بخشیده شود و پوسته ظاهر و برند فعالیت شما به رنگ هسته ایده و هویت حقیقی اش برسد . دایا آرتز تزریق رنگ ایده هایتان به شخصیت شماست . برای آشنایی بیشتر با عقاید دایا آرتز کلیک کنید </p>
            <div class="header-btn-container mt-4 mt-md-0">
                <button class="btn badge-pill bg-purple ml-4">آشنایی بیشتر</button>
                <button class="btn btn-gradient bg-aqua">شروع سفارش</button>
            </div>
        </div>
        <div class="header-vector col-12 col-md-6">
            <img src="{{ asset('images/header-vector.svg') }}" alt="header-vector">
            <div class="triangle d-none d-md-block"></div>
        </div>
    </div>
@endsection
<!-- end Header -->
@section('content')
<!-- Services -->
    <div class="section col-12 p-4">
        <div class="col-12 title-section mb-3">
            <div class="title-container">
                <p class="title-text">خدمات دایا آرتز</p>
                <span class="title-underline"></span>
            </div>
        </div>
        <div class="subtitle-container">
            <p class="text-center rtl">خدمات شش گانه طراحی گرافیک دایا آرتز بر پایه هویت برند شما در بالاترین کیفیت ممکن پیش روی شماست</p>
        </div>
        <div class="services-container">
            <div class="service-container col-6 p-0 p-md-2 col-md-4 col-lg-3 col-xl-2">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fab fa-mixer"></i></span>
                    <h1 class="block w-100 text-center">لوگو</h1>
                    <h3 class="block w-100 text-center">طراحی لوگو با بالاترین کیفیت</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
            <div class="service-container col-6 p-0 p-md-2 col-md-4 col-lg-3 col-xl-2">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fas fa-paste"></i></span>
                    <h1 class="block w-100 text-center">سربرگ</h1>
                    <h3 class="block w-100 text-center">طراحی سربرگ رسمی و حرفه ای</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
            <div class="service-container col-6 p-0 p-md-2 col-md-4 col-lg-3 col-xl-2">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fas fa-newspaper"></i></span>
                    <h1 class="block w-100 text-center">کاتالوگ</h1>
                    <h3 class="block w-100 text-center">کاتالوگ و بروشور حرفه ای</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
            <div class="service-container col-6 p-0 p-md-2 col-md-4 col-lg-3 col-xl-2">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fas fa-id-card"></i></span>
                    <h1 class="block w-100 text-center">کارت ویزیت</h1>
                    <h3 class="block w-100 text-center">طراحی کارت ویزیت حرفه ای</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
            <div class="service-container col-6 p-0 p-md-2 col-md-4 col-lg-3 col-xl-2">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fas fa-briefcase"></i></span>
                    <h1 class="block w-100 text-center">ست اداری</h1>
                    <h3 class="block w-100 text-center">ویزیت ، سربرگ ، تقویم و ...</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
            <div class="service-container col-6 p-0 p-md-2 col-md-4 col-lg-3 col-xl-2">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fas fa-cart-plus"></i></span>
                    <h1 class="block w-100 text-center">ترکیبی</h1>
                    <h3 class="block w-100 text-center">ترکیب خودتو بساز</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end Services -->

    <!-- Ordering Methods -->
    <div class="section w-100 order-section-container">
        <div class="background-order dotted-background w-100 p-0">
            <div class="title-section col-12 mb-3 mb-md-0 mt-3">
                <div class="title-container">
                    <p class="title-text">روش های ثبت سفارش در دایا</p>
                    <span class="title-underline"></span>
                </div>
            </div>
            <div class="order-vectors-container">
                <div class="order-section col-xl-6 col-12">
                    <div class="order-vector">
                        <img src="{{ asset('images/speed-order.svg') }}" alt="fast-order">
                    </div>
                    <div class="order-detail">
                        <h3 class="mb-4">سفارش فوری</h3>
                        <h4 class="mb-3">تسریع زمان ثبت<span><i class="check fas fa-check-circle"></i></span></h4>
                        <h4 class="mb-3">تحویل فوری لوگو<span><i class="check fas fa-check-circle"></i></span></h4>
                        <h4 class="mb-3">تعداد ادیت کم<span><i class="times fas fa-times-circle"></i></span></h4>
                        <h4 class="mb-4">کیفیت پایین نسبت به تخصصی<span><i class="times fas fa-times-circle"></i></span></h4>
                        <div class="order-btn-container mt-lg-4">
                            <button class="btn btn-gradient silver-progress-button reverse">
                                <p class="before">شروع سفارش</p>
                                <p class="after">سفارش دهید</p>
                                <span class="handler flex-center"><i class="fas fa-hand-point-right"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="order-section col-xl-6 col-12 rtl">
                    <div class="order-vector">
                        <img src="{{ asset('images/pro-order.svg') }}" alt="pro-order">
                    </div>    
                    <div class="order-detail">
                        <h3 class="mb-4">سفارش تخصصی</h3>
                        <h4 class="mb-3">فرم ثبت حرفه ای و کامل<span><i class="check fas fa-check-circle"></i></span></h4>
                        <h4 class="mb-3">تحویل لوگو درجه یک<span><i class="check fas fa-check-circle"></i></span></h4>
                        <h4 class="mb-3">نظارت بر طراحی لوگو<span><i class="check fas fa-check-circle"></i></span></h4>
                        <h4 class="mb-4">زمان تحویل نسبتا طولانی<span><i class="times fas fa-times-circle"></i></span></h4>
                        <div class="order-btn-container mt-lg-4">
                            <button class="btn btn-gradient silver-progress-button">
                                <p class="before">شروع سفارش</p>
                                <p class="after">سفارش دهید</p>
                                <span class="handler flex-center"><i class="fas fa-hand-point-left r-180"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Ordering Methods -->

    <!-- contact daya -->
    <div class="section w-100 mt-5 mb-5">
        <div class="absolute-contact w-100">
            <div class="contact-section section w-100">
                <div class="col-md-11 back-aqua d-none d-md-block"></div>
                <div class="section contact-info w-100">
                    <div class="col-10 mb-2 mb-md-0 col-md-3 col-xl-2 p-2 text-center">
                        <span class="back-aqua"><i class="fas fa-phone"></i></span>
                        <h4>تلفن</h4>
                        <p class="text-secondary">با شماره گیری تلفن های ثابت زیر سفارش خود را ثبت کنید</p>
                        <button class="btn btn-gradient ltr">+98 123456789</button>
                        <button class="btn btn-gradient ltr">021 1234567</button>
                    </div>
                    <div class="col-10 mb-2 mb-md-0 col-md-3 col-xl-2 p-2 text-center">
                        <span class="back-aqua"><i class="fas fa-robot"></i></span>
                        <h4>ربات تلگرام</h4>
                        <p class="text-secondary">توسط ربات تلگرام ما سفارش خود را ثبت کنید</p>
                        <button class="btn btn-gradient ltr mt-12-p">@DAYABOT</button>
                    </div>
                    <div class="col-10 mb-2 mb-md-0 col-md-3 col-xl-2 p-2 text-center">
                        <span class="back-aqua"><i class="fas fa-mobile"></i></span>
                        <h4>پیامرسان</h4>
                        <p class="text-secondary">از طریق واتساپ و تلگرام سفارش خود را ثبت کنید</p>
                        <button class="btn btn-gradient ltr">+98 123456789</button>
                        <button class="btn btn-gradient ltr">@DAYAADMIN</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact daya -->

    <!-- progress bars -->
    @include('components.circular-percentage')
    <!-- end progress bars -->

    <!-- About Daya -->
    <div class="section about-section col-12 p-0 mb-2">
        <div class="float-left col-12 p-4 py-5">
            <div class="image-box col-xl-2 col-lg-3 col-sm-3 col-12">
                <img src="{{ asset('images/daya-cyan-logo.png') }}" alt="">
            </div>
            <div class="col-xl-10 col-lg-9 col-sm-8 col-12 text-right">
                <p class="title cyan">درباره دایا</p>
                <p>تیم طراحی گرافیک دایا آرتز فعالیت خود را درسال 1396 آغاز نمود و سهم متناسبی از  بازار طراحی های دیجیتال به دست آورد. در سال های 1399 تیم فنی- هنری دایا آرتز تحقیقات خود را در زمینه رویکرد استارتاپی و شناخت نیاز گروه های مختلف و درک تفاوت های نیاز مشتریان بازار طراحی دیجیتال را به ویژه در طراحی لوگو شروع کرد و حاصل دو سال پیاپی ادغام تحقیق و تجربه و فناوری ، پلتفرم الکترونیک دایا آرتز را سرپا ساخت .
                <br>
                <a href="#" class="btn btn-info badge-pill float-left">بیشتر بخوانید</a></p>
            </div>
        </div>
    </div>
    <!-- end About Daya -->

    <!-- About Logo -->
    @include('components.info-item')
    <!-- end About Logo -->
    <x-portfolio :api-target="route('api.portfolios.index')"/>
    <x-quick-order-form />
    <!-- daya blog -->
    @include('components.blog-suggestion')
    <!-- end daya blog -->
@endsection