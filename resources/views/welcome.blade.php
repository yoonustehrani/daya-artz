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
        <nav>
            <div class="logo-container">
                <img src="{{ asset('images/daya-white-logo.png') }}">
            </div>
            <ul class="main-menu p-0 m-0">
                <li>
                    <a href="#">خانه</a>
                </li>
                <li>
                    <a href="#">طراحی گرافیک</a>
                    <ul class="submenu">
                        <li><a href="#">زیرمجموعه 1</a></li>
                        <li><a href="#">زیرمجموعه 2</a></li>
                        <li><a href="#">زیرمجموعه 3</a></li>
                        <li><a href="#">زیرمجموعه 4</a></li>
                        <li><a href="#">زیرمجموعه 5</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">زیرمجموعه دار</a>
                    <ul class="submenu">
                        <li><a href="#">زیرمجموعه 1</a></li>
                        <li><a href="#1">زیرمجموعه طولانی</a></li>
                        <li><a href="#2">زیرمجموعه یخورده طولانی تر</a></li>
                        <li><a href="#3">زیرمجموعه خیلــــــــی طولانی</a></li>
                    </ul>
                </li>
                <li><a href="#">مقالات</a></li>
                <li><a href="#">درباره ما</a></li>
                <li><a href="#">تماس با ما</a></li>
            </ul>
            <div class="last-item">
                <a href="#" class="btn-white">+‌ سفارش</a>
                <button class="btn-phone mr-3"><i class="fas fa-phone"></i></button>
            </div>
        </nav>
        <div class="header-section">
            <div class="header-vector">
                <img src="{{ asset('images/header-vector.svg') }}" alt="header-vector">
                <div class="triangle"></div>
            </div>
            <div class="header-text p-4">
                <h1><span>|</span> لوگوی خودتون رو <span>شگفت زده</span> کنید</h1> <br/>
                <p><b>دایا</b> برای ایجاد برتری برند شما اینجاست... <br/>
                برای نشان دادن تفاوت خود نسبت به رقبا نیازمند لوگویی خاص ، با کیفیت و از همه مهم تر مربوط به کار خود هستین ، خلاصه بخوام بگم اگه برندتون رو دوست دارید یه لوگوی خوب بهش مدیونین پس... |
                </p>
                <div class="header-btn-container">
                    <button class="btn btn-gradient ml-4 purple">ادامه متن</button>
                    <button class="btn btn-gradient aqua">شروع سفارش</button>
                </div>
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
            <p class="text-center rtl">با مراجعه به سایت ما ، شما گروه تکمیلی از سفارشات طراحی گرافیک را با بالاترین کیفیت در اختیار خواهید داشت ...</p>
        </div>
        <div class="services-container">
            <div class="service-container col-12 col-md-4 col-lg-3">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fab fa-mixer"></i></span>
                    <h1 class="block w-100 text-center">لوگو</h1>
                    <h3 class="block w-100 text-center">طراحی لوگو با بالاترین کیفیت</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
            <div class="service-container col-12 col-md-4 col-lg-3">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fas fa-paste"></i></span>
                    <h1 class="block w-100 text-center">سربرگ</h1>
                    <h3 class="block w-100 text-center">طراحی سربرگ رسمی و حرفه ای</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
            <div class="service-container col-12 col-md-4 col-lg-3">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fas fa-newspaper"></i></span>
                    <h1 class="block w-100 text-center">کاتالوگ</h1>
                    <h3 class="block w-100 text-center">کاتالوگ و بروشور حرفه ای</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
            <div class="service-container col-12 col-md-4 col-lg-3">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fas fa-id-card"></i></span>
                    <h1 class="block w-100 text-center">کارت ویزیت</h1>
                    <h3 class="block w-100 text-center">طراحی کارت ویزیت حرفه ای</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
            <div class="service-container col-12 col-md-4 col-lg-3">
                <div class="service-item p-4 text-center">
                    <span class="service-icon back-aqua"><i class="fas fa-briefcase"></i></span>
                    <h1 class="block w-100 text-center">ست اداری</h1>
                    <h3 class="block w-100 text-center">ویزیت ، سربرگ ، تقویم و ...</h3>
                    <button class="btn btn-gradient">سفارش</button>
                </div>
            </div>
            <div class="service-container col-12 col-md-4 col-lg-3">
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
        <div class="background-order col-md-10 offset-md-1 p-0">
            <div class="title-section col-12 mb-3">
                <div class="title-container">
                    <p class="title-text">روش های ثبت سفارش در دایا</p>
                </div>
            </div>
            <div class="order-section section w-100">
                <div class="order-vector float-left"><img src="{{ asset('images/speed-order.svg') }}" alt="fast-order"></div>
                <div class="order-detail float-left">
                    <h3 class="mb-4">سفارش فوری</h3>
                    <h4 class="mb-3">تسریع زمان ثبت<span><i class="check fas fa-check-circle"></i></span></h4>
                    <h4 class="mb-3">تحویل فوری لوگو<span><i class="check fas fa-check-circle"></i></span></h4>
                    <h4 class="mb-3">تعداد ادیت کم<span><i class="times fas fa-times-circle"></i></span></h4>
                    <h4 class="mb-3">کیفیت پایین نسبت به تخصصی<span><i class="times fas fa-times-circle"></i></span></h4>
                    <button class="btn badge-pill badge-info mt-4 mr-3">شروع سفارش</button>
                </div>
            </div>
            <div class="order-section section w-100 ml-6p">
                <div class="order-detail float-left">
                    <h3 class="mb-4">سفارش تخصصی</h3>
                    <h4 class="mb-3">فرم ثبت حرفه ای و کامل<span><i class="check fas fa-check-circle"></i></span></h4>
                    <h4 class="mb-3">تحویل لوگو درجه یک<span><i class="check fas fa-check-circle"></i></span></h4>
                    <h4 class="mb-3">نظارت بر طراحی لوگو<span><i class="check fas fa-check-circle"></i></span></h4>
                    <h4 class="mb-3">زمان تحویل نسبتا طولانی<span><i class="times fas fa-times-circle"></i></span></h4>
                    <button class="btn badge-pill badge-info mt-4 mr-3">شروع سفارش</button>
                </div>
                <div class="order-vector float-left">
                    <div><img src="{{ asset('images/pro-order.svg') }}" alt="pro-order"></div>
                </div>
            </div>
        </div>
        <div class="absolute-contact w-100">
            <div class="contact-section section w-100">
                <div class="col-md-10 offset-md-1 back-aqua"></div>
                <div class="section contact-info w-100">
                    <div class="col-10 col-md-2 p-2 text-center">
                        <span class="back-aqua"><i class="fas fa-phone"></i></span>
                        <h4>تلفن</h4>
                        <p class="text-secondary">با شماره گیری تلفن های ثابت زیر سفارش خود را ثبت کنید</p>
                        <button class="btn btn-gradient ltr">+98 123456789</button>
                        <button class="btn btn-gradient ltr">021 1234567</button>
                    </div>
                    <div class="col-10 col-md-2 p-2 text-center">
                        <span class="back-aqua"><i class="fas fa-robot"></i></span>
                        <h4>ربات تلگرام</h4>
                        <p class="text-secondary">توسط ربات تلگرام ما سفارش خود را ثبت کنید</p>
                        <button class="btn btn-gradient ltr mt-12-p">@DAYABOT</button>
                    </div>
                    <div class="col-10 col-md-2 p-2 text-center">
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
    <!-- end Ordering Methods -->
    <!-- About Daya -->
    <div class="section about-section col-12 p-0 mb-2">
        <div class="float-left col-12 p-4 py-5">
            <div class="image-box col-xl-2 col-lg-3 col-sm-3 col-12">
                <img src="{{ asset('images/daya-cyan-logo.png') }}" alt="">
            </div>
            <div class="col-xl-10 col-lg-9 col-sm-8 col-12 text-right">
                <p class="title cyan">درباره دایا</p>
                <p>گروه طراحی دایـا متشکل از تیمی باتجـربه و حرفه ای در زمینه های 
                    طراحـی گرافیـکی و تبلیـغاتی  در تلاش است بـستر مناسبی را برای 
                    کسانی که نیازمند طراحی یا طرحی با کیفیت و در سطـح بین المللی
                    و همچنین  کسب درامدزایی برای طراحان حرفه ای درجه یک کشور
                    ایران ایجاد سازد ، و همچنین نقظه آغازین شیوه نوین ثبت سفارش
                    و تحویل برای اولین بار در ایران باشد.
                <br>
                <a href="#" class="btn btn-info badge-pill float-left">بیشتر بخوانید</a></p>
            </div>
        </div>
    </div>
    <!-- end About Daya -->
    <!-- About Logo -->
    <div class="col-12 title-section">
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
        <div class="fast-order-section text-center w-100 offset-md-1">
            <div class="float-left fast-order-form col-12 col-md-6">
                <form action="#">
                    <div class="form-group"><input type="text" name="fast-order-name" class="form-control" placeholder="نام و نام خانوادگی"></div>
                    <div class="form-group"><input type="text" name="fast-order-number" class="form-control" placeholder="شماره تلفن"></div>
                    <div class="order-types w-100">
                        <div class="checkbox col-5 col-md-4 col-lg-2 p-0"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/brand.svg') }}"></span><span class="checkbox-label">لوگو</span></span></label></div>
                        <div class="checkbox col-5 col-md-4 col-lg-2 p-0"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/big-brochure.svg') }}"></span><span class="checkbox-label">کاتالوگ</span></span></label></div>
                        <div class="checkbox col-5 col-md-4 col-lg-2 p-0"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/credit-card.svg') }}"></span><span class="checkbox-label">کارت ویزیت</span></span></label></div>
                        <div class="checkbox col-5 col-md-4 col-lg-2 p-0"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/paper.svg') }}"></span><span class="checkbox-label">سربرگ</span></span></label></div>
                        <div class="checkbox col-5 col-md-4 col-lg-2 p-0"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/office-tools.svg') }}"></span><span class="checkbox-label">ست اداری</span></span></label></div>
                    </div>
                    <div class="form-group"><textarea name="fast-order-description" cols="30" rows="10" class="form-control" placeholder="توضیحات"></textarea></div>
                    <button type="submit" class="btn">ثبت سفارش</button>
                </form>
            </div>
            <div class="float-left col-12 col-md-3 offset-md-1 mt-5 fast-order-guide">
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
            <div class="blog-post col-12 col-md-3">
                <a href="#">
                    <div class="img-container w-100">
                        <img src="{{ asset('images/gallery/blog-post-1.jpg') }}" alt="post-cover" class="w-100 h-100">
                        <span>19 <br> خرداد</span>
                    </div>
                    <h5>نوشته شده توسط: ویکی پدیا</h5>
                    <h3 class="block">چگونه لوگوی خوب را بشناسیم</h3>
                </a>
            </div>
            <div class="blog-post col-12 col-md-3">
                <a href="#">
                    <div class="img-container w-100">
                        <img src="{{ asset('images/gallery/blog-post-2.jpg') }}" alt="post-cover" class="w-100 h-100">
                        <span>04 <br> تیر</span>
                    </div>
                    <h5>نوشته شده توسط: تیم دایا</h5>
                    <h3 class="block">بهترین لوگوهای جهان</h3>
                </a>
            </div>
            <div class="blog-post col-12 col-md-3">
                <a href="#">
                    <div class="img-container w-100">
                        <img src="{{ asset('images/gallery/blog-post-3.jpg') }}" alt="post-cover" class="w-100 h-100">
                        <span>30 <br> مهر</span>
                    </div>
                    <h5>نوشته شده توسط: تیم دایا</h5>
                    <h3 class="block">درباره برندینگ چه میدانید؟</h3>
                </a>
            </div>
        </div>
    </div>
    <!-- end daya blog -->
    <!-- footer -->
    <footer class="section w-100 footer">
        <div class="footer-content w-100">
            <div class="float-left col-12 text-center mb-5 mt-4 logo-container">
                <img src="{{ asset('images/daya-logo-circular.png') }}" alt="daya-logo">
                <p class="ml-2 text-light">DAYAARTZ</p>
            </div>
            <div class="col-12 float-left px-3 footer-info-container">
                <div class="col-lg-3 col-md-4 col-12">
                    <p class="title">درباره ما</p>
                    <div><p>گروه طراحی دایا متشکل از تیمی با تجربه و حرفه ای در زمینه های طراحی گرافیـکی و تبلیغاتی در تلاش است بستر مناسبی را برای کسانی که نیازمند طراحی یا طراحی با کیفیت و در سطح بین المللی و همچنین درامدزایی برای طراحان حرفه ای و درجه یک کشور ایران ایجاد سازد.</p></div>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <p class="title">لینک های سریع</p>
                    <div>
                        <ul class="text-right p-0">
                            <li><a href="#">حساب من</a></li>
                            <li><a href="#">سفارش فوری</a></li>
                            <li><a href="#">سفارش تخصصی</a></li>
                            <li><a href="#">راهنمای سفارشات</a></li>
                            <li><a href="#">وبلاگ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-12">
                    <p class="title">پشتیبانی</p>
                    <div>
                        <ul class="text-right p-0 mb-4">
                            <li><a href="#">تماس با ما</a></li>
                            <li><a href="#">ارسال تیکت</a></li>
                        </ul>
                        <img src="{{ asset('images/gallery/zarin-paal.jpg') }}" alt="zarin-paal" class="float-right ml-2">
                        <img src="{{ asset('images/gallery/etemad-namad.png') }}" alt="etemead" class="float-right">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-12">
                    <p class="title">دایا مجازی</p>
                    <div class="mb-4">
                        <div class="social-media-container">
                            <a href="https://instagram.com/dayaartz"><i class="fab fa-instagram"></i></a>
                            <a href="https://t.me/dayaartz"><i class="fab fa-telegram-plane ml-4"></i></a>
                        </div>
                        <div class="social-media-container">
                            <a href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://wa.me/+989015074027"><i class="fab fa-whatsapp ml-4"></i></a>
                        </div>
                    </div>
                    <p class="ltr">
                        <i class="far fa-copyright"></i>
                        Sampi Group. All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
</body>
</html>