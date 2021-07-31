@extends('layouts.page')

@section('head')
    <title>{{ $service }}</title>
@endsection

@section('content')
<!-- first-section -->
    <div class="section col-12 mt-4 service-first-section dotted-background">
        <div class="title-section w-100">
            <div class="title-container">
                <h1 class="title-text">لوگو</h1>
                    {{-- <h1>{{ $service }}</h1> --}}
            </div>
        </div>
        <h4 class="text-center pr-md-5 pl-md-5 mb-4">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
        </h4>
    </div>
<!-- end first-section -->
<!-- sevices benefits -->
    <div class="header-section service-benefits-section auto-height">
        <div class="header-text p-3 col-12 col-md-7">
            <h4>مزیت های دایا ...</h2>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای </p>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای </p>
            <p class="mb-0">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای </p>
            <br>
        </div>
        <div class="header-vector col-10 col-sm-8 col-md-5 mb-3 mb-md-0 vertical-centerlize offset-sm-2 offset-1 offset-md-0">
            <img src="{{ asset('images/benefits.svg') }}" alt="rules vector" class="rules">
            <img src="{{ asset('images/benefits-background.svg') }}" alt="rules-back" class="rules-back">
        </div>
        <div class="triangle d-none d-md-block"></div>
    </div>
<!-- end sevices benefits -->
<!-- order steps -->
    <div class="section col-12 dotted-background">
        <div class="title-section mb-5 mt-4 w-100">
            <div class="title-container">
                <h4 class="title-text">روند سفارش</h4>
            </div>
        </div>
        <div class="step-container p-rel">
            <div class="step-item-container t-0 l-0">
                <div class="step-item t-0 step-1">
                    <div class="step-shape">
                        <span class="step-index">01</span>
                        <span class="step-icon"><i class="fas fa-bullseye"></i></span>
                    </div>
                    <div class="match-line"></div>
                </div>
                <div class="step-info step-1">
                    <h4>ثبت سفارش</h4>
                    <p>ایجاد سفارش از طریق روش های ثبت سفارش درج شده در صفحه ، روش های ثبت سفارش دایا آرتز</p>
                </div>
            </div>
            <div class="step-item-container b-0 l-25">
                <div class="step-item b-0 step-2">
                    <div class="step-shape">
                        <span class="step-index">02</span>
                        <span class="step-icon"><i class="fas fa-handshake"></i></span>
                    </div>
                    <div class="match-line count-clock"></div>
                </div>
                <div class="step-info step-2">
                    <h4>تایید تیم دایا</h4>
                    <p>تایید سفارش ، ایجاد قرارداد بین طرفین و پرداخت پیش پرداخت</p>
                </div>
            </div>
            <div class="step-item-container t-0">
                <div class="step-item t-0 l-50 step-3">
                    <div class="step-shape">
                        <span class="step-index">03</span>
                        <span class="step-icon"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <div class="match-line"></div>
                </div>
                <div class="step-info step-3">
                    <h4>دریافت اتود ها</h4>
                    <p>تحویل اتود و طرح ها بعد از مدت زمان مقرر شده ای که در زمان ایجاد پروژه محاسبه گردیده</p>
                </div>
            </div>
            <div class="step-item-container b-0 l-75">
                <div class="step-item b-0 step-4">
                    <div class="step-shape">
                        <span class="step-index">04</span>
                        <span class="step-icon"><i class="fas fa-cog"></i></span>
                    </div>
                    <div class="match-line count-clock"></div>
                </div>
                <div class="step-info step-4">
                    <h4>ادیت و تغییرات</h4>
                    <p>انجام ادیت ها و تغییرات شما و نزدیک شدن پروژه به طرح مد نظر شما توسط طراحان دایا</p>
                </div>
            </div>
            <div class="step-item-container t-0 r-0">
                <div class="step-item t-0 step-5">
                    <div class="step-shape">
                        <span class="step-index">05</span>
                        <span class="step-icon"><i class="fas fa-check-square"></i></span>
                    </div>
                </div>
                <div class="step-info step-5">
                    <h4>تصویه و تحویل</h4>
                    <p>پرداخت کامل هزینه سفارش و دریافت فایل مورد نظر شما</p>
                </div>
            </div>
        </div>
    </div> 
<!-- end order steps -->
<!-- start order 1 -->
    <div class="section w-100 start-order-section">
        <div class="start-order-1 w-100 p-5">
            <h4>برای شروع روند سفارش کلیک کنید</h4>
            <button class="btn btn-dark badge-pill mt-4">شروع سفارش</button>
        </div>
    </div>
<!-- end start order 1 -->
<!-- logo sample -->
    @include('components.portfolio')
