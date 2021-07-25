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
<div class="section w-100 mt-5 mb-0 mb-md-3">
    <div class="title-section w-100 mb-4">
        <div class="title-container">
            <h2 class="title-text">خدمات اصلی دایا آرتز</h2>
        </div>
    </div>
    <div class="main-services-container w-100">
        <div class="main-service">
            <div class="icon-container"><span class="back-aqua"><i class="fab fa-d-and-d"></i></span><h2>لوگو</h2></div>
            <div class="info-container">
                <h3>طراحی لوگو با بالاترین کیفیت</h3>
                <p>لوگو نخستین بازتاب شخصیت و هویت برندآرمانی و تجاری شماست. لوگو طنابی تنیده شده از هدف ، باور و هسته فعالیت شماست</p>
                <div class="button-container">
                    <button class="btn btn-gradient mr-2">سفارش</button>
                    <button class="btn badge-pill">ادامه متن</button>
                </div>
            </div>
        </div>
        <div class="main-service">
            <div class="icon-container"><span class="back-aqua"><i class="fas fa-scroll"></i></span><h2>سربرگ</h2></div>
            <div class="info-container">
                <h3>طراحی سربرگ رسمی و حرفه ای</h3>
                <p>سربرگ نشان دهنده ی هویت سازمانی و قانونی بودن یک کسب و کار است. سربرگ ها جدی ترین و جزئی ترین بخش های هویت یک فعالیت رسمی هستند</p>
                <div class="button-container">
                    <button class="btn btn-gradient mr-2">سفارش</button>
                    <button class="btn badge-pill">ادامه متن</button>
                </div>
            </div>
        </div>
        <div class="main-service">
            <div class="icon-container"><span class="back-aqua"><i class="fas fa-book-open"></i></span><h2>کاتالوگ</h2></div>
            <div class="info-container">
                <h3>بهترین باز خورد ها با کاتالوگ های خاص</h3>
                <p>کاتالوگ مهم ترین ابزار برای تبلیغ و انتشار تبلیغات فروش یک محصول است. انتقال صحیح به مشتریان از مهم ترین ارمغان های کاتالوگ است</p>
                <div class="button-container">
                    <button class="btn btn-gradient mr-2">سفارش</button>
                    <button class="btn badge-pill">ادامه متن</button>
                </div>
            </div>
        </div>
        <div class="main-service">
            <div class="icon-container"><span class="back-aqua"><i class="fas fa-address-card"></i></span><h2>کارت ویزیت</h2></div>
            <div class="info-container">
                <h3>انواع کارت ویزیت های ساده و خاص</h3>
                <p>سربرگ نشان دهنده ی هویت سازمانی و قانونی بودن یک کسب و کار است. سربرگ ها جدی ترین و جزئی ترین بخش های هویت یک فعالیت رسمی هستند</p>
                <div class="button-container">
                    <button class="btn btn-gradient mr-2">سفارش</button>
                    <button class="btn badge-pill">ادامه متن</button>
                </div>
            </div>
        </div>
        <div class="main-service">
            <div class="icon-container"><span class="back-aqua"><i class="fas fa-mail-bulk"></i></span><h2>ست اداری</h2></div>
            <div class="info-container">
                <h3>ویزیت ، سربرگ ، تقویم و سررسید ، خودکار و ...</h3>
                <p>لوازم ست اداری همگی متحدالرنگ و همسو و هم جهت ارمان ها و برند شرکت طراحی می شوند ، و وابسته به هدف و نوع متقاضیان انتخاب می شود</p>
                <div class="button-container">
                    <button class="btn btn-gradient mr-2">سفارش</button>
                    <button class="btn badge-pill">ادامه متن</button>
                </div>
            </div>
        </div>
        <div class="main-service">
            <div class="icon-container"><span class="back-aqua"><i class="fas fa-plus-circle"></i></span><h2>ترکیبی</h2></div>
            <div class="info-container">
                <h3>ترکیب خود را بسازید</h3>
                <p>اگه نیاز به طراحی های متنوع در بخش عا و خدمات مختلف هستید ، این بسته بهترین انتخاب برای شما و برندتان خواهد بود</p>
                <div class="button-container">
                    <button class="btn btn-gradient mr-2">سفارش</button>
                    <button class="btn badge-pill">ادامه متن</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main services -->
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
<!-- other services -->
<div class="section w-100 mt-3 mt-md-5 mb-5">
    <div class="title-section w-100 mb-4">
        <div class="title-container">
            <h2 class="title-text">دیگر خدمات دایا</h2>
        </div>
    </div>
    <div class="other-services-container w-100">
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-ad"></i></span>
            <h2>بنر تبلیغاتی</h2>
            <h3>طراحی بنر دیجیتالی و چاپی</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-map"></i></span>
            <h2>بروشور</h2>
            <h3>طراحی انواع بروشور ها</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-sticky-note"></i></span>
            <h2>تراکت</h2>
            <h3>طراحی تراکت در انواع سایز و مدل</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-image"></i></span>
            <h2>اسلایدر وب سایت</h2>
            <h3>طراحی اسلایدر های حرفه ای</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fab fa-elementor"></i></span>
            <h2>منو رستوران و کافی شاپ</h2>
            <h3>منو های خاص و شکیل</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fab fa-instagram"></i></span>
            <h2>صفحات مجازی</h2>
            <h3>طراحی قالب ، کاور ،‌پروفایل و ...</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-envelope"></i></span>
            <h2>پاکت نامه</h2>
            <h3>پاکت های نامه رسمی و فانتزی</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-images"></i></span>
            <h2>بیلبورد</h2>
            <h3>طراحی انواع بیلبورد و استند و استرابورد</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-guitar"></i></span>
            <h2>موزیک</h2>
            <h3>کاور ، تم آلبوم و ...</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-calendar-check"></i></span>
            <h2>تقویم</h2>
            <h3>طراحی انواع تقویم و سررسید</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-receipt"></i></span>
            <h2>فاکتور</h2>
            <h3>طراحی انواع فاکتور های خاص و اداری</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-book-open"></i></span>
            <h2>جلد کتاب</h2>
            <h3>جلد انواع کتاب ، مجلات و ...</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
        <div class="other-service">
            <span class="back-aqua"><i class="fas fa-box"></i></span>
            <h2>بسته بندی</h2>
            <h3>بسته بندی های ساده و خاص</h3>
            <button class="btn btn-gradient">سفارش</button>
        </div>
    </div>
</div>
<!-- end other services -->
<!-- fast order -->
<div class="section fast-order-container w-100 mb-5">
    <div class="title-section w-100 mb-5">
        <div class="title-container">
            <h2 class="title-text">سفارش فوری</h2>
            <span class="title-underline"></span>
        </div>
    </div>
    <div class="fast-order-section text-center w-100">
        <div class="col-12 col-md-6 col-lg-5 ml-lg-4 col-xl-5 mt-1 fast-order-guide">
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
        <div class="fast-order-form col-12 col-md-6 col-lg-5 col-xl-4">
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
@endsection