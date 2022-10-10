<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/err.css') }}">
    <title>خطا 404</title>
</head>
<body>
    <h1 class="err__title">متاسفیم!</h1>
    <h2 class="err__subtitle">صفحه مورد نظر شما یافت نشد :(</h2>
    <div class="err__btn-container">
        @if (url()->previous())
            <a class="err__btn" href="{{ url()->previous() }}">صفحه قبل</a>
        @endif
        <a class="err__btn" href="{{ route("home") }}">صفحه اصلی</a>
    </div>
    <img class="err__vector" src="{{ asset("images/404-vector.png") }}" alt="404 vector">
    <div class="err__footer">
        <a href="{{ route("home") }}" class="err__footer-item">صفحه اصلی</a>
        <a href="{{ route("about") }}" class="err__footer-item">درباره دایا</a>
        <a href="{{ route("services.index") }}" class="err__footer-item">خدمات</a>
        <a href="{{ route("blog.index") }}" class="err__footer-item">دایا بلاگ</a>
        <a href="{{ route("contact") }}" class="err__footer-item">تماس با ما</a>
    </div>
</body>
</html>