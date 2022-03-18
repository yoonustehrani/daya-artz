@extends('layouts.default')

@section('title', 'طراحی لوگو - طراحی گرافیک - گرافیک دیزاین')

@section('header')
    <div class="header-section">
        <div class="header-text p-4 col-12 col-md-6">
            <h1>{!! get_setting('mainpage.header.h1') !!}</h1>
            <br>
            <p><b>دایا آرتز</b> ؛ نخستین مرکز طراحی گرافیک با رویکرد استارت آپی<br>
            تیم طراحی دایا آرتز ارائه دهنده خدمات گرافیکی با رویکردی متفاوت است؛ در دایا آرتز رنگ ها و ترسیمات از زیر ذره بین ایده و مفهوم می گذرند تا جلایی تازه به هویت برند شما بخشیده شود و همچنین پوسته ظاهر و برند فعالیت شما، به رنگ هسته ایده و هویت حقیقی اش برسد . دایا آرتز تزریق رنگ ایده هایتان به شخصیت شماست. امروز دایا آرتز را کشف کنید.</p>
            <div class="header-btn-container mt-4 mt-md-0">
                <button class="btn badge-pill bg-purple ml-4">کشف ما</button>
                <button class="btn btn-gradient bg-aqua">آغاز سفارش</button>
            </div>
            {{-- <p>{!! get_setting('mainpage.header.h1.subtitle') !!}</p>
            <div class="header-btn-container mt-4 mt-md-0">
                {!! get_setting('mainpage.header.buttons') !!}
            </div> --}}
        </div>
        <div class="header-vector col-12 col-md-6">
            <img src="{{ get_setting('mainpage.header.svg-header') }}" alt="دایا آرتز مکانی برای تحقق رویای گرافیکی">
            <div class="triangle d-none d-md-block"></div>
        </div>
    </div>
@endsection

