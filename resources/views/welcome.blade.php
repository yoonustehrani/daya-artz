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
                    <button class="btn btn-primary btn-lg badge-pill ml-4">ادامه متن</button>
                    <button class="btn btn-info btn-lg badge-pill">شروع سفارش</button>
                </div>
            </div>
        </div>
    </header>
    <div class="section col-12 p-4">
        <div class="col-12 title-section">
            <div class="title-container">
                <p class="title-text">خدمات دایا آرتز</p>
                <span class="title-underline"></span>
            </div>
            {{-- <div class="subtitle-container">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique qui quos sint nam temporibus molestiae ab, esse iure quaerat laborum. Corporis, consequuntur qui. Veritatis aliquid iure, exercitationem assumenda rem voluptatem!</p>
            </div> --}}
        </div>
    </div>
    <div class="section about-section col-12 p-0 mb-4">
        <div class="float-left col-12 p-4 py-5">
            <div class="col-lg-3">
                <img src="{{ asset('images/daya-cyan-logo.png') }}" alt="">
            </div>
            <div class="col-lg-9 text-right">
                <p class="title cyan">درباره دایا</p>
                <p>گروه طراحی دایـا متشکل از تیمی باتجـربه و حرفه ای در زمینه های 
                    طراحـی گرافیـکی و تبلیـغاتی  در تلاش است بـستر مناسبی را برای 
                    کسانی که نیازمند طراحی یا طرحی با کیفیت و در سطـح بین المللی
                    و همچنین  کسب درامدزایی برای طراحان حرفه ای درجه یک کشور
                    ایران ایجاد سازد ، و همچنین نقظه آغازین شیوه نوین ثبت سفارش
                    و تحویل برای اولین بار در ایران باشد.</p>
            </div>
        </div>
    </div>
</body>
</html>