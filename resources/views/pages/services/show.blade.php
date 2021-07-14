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
        <h4 class="text-center mb-4">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
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
        <div class="step-container p-rel mb-xl-5">
            <div class="step-item t-0 l-0 step-1">
                <div class="step-shape">
                    <span class="step-index">01</span>
                    <span class="step-icon"><i class="fas fa-bullseye"></i></span>
                </div>
                <div class="match-line"></div>
                <div class="step-info step-1 step-info-b d-md-none">
                    <h4>ثبت سفارش</h4>
                    <p>ایجاد سفارش از طریق روش های ثبت سفارش درج شده در صفحه ، روش های ثبت سفارش دایا آرتز</p>
                </div>
            </div>
            <div class="step-item b-0 l-25 step-2">
                <div class="step-shape">
                    <span class="step-index">02</span>
                    <span class="step-icon"><i class="fas fa-handshake"></i></span>
                </div>
                <div class="match-line count-clock"></div>
                <div class="step-info step-2 step-info-t d-md-none">
                    <h4>تایید تیم دایا</h4>
                    <p>تایید سفارش ، ایجاد قرارداد بین طرفین و پرداخت پیش پرداخت</p>
                </div>
            </div>
            <div class="step-item t-0 l-50 step-3">
                <div class="step-shape">
                    <span class="step-index">03</span>
                    <span class="step-icon"><i class="fas fa-dollar-sign"></i></span>
                </div>
                <div class="match-line"></div>
                <div class="step-info step-3 step-info-b d-md-none">
                    <h4>دریافت اتود ها</h4>
                    <p>تحویل اتود و طرح ها بعد از مدت زمان مقرر شده ای که در زمان ایجاد پروژه محاسبه گردیده</p>
                </div>
            </div>
            <div class="step-item b-0 l-75 step-4">
                <div class="step-shape">
                    <span class="step-index">04</span>
                    <span class="step-icon"><i class="fas fa-cog"></i></span>
                </div>
                <div class="match-line count-clock"></div>
                <div class="step-info step-4 step-info-t d-md-none">
                    <h4>ادیت و تغییرات</h4>
                    <p>انجام ادیت ها و تغییرات شما و نزدیک شدن پروژه به طرح مد نظر شما توسط طراحان دایا</p>
                </div>
            </div>
            <div class="step-item t-0 r-0 step-5">
                <div class="step-shape">
                    <span class="step-index">05</span>
                    <span class="step-icon"><i class="fas fa-check-square"></i></span>
                </div>
                <div class="step-info step-5 step-info-b d-md-none">
                    <h4>تصویه و تحویل</h4>
                    <p>پرداخت کامل هزینه سفارش و دریافت فایل مورد نظر شما</p>
                </div>
            </div>
        </div>
        <div class="steps-info-container w-100 d-none d-md-flex">
            <div class="step-info step-1 step-info-b">
                <h4>ثبت سفارش</h4>
                <p>ایجاد سفارش از طریق روش های ثبت سفارش درج شده در صفحه ، روش های ثبت سفارش دایا آرتز</p>
            </div>
            <div class="step-info step-2 step-info-t">
                <h4>تایید تیم دایا</h4>
                <p>تایید سفارش ، ایجاد قرارداد بین طرفین و پرداخت پیش پرداخت</p>
            </div>
            <div class="step-info step-3 step-info-b">
                <h4>دریافت اتود ها</h4>
                <p>تحویل اتود و طرح ها بعد از مدت زمان مقرر شده ای که در زمان ایجاد پروژه محاسبه گردیده</p>
            </div>
            <div class="step-info step-4 step-info-t">
                <h4>ادیت و تغییرات</h4>
                <p>انجام ادیت ها و تغییرات شما و نزدیک شدن پروژه به طرح مد نظر شما توسط طراحان دایا</p>
            </div>
            <div class="step-info step-5 step-info-b">
                <h4>تصویه و تحویل</h4>
                <p>پرداخت کامل هزینه سفارش و دریافت فایل مورد نظر شما</p>
            </div>
        </div>
    </div>
    <!-- order steps -->
    <!-- start order 1 -->
    <div class="section w-100 start-order-section">
        <div class="start-order-1 w-100 p-5">
            <h4>برای شروع روند سفارش کلیک کنید</h4>
            <button class="btn btn-dark badge-pill mt-4">شروع سفارش</button>
        </div>
    </div>
    <!-- end start order 1 -->
    
@endsection