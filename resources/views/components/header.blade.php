<nav>
    <span class="d-md-none ml-2 mr-2 float-right" id="menu-toggle">
        <i class="fas fa-bars"></i>
        <i class="fas fa-times op-0"></i>
    </span>
    <div class="menu d-md-none">
        <ul class="menu-items-container">
            <li><img src="{{ asset('images/daya-logo-circular.png') }}"> DAYAARTZ</li>
            <li>
                <a href="">صفحه اصلی</a>
            </li>
            <li class="has-sub">
                <a href="#">سفارش</a>
                <ul class="submenu-m">
                    <li class="animated flipInX"><a href="">سفارش تخصصی</a></li>
                    <li class="animated flipInX"><a href="">سفارش فوری</a></li>
                </ul>
            </li>
            <li>
                <a href="">وبلاگ</a>
            </li>
            <li>
                <a href="">درباره ما</a>
            </li>
            <li>
                <a href="">تماس با ما</a>
            </li>
        </ul>
    </div>
    <div class="logo-container">
        <img src="{{ asset('images/daya-white-logo.png') }}">
    </div>
    <ul class="main-menu p-0 m-0 d-none d-md-block">
        <li>
            <a href="{{ route('home') }}">خانه</a>
        </li>
        <li>
            <a href="{{ route('services.index') }}">طراحی گرافیک</a>
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
        <li><a href="{{ route('blog.index') }}">مقالات</a></li>
        <li><a href="{{ route('about') }}">درباره ما</a></li>
        <li><a href="{{ route('contact') }}">تماس با ما</a></li>
    </ul>
    <div class="last-item">
        <a href="#" class="btn-white">+‌ سفارش</a>
        <button class="btn-phone mr-3"><i class="fas fa-phone"></i></button>
    </div>
</nav>