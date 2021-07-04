<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <title>Daya Artz</title>
</head>
<body>
    <!-- Header -->
    <header class="header">
        @include('components.header')
        <div class="header-section">
            <div class="header-text p-4 col-12 col-md-6">
                <h1>لوگوی خودتون رو <span>شگفت زده</span> کنید</h1>
                <br>
                <p><b>دایا آرتز</b> ؛ نخستین مرکز طراحی گرافیک با رویکرد استارتاپی<br>
                تیم طراحی دایا ارائه دهنده خدمات گرافیکی با رویکردی متفاوت است ، در دایا رنگ ها و ترسیمات از زیر ذره بین ایده و مفهوم می گذرند تا به جلایی تازه به هویت برند شما بخشیده شود و پوسته ظاهر و برند فعالیت شما به رنگ هسته ایده و هویت حقیقی اش برسد . دایا آرتز تزریق رنگ ایده هایتان به شخصیت شماست . برای آشنایی بیشتر با عقاید دایا آرتز کلیک کنید </p>
                <div class="header-btn-container mt-4 mt-md-0">
                    <button class="btn btn-gradient ml-4 purple">آشنایی بیشتر</button>
                    <button class="btn btn-gradient aqua">شروع سفارش</button>
                </div>
            </div>
            <div class="header-vector col-12 col-md-6">
                <img src="{{ asset('images/header-vector.svg') }}" alt="header-vector">
                <div class="triangle d-none d-md-block"></div>
            </div>
        </div>
    </header>
    <!-- end Header -->
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
            <div class="service-container col-6 p-0 p-md-2 col-md-4 col-lg-3">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fab fa-mixer"></i></span>
                    <h1 class="block w-100 text-center">لوگو</h1>
                    <h3 class="block w-100 text-center">طراحی لوگو با بالاترین کیفیت</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
            <div class="service-container col-6 p-0 p-md-2 col-md-4 col-lg-3">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fas fa-paste"></i></span>
                    <h1 class="block w-100 text-center">سربرگ</h1>
                    <h3 class="block w-100 text-center">طراحی سربرگ رسمی و حرفه ای</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
            <div class="service-container col-6 p-0 p-md-2 col-md-4 col-lg-3">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fas fa-newspaper"></i></span>
                    <h1 class="block w-100 text-center">کاتالوگ</h1>
                    <h3 class="block w-100 text-center">کاتالوگ و بروشور حرفه ای</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
            <div class="service-container col-6 p-0 p-md-2 col-md-4 col-lg-3">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fas fa-id-card"></i></span>
                    <h1 class="block w-100 text-center">کارت ویزیت</h1>
                    <h3 class="block w-100 text-center">طراحی کارت ویزیت حرفه ای</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
            <div class="service-container col-6 p-0 p-md-2 col-md-4 col-lg-3">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fas fa-briefcase"></i></span>
                    <h1 class="block w-100 text-center">ست اداری</h1>
                    <h3 class="block w-100 text-center">ویزیت ، سربرگ ، تقویم و ...</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
            <div class="service-container col-6 p-0 p-md-2 col-md-4 col-lg-3">
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
        <div class="background-order w-100 p-0">
            <div class="title-section col-12 mb-3 mb-md-0 mt-3">
                <div class="title-container">
                    <p class="title-text">روش های ثبت سفارش در دایا</p>
                </div>
            </div>
            <div class="order-section section col-12">
                <div class="order-vector float-left">
                    <img src="{{ asset('images/speed-order.svg') }}" alt="fast-order">
                </div>
                <div class="order-detail float-left">
                    <h3 class="mb-4">سفارش فوری</h3>
                    <h4 class="mb-3">تسریع زمان ثبت<span><i class="check fas fa-check-circle"></i></span></h4>
                    <h4 class="mb-3">تحویل فوری لوگو<span><i class="check fas fa-check-circle"></i></span></h4>
                    <h4 class="mb-3">تعداد ادیت کم<span><i class="times fas fa-times-circle"></i></span></h4>
                    <h4 class="mb-3">کیفیت پایین نسبت به تخصصی<span><i class="times fas fa-times-circle"></i></span></h4>
                    <div class="order-btn-container mb-5 mr-md-3 mt-lg-4">
                        <button class="btn order-btn badge-pill badge-info">شروع سفارش</button>
                    </div>
                </div>
            </div>
            <div class="order-section section col-12 ml-8p rtl">
                <div class="order-vector float-right ml-md-4 w-md-45">
                    <div><img src="{{ asset('images/pro-order.svg') }}" alt="pro-order"></div>
                </div>    
                <div class="order-detail float-right mr-md-4 mt-20px">
                    <h3 class="mb-4">سفارش تخصصی</h3>
                    <h4 class="mb-3">فرم ثبت حرفه ای و کامل<span><i class="check fas fa-check-circle"></i></span></h4>
                    <h4 class="mb-3">تحویل لوگو درجه یک<span><i class="check fas fa-check-circle"></i></span></h4>
                    <h4 class="mb-3">نظارت بر طراحی لوگو<span><i class="check fas fa-check-circle"></i></span></h4>
                    <h4 class="mb-3">زمان تحویل نسبتا طولانی<span><i class="times fas fa-times-circle"></i></span></h4>
                    <div class="order-btn-container-4 mr-md-3 mt-lg-4">
                        <button class="btn order-btn badge-pill badge-info">شروع سفارش</button>
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
                <div class="col-md-10 offset-md-1 back-aqua d-none d-md-block"></div>
                <div class="section contact-info w-100">
                    <div class="col-10 mb-2 mb-md-0 col-md-2 p-2 text-center">
                        <span class="back-aqua"><i class="fas fa-phone"></i></span>
                        <h4>تلفن</h4>
                        <p class="text-secondary">با شماره گیری تلفن های ثابت زیر سفارش خود را ثبت کنید</p>
                        <button class="btn btn-gradient ltr">+98 123456789</button>
                        <button class="btn btn-gradient ltr">021 1234567</button>
                    </div>
                    <div class="col-10 mb-2 mb-md-0 col-md-2 p-2 text-center">
                        <span class="back-aqua"><i class="fas fa-robot"></i></span>
                        <h4>ربات تلگرام</h4>
                        <p class="text-secondary">توسط ربات تلگرام ما سفارش خود را ثبت کنید</p>
                        <button class="btn btn-gradient ltr mt-12-p">@DAYABOT</button>
                    </div>
                    <div class="col-10 mb-2 mb-md-0 col-md-2 p-2 text-center">
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
    <div class="col-12 mt-5 title-section">
        <div class="title-container">
            <h2 class="title-text">لوگو</h2>
            <span class="title-underline"></span>
        </div>
    </div>
    <div class="col-12 float-left p-3">
        <div class="tab-element">
            <ul class="tabs-container col-12 float-left p-0">
                <li class="tab badge badge-pill eggplant active">لوگو چیست؟</li>
                <li class="tab badge badge-pill eggplant">انواع لوگو</li>
                <li class="tab badge badge-pill eggplant">چرا لوگو؟</li>
                <li class="tab badge badge-pill eggplant">چرا دایا؟</li>
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
                <div class="col-12 mt-4 text-center">
                    <a href="#" class="btn badge-pill eggplant active">همین حالا سفارش دهید !</a>
                </div>
            </div>
        </div>
    </div>
    <!-- end About Logo -->
    <!-- Portfolio -->
    <div class="section col-12 p-4 mb-2">
        <div class="col-12 title-section">
            <div class="title-container">
                <h2 class="title-text">نمونه طراحی های دایا</h2>
                <span class="title-underline"></span>
            </div>
        </div>
        <div class="col-12 mt-4 float-left portfolio-section p-2">
            <a href="#">
            <div class="portfolio col-xl-2 col-lg-3 col-md-4 col-6 p-0">
                <div class="portfolio-avatar">
                    <img src="{{ asset('images/gallery/orange-studio-logo.jpg') }}" alt="">
                </div>
                <div class="portfolio-detail">
                    <p class="title">استدیو ترنج</p>
                    <ul>
                        <li>صنایع دستی</li>
                        <li>طراحی تخصصی</li>
                        <li>عناصر مرتبط</li>
                        <li>رنگ شناسی حرفه ای</li>
                    </ul>
                </div>
            </div>
            </a>
            <a href="#">
            <div class="portfolio col-xl-2 col-lg-3 col-md-4 col-6 p-0">
                <div class="portfolio-avatar">
                    <img src="{{ asset('images/gallery/reverse-logo.jpg') }}" alt="">
                </div>
                <div class="portfolio-detail">
                    <p class="title">Reverse Band</p>
                    <ul>
                        <li><i class="fas fa-headphones"></i> موسیقی</li>
                        <li>طراحی تخصصی</li>
                        <li>عناصر مرتبط</li>
                        <li>رنگ شناسی حرفه ای</li>
                    </ul>
                </div>
            </div>
            </a>
            <a href="#">
            <div class="portfolio col-xl-2 col-lg-3 col-md-4 col-6 p-0">
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
            <a href="#">
            <div class="portfolio col-xl-2 col-lg-3 col-md-4 col-6 p-0">
                <div class="portfolio-avatar">
                    <img src="{{ asset('images/gallery/vispubish-logo.jpg') }}" alt="">
                </div>
                <div class="portfolio-detail">
                    <p class="title">ویپوبیش</p>
                    <ul>
                        <li>پایگاه مقالات ادبی <i class="fas fa-pen"></i></li>
                        <li>طراحی تخصصی</li>
                        <li>عناصر مرتبط</li>
                        <li>رنگ شناسی حرفه ای</li>
                    </ul>
                </div>
            </div>
            </a>
            <a href="#">
            <div class="portfolio col-xl-2 col-lg-3 col-md-4 col-6 p-0">
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
            <a href="#">
            <div class="portfolio col-xl-2 col-lg-3 col-md-4 col-6 p-0">
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
    <!-- end Portfolio -->
    <!-- fast order -->
    <div class="section fast-order-container w-100 mb-5">
        <div class="title-section w-100 mb-5">
            <div class="title-container">
                <h2 class="title-text">سفارش فوری</h2>
                <span class="title-underline"></span>
            </div>
        </div>
        <div class="fast-order-section text-center w-100 col-md-11 col-12">
            <div class="float-right col-12 col-md-5 mt-md-5 mt-1 fast-order-guide">
                <h3 class="mb-5">فرم سفارش فوری</h3>
                <p class="font-18">با پر کردن این فرم و ثبت نوع طراحی کورد نیاز خود منتظر تماس کارشناسان باشید.</p>
                <br>
                <h5 class="font-18">راهنمای ثبت فرم:</h5>
                <ul class="font-18">
                    <li>وارد کردن مشخصات شخصی</li>
                    <li>وارد کردن شماره تماس در دسترس</li>
                    <li>انتخاب درسته مورد نیاز برای طراحی</li>
                </ul>
                <br><br>
                <p class="font-16 text-secondary">توجه داشته باشید حداقل زمان تماس کارشناسان با شما بعد از ثبت سفارش بین ۱۲ الی ۲۴ ساعت میباشد.</p>
            </div>
            <div class="float-right fast-order-form col-12 col-md-5">
                <form action="#">
                    <div class="input-group col-lg-6 col-12 float-right mb-3">
                        <input type="text" name="fast-order-name" class="form-control" placeholder="نام و نام خانوادگی">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                    </div>
                    <div class="input-group col-lg-6 col-12 float-right mb-3">
                        <input type="text" name="fast-order-number" class="form-control" placeholder="شماره تلفن">
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                        </div>
                    </div>
                    <div class="order-types mb-3 w-100">
                        <div class="checkbox col-5 col-md-4 col-xl-xl-2 p-0"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/brand.svg') }}"></span><span class="checkbox-label">لوگو</span></span></label></div>
                        <div class="checkbox col-5 col-md-4 col-xl-xl-2 p-0"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/big-brochure.svg') }}"></span><span class="checkbox-label">کاتالوگ</span></span></label></div>
                        <div class="checkbox col-5 col-md-4 col-xl-xl-2 p-0"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/credit-card.svg') }}"></span><span class="checkbox-label">کارت ویزیت</span></span></label></div>
                        <div class="checkbox col-5 col-md-4 col-xl-xl-2 p-0"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/paper.svg') }}"></span><span class="checkbox-label">سربرگ</span></span></label></div>
                        <div class="checkbox col-5 col-md-4 col-xl-xl-2 p-0"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/office-tools.svg') }}"></span><span class="checkbox-label">ست اداری</span></span></label></div>
                    </div>
                    <div class="form-group"><textarea name="fast-order-description" cols="30" rows="10" class="form-control" placeholder="توضیحات"></textarea></div>
                    <button type="submit" class="btn">ثبت سفارش</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end fast order -->
    <!-- daya blog -->
    <div class="section w-100">
        <div class="title-section col-12 mb-3">
            <div class="title-container">
                <h2 class="title-text">دایا بلاگ</h2>
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
                    <h3 class="title block">چگونه لوگوی خوب را بشناسیم</h3>
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
                    <h3 class="title block">بهترین لوگوهای جهان</h3>
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
                    <h3 class="title block">درباره برندینگ چه میدانید؟</h3>
                    <p class="blog-post-description text-secondary">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا </p>
                </a>
            </article>
        </div>
    </div>
    <!-- end daya blog -->
    <!-- footer -->
    <footer class="section w-100 footer">
        @include('components.footer')
    </footer>
    <!-- end footer -->
</body>
</html>