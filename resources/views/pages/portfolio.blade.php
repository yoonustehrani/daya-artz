@extends('layouts.page')

@push('head')
    <title>نمونه کار | Daya Artz Blog</title>
@endpush

@section('content')
<!-- page section guide -->

<div class="section-guide-container animated bounceInLeft">
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
            <i class="far fa-question-circle d-none"></i>
            <i class="fas fa-question-circle animated bounceIn d-none"></i>
        </span>
        <span>
            <i class="fas fa-angle-left d-none"></i>
        </span>
    </span>
</div>
<!-- end section guide -->

<!-- sample info -->
<div id="logo-info" class="w-100 float-left dotted-background p-4 p-md-2 p-lg-5">
    <div class="float-right col-12 col-md-8">
        <div class="sample-images-slider">
            <div class="showing-image">
                <img src="{{ asset('images/gallery/sampi-logo.jpg') }}">
            </div>
            <div class="small-items-container">
                <span><i class="fas fa-chevron-left"></i></span>
                <div><img src="{{ asset('images/gallery/reverse-logo.jpg') }}" alt=""></div>
                <div><img src="{{ asset('images/gallery/tehran-tejarat-logo.jpg') }}" alt=""></div>
                <div><img src="{{ asset('images/gallery/elnovel-logo.jpg') }}" alt=""></div>
                <span><i class="fas fa-chevron-right"></i></span>
            </div>
        </div>
        <div class="sample-info mt-4 mt-md-0">
            <h3>مشخصات کلی لوگو</h3>
            <ul class="p-0">
                <li>نام برند: <h3>Sampi - سامپی</h3></li>
                <li>طرف قرارداد: <h3>تیم سامپی</h3></li>
                <li>نوع لوگو: <h3>تایپو گرافی</h3></li>
                {{-- <li>امتیاز لوگو: <h3>8/10</h3></li> --}}
                {{-- <li>نظر کابران: <span class="mr-2"><i class="fab fa-gratipay"></i> 273</span></li> --}}
            </ul>
        </div>
    </div>
</div>
<!-- end sample info -->

<!-- start order detail -->
<div id="order-detail" class="w-100 float-left portfolio-order-detail">
    <div class="w-100 h-100 dotted-background">
        <h4 class="pt-4">جزئیات سفارش</h4>
        <ul class="detail-box w-100 p-4 rtl">
            <li><h4>تعداد ادیت درخواستی: <span>3</span></h4></li>
            <li><h4>تعداد ادیت استفاده شده: <span>1</span></h4></li>
            <li><h4>نوع یا شیوه سفارش: <span>سفارش تخصصی از طریق وبسایت</span></h4></li>
            <li><h4>تعداد کل اتودها: <span>۳</span></h4></li>
            <li><h4>تعداد اتود تایید شده: <span>1</span></h4></li>
            <li><h4>نوع پکیج: <span>بسته لاجوردی</span></h4></li>
        </ul>
    </div>
</div>
<!-- end order detail -->

<!-- start process timeline-->
<div id="time-line" class="w-100 float-left p-4 process-timeline dotted-background">
    <div class="icons-container">
        <span><i class="far fa-hand-pointer"></i></span>
        <span><i class="far fa-credit-card"></i></span>
        <span><i class="far fa-handshake"></i></span>
        <span><i class="far fa-edit"></i></span>
        <span><i class="far fa-check-square"></i></span>
    </div>
    <div class="dates-line">
        <span>99/04/23</span>
        <span>99/04/23</span>
        <span>99/04/23</span>
        <span>99/04/23</span>
        <span>99/04/23</span>
    </div>
    <div class="levels-container">
        <span><i class="fas fa-circle"></i> ثبت سفارش</span>
        <span><i class="fas fa-circle"></i> ثبت قرارداد و پیش پرداخت</span>
        <span><i class="fas fa-circle"></i> ارسال اتود ها و دریافت تغییر ها</span>
        <span><i class="fas fa-circle"></i> انجام تغییرات</span>
        <span><i class="fas fa-circle"></i> تصوریه حساب و ارسال فایل</span>
    </div>
</div>
<!-- end process timeline -->

<!-- start customer detail -->
<div id="customer-detail" class="header-section service-benefits-section auto-height p-3">
    <div class="header-text col-12 col-md-8">
        <ul>
            <li>نام شرکت: <h3>تیم سامپی تِک | Sampi Tech</h3></li>
            <br>
            <li>درباره شرکت: <p>شرکت “سامپی تِک” با فعالیت در زمینه استارت آپ و ایده های مدرن ، آغاز کننده بسیاری از بیزینس ها و نوآوری ها می باشد .</p></li>
            <br>
            <li>نطر شرگت سامپی درباره کار با دایاآرتز: <p>با تشکر فراوان از تیم جوان و ایده پرداز “دایا” برای برخورد بسیار حرفه ای و طراحان خوش ذهن ، بسیار خرسندیم که با شما کار کردیم .</p></li>
        </ul>
    </div>
    <div class="header-vector col-10 col-sm-8 col-md-4 mb-3 mb-md-0">
        <img src="{{ asset('images/profile.svg') }}" class="rules">
        <img src="{{ asset('images/profile-back.svg') }}" class="rules-back">
    </div>
</div>
<!-- end customer detail -->

<!-- start logo info item -->
<div id="about-logo" class="col-12 float-left p-3 mt-4">
    <div class="w-100 title-section">
        <div class="title-container">
            <h2 class="title-text">فلسفه فکری لوگو</h2>
        </div>
    </div>
    <div class="tab-element mt-2">
        <ul class="tabs-container col-12 float-left p-0">
            <li class="tab badge badge-pill eggplant active">طرح</li>
            <li class="tab badge badge-pill eggplant">رنگ</li>
            <li class="tab badge badge-pill eggplant">قالب</li>
            <li class="tab badge badge-pill eggplant">جزئیات</li>
        </ul>
        <div class="tab-contents col-lg-6 offset-lg-3 col-md-8 offset-md-2 col-12 float-left mt-3">
            <article class="tab-content active">
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
            </article>
            <article class="tab-content">
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
            </article>
            <article class="tab-content">
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
            </article>
            <article class="tab-content">
                <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
            </article>
        </div>
    </div>
</div>
<!-- end logo infp item -->

<!-- start order -->
<div id="start-order" class="float-left w-100">
    @include('components.start-order')
</div>
<!-- end start order -->

<!-- daya guide -->
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
<!-- end daya guide -->

<!-- daya samples -->
<div id="daya-samples" class="section col-12 p-4 mt-5">
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
</div>
<!-- end daya samples -->
@endsection