@section('content')
    <div class="section col-12 p-4">
        <div class="col-12 title-section mb-3">
            <div class="title-container">
                <p class="title-text">خدمات دایا آرتز</p>
                <span class="title-underline"></span>
            </div>
        </div>
        <div class="subtitle-container">
            <p class="text-center rtl">خدمات شش گانه طراحی گرافیک دایا آرتز بر پایه هویت برند، در بالاترین کیفیت ممکن پیش روی شماست</p>
        </div>
        <div class="services-container">
            <div class="service-container col-6 p-0 p-md-2 col-md-4 col-lg-3 col-xl-2">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fab fa-apple"></i></span>
                    <h1 class="block w-100 text-center">لوگو</h1>
                    <h3 class="block w-100 text-center">طراحی لوگو با فلسفه فکری</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
            <div class="service-container col-6 p-0 p-md-2 col-md-4 col-lg-3 col-xl-2">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fas fa-paste"></i></span>
                    <h1 class="block w-100 text-center">سربرگ</h1>
                    <h3 class="block w-100 text-center">طراحی سربرگ رسمی و اداری</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
            <div class="service-container col-6 p-0 p-md-2 col-md-4 col-lg-3 col-xl-2">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fas fa-newspaper"></i></span>
                    <h1 class="block w-100 text-center">کاتالوگ</h1>
                    <h3 class="block w-100 text-center">کاتالوگ و بروشور هنری</h3>
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
                    <h3 class="block w-100 text-center">کارت ویزیت، سربرگ، تقویم و...</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
            <div class="service-container col-6 p-0 p-md-2 col-md-4 col-lg-3 col-xl-2">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fas fa-cart-plus"></i></span>
                    <h1 class="block w-100 text-center">ترکیبی</h1>
                    <h3 class="block w-100 text-center">پکیج خودتو بساز</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
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
                        <img src="{{ asset('images/speed-order.svg') }}" alt="fast-order">
                    </div>
                    <div class="order-detail">
                        <h3 class="mb-4">سفارش سریع</h3>
                        <h4 class="mb-3">تسریع زمان ثبت<span><i class="check fas fa-check-circle"></i></span></h4>
                        <h4 class="mb-3">پروسه کلاسیک<span><i class="check fas fa-check-circle"></i></span></h4>
                        <h4 class="mb-3">روند تکمیل و آسان<span><i class="check fas fa-check-circle"></i></span></h4>
                        <h4 class="mb-4">تکمیل برخط سفارش<span><i class="check fas fa-check-circle"></i></span></h4>
                        <div class="order-btn-container mt-lg-4">
                            <button class="btn btn-gradient silver-progress-button reverse" id="scroll-to-form-btn">
                                <p class="before">آغاز سفارش</p>
                                <p class="after">مشاهده فرم</p>
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
                        <h4 class="mb-3">ثبت فرم حرفه ای و کامل<span><i class="check fas fa-check-circle"></i></span></h4>
                        <h4 class="mb-3">پروسه هوشمند<span><i class="check fas fa-check-circle"></i></span></h4>
                        <h4 class="mb-3">روند تکمیل تر و ویژه<span><i class="check fas fa-check-circle"></i></span></h4>
                        <h4 class="mb-4">شخصی سازی سفارش<span><i class="check fas fa-check-circle"></i></span></h4>
                        <div class="order-btn-container mt-lg-4">
                            <button class="btn btn-gradient silver-progress-button">
                                <p class="before">روند سفارش</p>
                                <p class="after">شروع شود</p>
                                <span class="handler flex-center"><i class="fas fa-hand-point-left r-180"></i></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="section w-100 mt-5 mb-5">
        <div class="absolute-contact w-100">
            <div class="contact-section section w-100">
                <div class="col-md-11 contact-section-back d-none d-md-block"></div>
                <div class="section contact-info w-100">
                    <div class="col-10 mb-2 mb-md-0 col-md-3 col-xl-2 p-2 text-center">
                        <span class="back-aqua"><i class="fas fa-phone"></i></span>
                        <h4>تلفن تماس</h4>
                        <p class="text-secondary">ثبت سفارش و دریافت پشتیبانی از طریق شماره های:</p>
                        <a class="btn btn-gradient ltr" href="tel:+989015045025">0901 504 5025</a>
                        <a class="btn btn-gradient ltr" href="tel:+989016045025">0901 604 5025</a>
                    </div>
                    <div class="col-10 mb-2 mb-md-0 col-md-3 col-xl-2 p-2 text-center">
                        <span class="back-aqua"><i class="fas fa-robot"></i></span>
                        <h4>ربات تلگرام</h4>
                        <p class="text-secondary">ثبت سفارش تخصصی و هوشمند با ربات تلگرام:</p>
                        <a class="btn btn-gradient ltr mt-12-p" href="https://telegram.me/DayaArtzBot">@DAYAARTZBOT</a>
                    </div>
                    <div class="col-10 mb-2 mb-md-0 col-md-3 col-xl-2 p-2 text-center">
                        <span class="back-aqua"><i class="fas fa-mobile"></i></span>
                        <h4>پیام رسان</h4>
                        <p class="text-secondary">از طریق واتساپ و تلگرام سفارش خود را ثبت کنید</p>
                        <a class="btn btn-gradient ltr" href="https://telegram.me/dayasales">0901 604 5025</a>
                        <a class="btn btn-gradient ltr" href="https://t.me/dayaartz">@DAYAARTZ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('components.circular-percentage')
    <div class="section about-section col-12 p-0 mb-2">
        <div class="float-left col-12 p-4 py-5">
            <div class="image-box col-xl-2 col-lg-3 col-sm-3 col-12">
                <img src="{{ asset('images/daya-cyan-logo.png') }}" alt="">
            </div>
            <div class="col-xl-10 col-lg-9 col-sm-8 col-12 text-right">
                <p class="title cyan">درباره دایا آرتز</p>
                <p>تیم طراحی گرافیک دایا آرتز فعالیت خود را درسال 1396 آغاز نمود و سهم متناسبی از  بازار طراحی های دیجیتال، به دست آورد. در سال 1399 تیم فنی - هنری دایا آرتز تحقیقات خود را در زمینه رویکرد استارت آپی و درک تفاوت های نیاز مشتریان بازار طراحی دیجیتال را به ویژه در طراحی لوگو شروع کرد و حاصل دو سال پیاپی ادغام تحقیق و تجربه و فناوری ، پلتفرم الکترونیک دایا آرتز را سرپا ساخت .
                <br>
                <a href="http://localhost/about" class="btn btn-info badge-pill float-left">بیشتر بخوانید</a></p>
            </div>
        </div>
    </div>
    <x-info-item />
    <x-portfolio :api-target="route('api.portfolios.index')"/>
    <x-quick-order-form />
    <div id="blog-suggestion-react" api-target-random="{{ route('api.posts.index', ['mode' => 'random', 'limit' => '8']) }}" api-target-latest="{{ route('api.posts.index', ['mode' => 'latest', 'limit' => '8']) }}"></div>
@endsection