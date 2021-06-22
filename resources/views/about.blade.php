@extends('layouts.page')

@section('head')
    <title>About us | Daya Artz</title>
@endsection


@section('content')
<div class="section col-12 p-4 mb-2">
    <div class="col-12 title-section">
        <div class="title-container">
            <h1 class="title-text">درباره ما</h1>
            <span class="title-underline"></span>
        </div>
    </div>
    <div class="col-12 float-left p-3 px-5 mt-3 text">
        <p class="text-center">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
    </div>
</div>
<div class="section advantage-section col-12 p-0">
    <div class="image-box float-left p-0 col-lg-6 col-12">
        <img src="{{ asset('images/about-us-vector.svg') }}" alt="">
    </div>
    <div class="advantage-box float-left col-lg-6 col-12">
        <h2 class="title title-bigger text-white left-bordered float-right col-12">مزیت های دایا</h2>
        <ul class="advantages mt-4 float-right">
            <li>
                <a href="#">
                    <i class="avatar far fa-chart-bar"></i>
                    <div class="description">
                        <p class="title">تحلیل شخصیت برند</p>
                        <p class="subtitle">تحلیل شخصیت برند با استفاده از مباحث روانشناسی برند</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="avatar fas fa-funnel-dollar"></i>
                    <div class="description">
                        <p class="title">صرفه جویی در هزینه</p>
                        <p class="subtitle">بهترین هزینه با توجه به کیفیت بی نظیر</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="avatar fas fa-bullseye"></i>
                    <div class="description">
                        <p class="title">طراحی هدفمند</p>
                        <p class="subtitle">طراحی در راستای فعالیت و بازار برند شما</p>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="avatar far fa-question-circle"></i>
                    <div class="description">
                        <p class="title">راهنمایی شخصیت برند</p>
                        <p class="subtitle">معرفی شخصیت برند شما</p>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</div>
<div class="section col-12 p-3 my-4">
    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز
        و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از ص
       نعت چاپ و با استفاده از طراحان گرافیک است.</p>
    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز
        و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از ص
       نعت چاپ و با استفاده از طراحان گرافیک است.</p>
</div>
@endsection