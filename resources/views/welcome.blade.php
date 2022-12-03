@extends('layouts.default')

@push('head')
<title>{{ $page->title }}</title>
    @component('components.seo', ['instance' => $page, 'slug' => 'pages', 'og' => ['title' => $page->title]]) @endcomponent
    <script type="application/ld+json">
        [{
            "@context": "https://schema.org",
            "@type": "Organization",
            "url": "https://dayaartz.com",
            "logo": "{{ get_setting('seo.brand.logo', 'https://dayaartz.com/images/daya-cyan-logo.png') }}"
        }]
    </script>
@endpush

@section('header')
    <div class="header-section">
        <div class="header-text p-4 col-12 col-md-6">
            <h1>{!! get_setting('mainpage.header.h1') !!}</h1>
            <br>
            <p>{!! get_setting('mainpage.header.h1.subtitle') !!}</p>
            <div class="header-btn-container mt-4 mt-md-0">
                {{-- <a href="/services" class="fancy-btn bg-purple ml-4">مشاهده خدمات</a>
                <button class="fancy-btn bg-aqua scroll-to-form">ثبت سفارش</button> --}}
                {!! get_setting('mainpage.header.buttons') !!}
            </div>
        </div>
        <div class="header-vector col-12 col-md-6">
            <img data-src="{{ get_setting('mainpage.header.svg-header') }}" class="lazyload" alt="دایا آرتز مکانی برای تحقق رویای گرافیکی">
            <div class="triangle d-none d-md-block"></div>
        </div>
    </div>
@endsection

