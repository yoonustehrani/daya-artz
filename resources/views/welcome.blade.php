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
                <li><a href="#">خانه</a></li>
                <li><a href="#">طراحی گرافیک</a></li>
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
                <div class="triangle animated fadeIn"></div>
            </div>
            <div class="header-text p-4">
                <h1><span>|</span> لوگوی خودتون رو <span>شگفت زده</span> کنید</h1> <br/>
                <p><b>دایا</b> برای ایجاد برتری برند شما اینجاست... <br/>
                برای نشان دادن تفاوت خود نسبت به رقبا نیازمند لوگویی خاص ، با کیفیت و از همه مهم تر مربوط به کار خود هستین ، خلاصه بخوام بگم اگه برندتون رو دوست دارید یه لوگوی خوب بهش مدیونین پس... |
                </p>
                <div class="header-btn-container">
                    <button class="btn btn-primary btn-lg badge-pill ml-4">ادامه متن</button>
                    <button class="btn btn-info btn-lg badge-pill">شروع سفارش</button>
                </div>
            </div>
        </div>
    </header>
</body>
</html>