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
        <div class="header-vector col-12 col-md-5 mb-3 mb-md-0 vertical-centerlize">
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
            <div class="step-item t-0 l-0 ">
                <div class="step-shape step-1">
                    <span class="step-index">01</span>
                    <span class="step-icon"><i class="fas fa-bullseye"></i></span>
                </div>
                <div class="match-line"></div>
            </div>
            <div class="step-item b-0 l-25">
                <div class="step-shape step-2">
                    <span class="step-index">02</span>
                    <span class="step-icon"><i class="fas fa-handshake"></i></span>
                </div>
                <div class="match-line count-clock"></div>
            </div>
            <div class="step-item t-0 l-50">
                <div class="step-shape step-3">
                    <span class="step-index">03</span>
                    <span class="step-icon"><i class="fas fa-dollar-sign"></i></span>
                </div>
                <div class="match-line"></div>
            </div>
            <div class="step-item b-0 l-75">
                <div class="step-shape step-4">
                    <span class="step-index">04</span>
                    <span class="step-icon"><i class="fas fa-cog"></i></span>
                </div>
                <div class="match-line count-clock"></div>
            </div>
            <div class="step-item t-0 r-0">
                <div class="step-shape step-5">
                    <span class="step-index">05</span>
                    <span class="step-icon"><i class="fas fa-check-square"></i></span>
                </div>
        </div>
        </div>
    </div>
    <!-- order steps -->
@endsection