<!-- end logo sample -->
<!-- order packs -->
    <div class="section w-100 order-packs-section mb-5">
        <div class="title-section w-100 mb-4">
            <div class="title-container">
                <h2 class="title-text">خدمات طراحی لوگو</h2>
                <h4 class="subtitle">بسته های هوشمند جهت سفارش لوگو های شما</h4>
            </div>
        </div>
        <div class="col-12 order-card-container">
            <div class="order-card card-1 col-12 col-md-4 col-xl-3">
                <h4 class="card-title">لاجورد</h4>
                <div class="card-price-container"><span class="card-price font-24 bold">4.</span><span class="card-price font-20">00</span><span class="font-16 ltr card-price">/میلیون تومان</span></div>
                <ul class="card-options">
                    <li>ارائه ۳ اتود <span>تایپو گرافی</span></li>
                    <li>ارائه ۲ اتود <span>تصویری</span></li>
                    <li>تعداد دفعات ویرایش تا ۳ بار</li>
                    <li>طراحی بر اساس علم برندینگ</li>
                    <li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>
                    <li>طراحی و اجرا توسط طراحان ارشد</li>
                    <li>معرفی رنگ صحیح سازمانی</li>
                </ul>
                <button class="btn btn-outline-light badge-pill">ثبت سفارش</button>
            </div>
            <div class="order-card card-2 col-12 col-md-4 col-xl-3">
                <h4 class="card-title">یاقوت</h4>
                <div class="card-price-container"><span class="card-price font-24 bold">5.</span><span class="card-price font-20">500</span><span class="font-16 ltr card-price">/میلیون تومان</span></div>
                <ul class="card-options">
                    <li>ارائه ۴ اتود <span>تایپوگرافی</span></li>
                    <li>ارائه ۳ اتود <span>تصویری</span></li>
                    <li>تعداد دفعات ویرایش تا ۵ بار</li>
                    <li>طراحی بر اساس علم برندینگ</li>
                    <li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>
                    <li>طراحی و اجرا توسط طراحان ارشد</li>
                    <li>معرفی رنگ صحیح سازمانی</li>
                </ul>
                <button class="btn btn-info badge-pill">ثبت سفارش</button>
            </div>
            <div class="order-card card-3 col-12 col-md-4 col-xl-3">
                <h4 class="card-title">یاقوت</h4>
                <div class="card-price-container"><span class="card-price font-24 bold">5.</span><span class="card-price font-20">500</span><span class="font-16 ltr card-price">/میلیون تومان</span></div>
                <ul class="card-options">
                    <li>ارائه ۲ اتود <span>تایپوگرافی</span></li>
                    <li>ارائه ۱ اتود <span>تصویری</span></li>
                    <li>تعداد دفعات ویرایش تا ۲ بار</li>
                    <li>طراحی بر اساس علم برندینگ</li>
                    <li>رنگ متناسب کسب و کار بر اساس علم روانشناسی</li>
                    <li>طراحی و اجرا توسط طراحان ارشد</li>
                    <li>معرفی رنگ صحیح سازمانی</li>
                </ul>
                <button class="btn btn-outline badge-pill">ثبت سفارش</button>
            </div>
        </div>
    </div>
<!-- end order packs -->
<!-- contact ways -->
    <div class="section w-100 mt-5 mb-5 order-ways-section">
        <div class="title-section mb-5 w-100">
            <div class="title-container">
                <h2 class="title-text">ثبت سفارش</h2>
            </div>
        </div>
        <div class="absolute-contact w-100">
            <div class="contact-section section w-100">
                <div class="col-12 bg-heavy-aqua back-aqua d-none d-md-block"></div>
                <div class="section contact-info w-100">
                    <div class="col-10 mb-2 mb-md-0 col-md-2 p-2 text-center">
                        <span class="back-aqua"><i class="fas fa-phone"></i></span>
                        <h4>تلفن</h4>
                        <p class="text-secondary">با شماره گیری تلفن های ثابت زیر سفارش خود را ثبت کنید</p>
                        <button class="btn btn-gradient ltr">+98 123456789</button>
                        <button class="btn btn-gradient ltr">021 1234567</button>
                    </div>
                    <div class="col-10 mb-2 mb-md-0 col-md-2 p-2 text-center">
                        <span class="back-aqua"><i class="fas fa-crosshairs"></i></span>
                        <h4>سفارش تخصصی</h4>
                        <p class="text-secondary">ثبت سفارش شما به شیوه تخصصی توسط فرم ها</p>
                        <button class="btn btn-gradient ltr">سفارش</button>
                    </div>
                    <div class="col-10 mb-2 mb-md-0 col-md-2 p-2 text-center">
                        <span class="back-aqua"><i class="fas fa-robot"></i></span>
                        <h4>ربات تلگرام</h4>
                        <p class="text-secondary">توسط ربات تلگرام ما سفارش خود را ثبت کنید</p>
                        <button class="btn btn-gradient ltr mt-12-p">@DAYABOT</button>
                    </div>
                    <div class="col-10 mb-2 mb-md-0 col-md-2 p-2 text-center">
                        <span class="back-aqua"><i class="fas fa-space-shuttle"></i></span>
                        <h4>سفارش فوری</h4>
                        <p class="text-secondary">ثبت صفارش شما به صورت فوری و سریع توسط فرم ها</p>
                        <button class="btn btn-gradient ltr">سفارش</button>
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
<!-- end contact ways -->
<!-- guide section -->
    <div class="section w-100 text-center mb-4 daya-guide">
        <div class="title-section w-100">
            <div class="title-container">
                <h2 class="title-text">راهنمای دایا</h2>
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
                <h4 class="mb-3 mb-md-2 mb-md-4">به راهنمایی احتیاج داری</h4>
                <form action="#">
                    <div class="input-group mb-2 mb-md-4"><input class="form-control" type="text" name="name" placeholder="نام و نام خانوادگی"></div>
                    <div class="form-group"><textarea class="form-control" name="message" cols="30" rows="10" placeholder="متن پیام شما"></textarea></div>
                    <button class="float-left btn btn-dark">ارسال پیام</button>
                </form>
            </div>
        </div>
    </div>
