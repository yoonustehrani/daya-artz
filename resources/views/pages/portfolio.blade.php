@extends('layouts.page')

@section('head')
    <title>نمونه کار | Daya Artz Blog</title>
@endsection

@section('content')
<!-- page section guide -->
{{-- <div class="section-guide col-md-4 col-xl-3 d-none d-md-block">
    <h4>راهنمای صفحه</h4>
    <ul>
        <li><span>شخصات کلی لوگو</span> <span></span></li>
        <li><span>درباره مشتری</span> <span></span></li>
        <li><span>جزئیات سفارش</span> <span></span></li>
        <li><span>شروع ثبت سفارش</span> <span></span></li>
        <li><span>راهنمای دایا</span> <span></span></li>
        <li><span>طرح های مشابه</span> <span></span></li>
    </ul>
</div> --}}
<!-- end section guide -->

<!-- sample info -->
<div class="w-100 float-left dotted-background p-4 p-md-2 p-lg-5">
    <div class="float-right col-12 col-md-8">
        <div class="sample-images-slider float-right">
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
                <li>امتیاز لوگو: <h3>8/10</h3></li>
                <li>نظر کابران: <span class="mr-2"><i class="fab fa-gratipay"></i> 273</span></li>
            </ul>
        </div>
    </div>
</div>
<!-- end sample info -->

<!-- start order detail -->
<div class="w-100 float-left portfolio-order-detail">
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
<div class="w-100 float-left p-4 process-timeline dotted-background">
    <div class="icons-container">
        <span><i class="fas fa-bullseye"></i></span>
        <span><i class="fas fa-dollar-sign"></i></span>
        <span><i class="fas fa-handshake"></i></span>
        <span><i class="fas fa-cog"></i></span>
        <span><i class="fas fa-check-square"></i></span>
    </div>
    <div class="dates-line">
        <span>99/04/23</span>
        <span>99/04/23</span>
        <span>99/04/23</span>
        <span>99/04/23</span>
        <span>99/04/23</span>
    </div>
    <div class="levels-container">
        <span><i class="fas fa-ellipsis-v"></i> ثبت سفارش</span>
        <span><i class="fas fa-ellipsis-v"></i> ثبت قرارداد و پیش پرداخت</span>
        <span><i class="fas fa-ellipsis-v"></i> ارسال اتود ها و دریافت تغییر ها</span>
        <span><i class="fas fa-ellipsis-v"></i> انجام تغییرات</span>
        <span><i class="fas fa-ellipsis-v"></i> تصوریه حساب و ارسال فایل</span>
    </div>
</div>
<!-- end process timeline -->
@endsection