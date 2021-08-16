@extends('layouts.page')

@section('head')
    <title>نمونه کار | Daya Artz Blog</title>
@endsection

@section('content')
<!-- page section guide -->
<div class="section-guide col-md-4 d-none d-md-block">
    <h4>راهنمای صفحه</h4>
    <ul>
        <li><span>شخصات کلی لوگو</span> <span></span></li>
        <li><span>درباره مشتری</span> <span></span></li>
        <li><span>جزئیات سفارش</span> <span></span></li>
        <li><span>شروع ثبت سفارش</span> <span></span></li>
        <li><span>راهنمای دایا</span> <span></span></li>
        <li><span>طرح های مشابه</span> <span></span></li>
    </ul>
</div>
<!-- end section guide -->

<!-- sample info -->
    <div class="float-right col-12 col-md-8 p-5 mr-5">
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
        <div class="sample-info p-4">
            <h3>مشخصات کلی لوگو</h3>
            <ul>
                <li>نام برند: <h3>Sampi - سامپی</h3></li>
                <li>طرف قرارداد: <h3>تیم سامپی</h3></li>
                <li>نوع لوگو: <h3>تایپو گرافی</h3></li>
                <li>امتیاز لوگو: <h3>8/10</h3></li>
                <li class="vertical-centralize">نظر کابران: <span class="vertical-centralize mr-2"><i class="fab fa-gratipay"></i> 273</span></li>
            </ul>
        </div>
    </div>
<!-- end sample info -->
@endsection