<!-- end guide section -->
<!-- FAQ accordion 1 -->
    <div class="section w-100 FAQ-section mt-5">
        <h4 class="faq-title mt-3 mb-4">سوالات متداول</h4>
        <div class="accordion-container p-4">
            <div class="item-wrapper col-12 col-md-6 col-lg-3 mr-1 mr-md-0 mr-lg-1">
                <div class="question-wrapper">
                    <h4>چگونه سفارش را ثبت کنیم؟</h4>
                    <span><i class="fas fa-minus"></i></span>
                </div>
                <p class="answer">سفارش هارو میتونید به دو روش تخصصی و فوری ثبت کنید ، برای اطلاعات بیشتر میتونید به صفحه راهنمای ثبت سفارش مراجعه کنید.</p>
            </div>
            <div class="item-wrapper col-12 col-md-6 col-lg-3 mr-1 mr-md-0 mr-lg-1">
                <div class="question-wrapper">
                    <h4>تفاوت سفارش فوری با تخصصی چیست؟</h4>
                    <span><i class="fas fa-minus"></i></span>
                </div>
                <p class="answer">در سفارش فوری با پر کردن فرم همکاران ما با شما تماس خواهند گرفت ، در سفارش تخصصی با پر کردن فرم ها سفارش خود را ثبت خواهید کرد.</p>
            </div>
            <div class="item-wrapper col-12 col-md-6 col-lg-3 mr-1 mr-md-0 mr-lg-1">
                <div class="question-wrapper">
                    <h4>ثبت سفارش تخصصی چگونه است؟</h4>
                    <span><i class="fas fa-minus"></i></span>
                </div>
                <p class="answer">با انتخاب کردن تعرفه مورد نظر خود که در سه بسته تقسیم بندی شده ، منتظر ارسال اتود های مورد نظر خود که در بازه زمانی ۱۵ الی ۲۰ روزه می باشد ، باشید.</p>
            </div>
            <div class="item-wrapper col-12 col-md-6 col-lg-3 mr-1 mr-md-0 mr-lg-1">
                <div class="question-wrapper">
                    <h4>چگونه به دایا اعتماد کنیم؟</h4>
                    <span><i class="fas fa-minus"></i></span>
                </div>
                <p class="answer">گروه طراحی دایا قدرت گرفته شده از تیم بزرگ سمپی با شماره ثبت ۳۲۳۵۰۵۰ و دارای نشان اعتماد و درگاه پرداخت زرین پال است.</p>
            </div>
            <div class="item-wrapper col-12 col-md-6 col-lg-3 mr-1 mr-md-0 mr-lg-1">
                <div class="question-wrapper">
                    <h4>شرایط ثبت سفارش چیست؟</h4>
                    <span><i class="fas fa-minus"></i></span>
                </div>
                <p class="answer">مطالعه دقیق شرایط و ظوابط و سپس تعرفه های سفارش ، پر کردن فرم درخواست سفارش و در انتها پرداخت مبلغ یا بیعانه بر اساس نوع سفارش</p>
            </div>
            <div class="item-wrapper col-12 col-md-6 col-lg-3 mr-1 mr-md-0 mr-lg-1">
                <div class="question-wrapper">
                    <h4>روش های پرداخت چیست؟</h4>
                    <span><i class="fas fa-minus"></i></span>
                </div>
                <ul class="answer">
                    <li>از طریق درگاه های اینترنتی سایت</li>
                    <li>از طریق کارت به کارت</li>
                </ul>
            </div>
        </div>
    </div>
<!-- end FAQ accordion 1 -->
<!-- daya blog -->
    @include('components.blog-suggestion')
<!-- end daya blog -->
@endsection