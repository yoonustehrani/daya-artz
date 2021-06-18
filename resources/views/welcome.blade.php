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
                    <button class="btn ml-4 purple">ادامه متن</button>
                    <button class="btn aqua">شروع سفارش</button>
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
            <p class="text-center rtl">با مراجعه به سایت ما ، شما گروه تکمیلی از سفارشات طراحی گرافیک رابا بالاترین کیفیت در اختیار خواهید داشت ...</p>
        </div>
        <div class="services-container">
            <div class="service-container col-12 col-md-4 col-lg-3">
                <div class="service-item p-4 text-center">
                    <span class="service-icon"><i class="fab fa-mixer"></i></span>
                    <h1 class="block w-100 text-center">لوگو</h1>
                    <h3 class="block w-100 text-center">طراحی لوگو با بالاترین کیفیت</h3>
                    <button class="btn">سفارش</button>
                </div>
            </div>
            <div class="service-container col-12 col-md-4 col-lg-3">
                <div class="service-item p-4 text-center">
                    <span class="service-icon"><i class="fas fa-paste"></i></span>
                    <h1 class="block w-100 text-center">سربرگ</h1>
                    <h3 class="block w-100 text-center">طراحی سربرگ رسمی و حرفه ای</h3>
                    <button class="btn">سفارش</button>
                </div>
            </div>
            <div class="service-container col-12 col-md-4 col-lg-3">
                <div class="service-item p-4 text-center">
                    <span class="service-icon"><i class="fas fa-newspaper"></i></span>
                    <h1 class="block w-100 text-center">کاتالوگ</h1>
                    <h3 class="block w-100 text-center">کاتالوگ و بروشور حرفه ای</h3>
                    <button class="btn">سفارش</button>
                </div>
            </div>
            <div class="service-container col-12 col-md-4 col-lg-3">
                <div class="service-item p-4 text-center">
                    <span class="service-icon"><i class="fas fa-id-card"></i></span>
                    <h1 class="block w-100 text-center">کارت ویزیت</h1>
                    <h3 class="block w-100 text-center">طراحی کارت ویزیت حرفه ای</h3>
                    <button class="btn">سفارش</button>
                </div>
            </div>
            <div class="service-container col-12 col-md-4 col-lg-3">
                <div class="service-item p-4 text-center">
                    <span class="service-icon"><i class="fas fa-briefcase"></i></span>
                    <h1 class="block w-100 text-center">ست اداری</h1>
                    <h3 class="block w-100 text-center">ویزیت ، سربرگ ، تقویم و ...</h3>
                    <button class="btn">سفارش</button>
                </div>
            </div>
            <div class="service-container col-12 col-md-4 col-lg-3">
                <div class="service-item p-4 text-center">
                    <span class="service-icon"><i class="fas fa-cart-plus"></i></span>
                    <h1 class="block w-100 text-center">ترکیبی</h1>
                    <h3 class="block w-100 text-center">ترکیب خودتو بساز</h3>
                    <button class="btn">سفارش</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>