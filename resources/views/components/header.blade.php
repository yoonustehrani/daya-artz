<nav id="header-nav" class="animated">
    <span class="d-md-none ml-2 mr-2 float-right" id="menu-open">
        <i class="fas fa-bars"></i>
    </span>
    <div class="logo-container">
        @if (setting_exists('header.menu.logo'))
            <img src="{{ asset(get_setting('header.menu.logo')) }}">
        @endif
    </div>
    <div id="m-menu" class="menu-container d-none d-md-inline-block">
        <div class="menu-header p-3 d-md-none">
            <i id="menu-close" class="fas fa-times"></i>
            <span class="login-btn"><i class="far fa-user-circle"></i>ورود به حساب </span>
        </div>
        <span class="top-logo d-md-none"><img src="{{ asset('images/daya-logo-circular.png') }}"> DAYAARTZ</span>
        <ul class="main-menu menu-items-container p-md-0 m-md-0">
            <li>
                <a href="{{ route('home') }}"><i class="d-md-none fa fa-home"></i> خانه</a>
            </li>
            <li class="has-sub">
                <a href="{{ route('services.index') }}"><i class="d-md-none fas fa-paint-brush"></i>خدمات طراحی گرافیک</a>
                <ul class="submenu-m submenu">
                    <li class="animated"><a href="#">طراحی چاپی</a></li>
                    <li class="animated"><a href="#">طراحی دیجیتال</a></li>
                    <li class="animated"><a href="#">طراحی فضای مجازی</a></li>
                </ul>
            </li>
            {{-- <li>
                <a href="{{ route('userarea') }}"><i class="d-md-none far fa-user"></i> حساب کاربری</a>
            </li> --}}
            {{-- <li class="has-sub">
                <a href="#"><i class="d-md-none fas fa-layer-group"></i> زیرمجموعه دار</a>
                <ul class="submenu-m submenu">
                    <li class="animated"><a href="#">زیرمجموعه 1</a></li>
                    <li class="animated"><a href="#1">زیرمجموعه طولانی</a></li>
                    <li class="animated"><a href="#2">زیرمجموعه یخورده طولانی تر</a></li>
                    <li class="animated"><a href="#3">زیرمجموعه خیلــــــــی طولانی</a></li>
                </ul>
            </li> --}}
            <li><a href="{{ route('blog.index') }}"><i class="d-md-none fas fa-blog"></i> مقالات</a></li>
            <li><a href="{{ route('about') }}"><i class="d-md-none fas fa-building"></i> درباره ما</a></li>
            <li><a href="{{ route('contact') }}"><i class="d-md-none fas fa-headset"></i> تماس با ما</a></li>
            <li><a href="{{ route('policy') }}"><i class="d-md-none fas fa-rule"></i> سوالات متداول</a></li>
        </ul>
    </div>
    <div class="last-item">
        <a href="{{ get_setting('header.menu.button.href') }}" class="btn-white">{{ get_setting('header.menu.button.text') }}</a>
        <button class="btn-phone mr-3"><i class="fas fa-phone"></i></button>
        {{-- <a href="tel:+989015045025"><i class="fas fa-phone"></i></a> --}}
    </div>
</nav>