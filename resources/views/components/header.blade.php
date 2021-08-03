<nav>
    <span class="d-md-none ml-2 mr-2 float-right" id="menu-open">
        <i class="fas fa-bars"></i>
    </span>
    <div class="logo-container">
        <img src="{{ asset('images/daya-white-logo.png') }}">
    </div>
    <div id="m-menu" class="menu-container">
        <div class="menu-header p-3 d-md-none">
            <i id="menu-close" class="fas fa-times"></i>
            <span class="login-btn"><i class="far fa-user-circle"></i>ورود به حساب </span>
        </div>
        <ul class="main-menu menu-items-container p-md-0 m-md-0">
            <li class="d-md-none"><img src="{{ asset('images/daya-logo-circular.png') }}"> DAYAARTZ</li>
            <li>
                <a href="{{ route('home') }}"><i class="d-md-none fas fa-home"></i> خانه</a>
            </li>
            <li class="has-sub">
                <a href="{{ route('services.index') }}"><i class="d-md-none fas fa-paint-brush"></i> طراحی گرافیک</a>
                <ul class="submenu-m submenu">
                    <li class="animated"><a href="#">زیرمجموعه 1</a></li>
                    <li class="animated"><a href="#">زیرمجموعه 2</a></li>
                    <li class="animated"><a href="#">زیرمجموعه 3</a></li>
                    <li class="animated"><a href="#">زیرمجموعه 4</a></li>
                    <li class="animated"><a href="#">زیرمجموعه 5</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="#"><i class="d-md-none fas fa-layer-group"></i> زیرمجموعه دار</a>
                <ul class="submenu-m submenu">
                    <li class="animated"><a href="#">زیرمجموعه 1</a></li>
                    <li class="animated"><a href="#1">زیرمجموعه طولانی</a></li>
                    <li class="animated"><a href="#2">زیرمجموعه یخورده طولانی تر</a></li>
                    <li class="animated"><a href="#3">زیرمجموعه خیلــــــــی طولانی</a></li>
                </ul>
            </li>
            <li><a href="{{ route('blog.index') }}"><i class="d-md-none fas fa-blog"></i> مقالات</a></li>
            <li><a href="{{ route('about') }}"><i class="d-md-none fas fa-building"></i> درباره ما</a></li>
            <li><a href="{{ route('contact') }}"><i class="d-md-none fas fa-headset"></i> تماس با ما</a></li>
        </ul>
    </div>
    <div class="last-item">
        <a href="#" class="btn-white">+‌ سفارش</a>
        <button class="btn-phone mr-3"><i class="fas fa-phone"></i></button>
    </div>
</nav>