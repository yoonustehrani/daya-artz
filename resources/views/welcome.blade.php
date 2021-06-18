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
    <div class="section about-section col-12 p-0 mb-2">
        <div class="float-left col-12 p-4 py-5">
            <div class="col-lg-3">
                <img src="{{ asset('images/daya-cyan-logo.png') }}" alt="">
            </div>
            <div class="col-lg-9 text-right">
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
    <div class="section col-12 p-4 mb-2">
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
                    <li class="tab badge badge-pill eggplant">چرا لوگو</li>
                    <li class="tab badge badge-pill eggplant">چرا دایا</li>
                </ul>
                <div class="tab-contents col-lg-6 offset-lg-3 col-md-8 offset-md-4 col-12 float-left mt-3">
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
    </div>
</body>
</html>