@section('content')
    <div class="section col-12 p-4">
        <div class="col-12 title-section mb-3">
            <div class="title-container">
                <h2 class="title-text">{{ get_setting('mainpage.services.title') }}</h2>
                <span class="title-underline"></span>
            </div>
        </div>
        <div class="subtitle-container">
            <p class="text-center rtl">خدمات شش گانه طراحی گرافیک دایا آرتز بر پایه هویت برند، در بالاترین کیفیت ممکن پیش روی شماست</p>
        </div>
        <div class="services-container rtl">
            @foreach ($services as $service)
            <div class="service-container col-6 p-0 p-md-2 col-md-4 col-lg-3 col-xl-2">
                <a class="text-dark" href="{{ route('services.show', ['slug' => $service->slug]) }}">
                    <div class="service-item p-4 text-center">
                        <span class="service-icon back-aqua"><i class="{{ $service->icon_class }}"></i></span>
                        <h3 class="block w-100 text-center">{{ $service->title }}</h3>
                        <p class="block w-100 text-center">{{ $service->subtitle }}</p>
                    </div>
                </a>
            </div>
            @endforeach
            <div class="service-container col-6 p-0 p-md-2 col-md-4 col-lg-3 col-xl-2">
                <a class="text-dark" href="{{ route('services.index') }}">
                    <div class="service-item p-4 text-center">
                        <span class="service-icon back-aqua"><i class="fas fa-cart-plus"></i></span>
                        <h3 class="block w-100 text-center">دیگر خدمات دایا آرتز</h3>
                        <p class="block w-100 text-center">لیست کاملی از خدمات طراحی گرافیک</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="section w-100 order-section-container">
        <div class="background-order dotted-background w-100 p-0">
            <div class="title-section col-12 mb-3 mb-md-0 mt-3">
                <div class="title-container">
                    <p class="title-text">روش های ثبت سفارش در دایا آرتز</p>
                    <span class="title-underline"></span>
                </div>
            </div>
            <div class="order-vectors-container">
                <div class="order-section col-xl-6 col-12">
                    <div class="order-vector">
                        <img data-src="{{ asset('images/speed-order.svg') }}" class="lazyload" alt="سفارش سریع دایاآرتز">
                    </div>
                    <div class="order-detail">
                        <h3 class="mb-4">سفارش سریع</h3>
                        <h4 class="mb-3">تسریع زمان ثبت<span><i class="check fas fa-check-circle"></i></span></h4>
                        <h4 class="mb-3">پروسه کلاسیک<span><i class="check fas fa-check-circle"></i></span></h4>
                        <h4 class="mb-3">روند تکمیل و آسان<span><i class="check fas fa-check-circle"></i></span></h4>
                        <h4 class="mb-4">تکمیل برخط سفارش<span><i class="check fas fa-check-circle"></i></span></h4>
                        <div class="order-btn-container mt-lg-4 scroll-to-form">
                            <button class="btn btn-gradient silver-progress-button reverse">
                                <p class="before">آغاز سفارش</p>
                                <p class="after">مشاهده فرم</p>
                                <span class="handler flex-center"><i class="fas fa-hand-point-right"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="order-section col-xl-6 col-12 rtl">
                    <div class="order-vector">
                        <img data-src="{{ asset('images/pro-order.svg') }}" class="lazyload" alt="سفارش تخصصی دایاآرتز">
                    </div>    
                    <div class="order-detail">
                        <h3 class="mb-4">سفارش تخصصی</h3>
                        <h4 class="mb-3">ثبت فرم حرفه ای و کامل<span><i class="check fas fa-check-circle"></i></span></h4>
                        <h4 class="mb-3">پروسه هوشمند<span><i class="check fas fa-check-circle"></i></span></h4>
                        <h4 class="mb-3">روند تکمیل تر و ویژه<span><i class="check fas fa-check-circle"></i></span></h4>
                        <h4 class="mb-4">شخصی سازی سفارش<span><i class="check fas fa-check-circle"></i></span></h4>
                        <div class="order-btn-container mt-lg-4">
                            <button class="btn btn-gradient silver-progress-button soon">
                                <p class="before">روند سفارش</p>
                                <p class="after">بزودی</p>
                                <span class="handler flex-center"><i class="fas fa-hand-point-left r-180"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section w-100 mt-5 mb-5 order-ways-section">
        <div class="absolute-contact w-100">
            <div class="contact-section section w-100">
                <div class="col-12 bg-heavy-aqua contact-section-back d-none d-md-block"></div>
                <div class="section contact-info w-100">
                    <div class="col-10 mb-2 mb-md-0 col-md-2 p-2 text-center">
                        <span class="back-aqua"><i class="fal fa-phone"></i></span>
                        <h4>تماس تلفنی</h4>
                        <p class="text-secondary">مشاوره تلفنی رایگان + ثبت سفارش طراحی گرافیک</p>
                        <a class="btn btn-gradient ltr" href="tel:+982128423542">021 2842 3542</a>
                        <a class="btn btn-gradient ltr" href="tel:+989015045025">0901 504 5025</a>
                    </div>
                    <div class="col-10 mb-2 mb-md-0 col-md-2 p-2 text-center">
                        <span class="back-aqua"><i class="fal fa-robot"></i></span>
                        <h4>ربات تلگرامی</h4>
                        <p class="text-secondary">سفارش طراحی گرافیک تون رو خیلی راحت و سریع از طریق ربات تلگرام ما ثبت کنید.</p>
                        <a class="btn btn-gradient ltr mt-12-p" href="https://t.me/DayaArtzBot">شروع سفارش تلگرامی</a>
                    </div>
                    <div class="col-10 mb-2 mb-md-0 col-md-2 p-2 text-center">
                        <span class="back-aqua"><i class="fal fa-mobile"></i></span>
                        <h4>پیام رسان</h4>
                        <p class="text-secondary">از طریق واتساپ و تلگرام سفارش خود را ثبت کنید</p>
                        <a class="btn btn-gradient ltr" href="https://telegram.me/dayasales"><i class="fab fa-telegram-plane"></i> 0901 504 5025</a>
                        <a class="btn btn-gradient ltr" href="https://wa.me/989016045025"><i class="fab fa-whatsapp"></i> 0901 604 5025</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.circular-percentage')
    <div class="section about-section col-12 p-0 mb-2">
        <div class="float-left col-12 p-4 py-5">
            <div class="image-box col-xl-2 col-lg-3 col-sm-3 col-12">
                <img data-src="{{ asset('images/daya-cyan-logo.png') }}" class="lazyload" alt="لوگوی دایاآرتز">
            </div>
            <div class="col-xl-10 col-lg-9 col-sm-8 col-12 text-right">
                <p class="title cyan">درباره دایا آرتز</p>
                <p>تیم طراحی گرافیک دایا آرتز فعالیت خود را درسال 1396 آغاز نمود و سهم متناسبی از  بازار طراحی های دیجیتال، به دست آورد. در سال 1399 تیم فنی - هنری دایا آرتز تحقیقات خود را در زمینه رویکرد استارت آپی و درک تفاوت های نیاز مشتریان بازار طراحی دیجیتال را به ویژه در طراحی لوگو شروع کرد و حاصل دو سال پیاپی ادغام تحقیق و تجربه و فناوری ، پلتفرم الکترونیک دایا آرتز را سرپا ساخت .
                <br>
                <a href="{{ route('about') }}" class="btn btn-info badge-pill float-left">بیشتر بخوانید</a></p>
            </div>
        </div>
    </div>
    <x-info-item />
    <x-portfolio :api-target="route('api.portfolios.index')"/>
    <x-quick-order-form />
    <div id="blog-suggestion-react" api-target-random="{{ route('api.posts.index', ['mode' => 'random', 'limit' => '8']) }}" api-target-latest="{{ route('api.posts.index', ['mode' => 'latest', 'limit' => '8']) }}"></div>
@endsection