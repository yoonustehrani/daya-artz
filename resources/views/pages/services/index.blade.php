@extends('layouts.page')

@section('header')
<!-- services Header -->
<div class="header-section policy-header dotted-background services-header">
    <div class="header-text p-4 col-12 col-md-7">
        <h2>خدمات <a href="{{ route('home') }}">دایا</a></h2>
        <br>
        <p>تیم طراحی <a href="{{ route('home') }}">دایا آرتز</a> با ارائه لیست کاملی از خدمات طراحی برای شما مشتریان در تلاش است تا ثبت سفارشات شما را به راحت ترین روش ممکن ایجاد کند.</p>
    </div>
    <div class="header-vector col-12 col-md-5 mb-3 mb-md-0">
        <img src="{{ asset('images/services.svg') }}" class="rules">
        <img src="{{ asset('images/services-back-vector.png') }}" class="rules-back">
    </div>
    <div class="triangle d-none d-md-block"></div>
</div>
<!-- end services Header -->
@endsection

@section('content')
<!-- services groups -->
<div class="section w-100 mt-5 mb-5">
    <div class="title-section w-100 mb-4">
        <div class="title-container">
            <h2 class="title-text">دسته بندی خدمات</h2>
        </div>
    </div>
    <div class="services-groups-container w-100">
        <div class="group-item col-12 col-md-3 mb-5 mb-md-0">
            <span class="computer-container">
                <i class="fas fa-desktop computer-icon"></i>
                <i class="fas fa-print inside-computer"></i>
            </span>
            <h4 class="group-name">خدمات طراحی چاپی</h4>
        </div>
        <div class="d-none d-md-block matcher-line match-line-1"></div>
        <div class="group-item col-12 col-md-3 mb-5 mb-md-0">
            <span class="computer-container">
                <i class="fas fa-desktop computer-icon"></i>
                <i class="fab fa-twitter inside-computer"></i>
            </span>
            <h4 class="group-name">خدمات طراحی فضای مجازی </h4>
        </div>
        <div class="d-none d-md-block matcher-line match-line-2"></div>
        <div class="group-item col-12 col-md-3 mb-5 mb-md-0">
            <span class="computer-container">
                <i class="fas fa-desktop computer-icon"></i>
                <i class="fas fa-pencil-ruler inside-computer"></i>
            </span>
            <h4 class="group-name">خدمات طراحی دیجیتالی</h4>
        </div>
    </div>
</div>
<!-- services groups -->
<!-- search section -->
<div class="section dotted-background bg-purple-gr col-12 p-4">
    <p class="title title-bigger text-light text-center">دنبال چه نوع طراحی میگردی؟</p>
    <div class="input-group input-group-lg search-box-services col-lg-4 offset-lg-4 col-md-6 offset-md-3 col-12 float-left">
        <div class="input-group-prepend">
            <button class="btn btn-search" type="button">جستجو</button>
        </div>
        <input class="h-100 form-control text-light" type="text" placeholder="اینجا بنویس">
    </div>
</div>
<!-- end search section -->
<!-- main services section -->
<div class="section w-100 mt-5 mb-5">
    <div class="title-section w-100 mb-4">
        <div class="title-container">
            <h2 class="title-text">خدمات اصلی دایا آرتز</h2>
        </div>
    </div>
    <div class="main-services-container w-100">
        <div class="col-12 col-md-5 mr-4 main-service">
            <div class="icon-container"><span class="back-aqua"><i class="fas fa-plus"></i></span><h2>لوگو</h2></div>
            <div class="info-container">
                <h3>طراحی سربرگ رسمی و حرفه ای</h3>
                <p>این فقط یه متن همینجوریه و قراره بعدا محتوای اصلی جاشو بگیره الان فقط برا پر کردن فضای کارته پس زیاد نگرانش نباشین الله اکبر خامنه ای رهبر</p>
                <div class="button-container">
                    <button class="btn btn-info mr-2">سفارش</button>
                    <button class="btn btn-info">ادامه متن</button>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 mr-4 main-service">
            <div class="icon-container"><span class="back-aqua"><i class="fas fa-plus"></i></span><h2>لوگو</h2></div>
            <div class="info-container">
                <h3>طراحی سربرگ رسمی و حرفه ای</h3>
                <p>این فقط یه متن همینجوریه و قراره بعدا محتوای اصلی جاشو بگیره الان فقط برا پر کردن فضای کارته پس زیاد نگرانش نباشین الله اکبر خامنه ای رهبر</p>
                <div class="button-container">
                    <button class="btn btn-info mr-2">سفارش</button>
                    <button class="btn btn-info">ادامه متن</button>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 mr-4 main-service">
            <div class="icon-container"><span class="back-aqua"><i class="fas fa-plus"></i></span><h2>لوگو</h2></div>
            <div class="info-container">
                <h3>طراحی سربرگ رسمی و حرفه ای</h3>
                <p>این فقط یه متن همینجوریه و قراره بعدا محتوای اصلی جاشو بگیره الان فقط برا پر کردن فضای کارته پس زیاد نگرانش نباشین الله اکبر خامنه ای رهبر</p>
                <div class="button-container">
                    <button class="btn btn-info mr-2">سفارش</button>
                    <button class="btn btn-info">ادامه متن</button>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 mr-4 main-service">
            <div class="icon-container"><span class="back-aqua"><i class="fas fa-plus"></i></span><h2>لوگو</h2></div>
            <div class="info-container">
                <h3>طراحی سربرگ رسمی و حرفه ای</h3>
                <p>این فقط یه متن همینجوریه و قراره بعدا محتوای اصلی جاشو بگیره الان فقط برا پر کردن فضای کارته پس زیاد نگرانش نباشین الله اکبر خامنه ای رهبر</p>
                <div class="button-container">
                    <button class="btn btn-info mr-2">سفارش</button>
                    <button class="btn btn-info">ادامه متن</button>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-5 mr-4 main-service">
            <div class="icon-container"><span class="back-aqua"><i class="fas fa-plus"></i></span><h2>لوگو</h2></div>
            <div class="info-container">
                <h3>طراحی سربرگ رسمی و حرفه ای</h3>
                <p>این فقط یه متن همینجوریه و قراره بعدا محتوای اصلی جاشو بگیره الان فقط برا پر کردن فضای کارته پس زیاد نگرانش نباشین الله اکبر خامنه ای رهبر</p>
                <div class="button-container">
                    <button class="btn btn-info mr-2">سفارش</button>
                    <button class="btn btn-info">ادامه متن</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main services -->
@endsection