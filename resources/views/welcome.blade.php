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
</body>
</html>