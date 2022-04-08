<nav id="header-nav" class="animated">
    <span class="d-md-none mr-2 float-right" id="menu-open">
        <i class="fas fa-bars"></i>
    </span>
    <div class="logo-container">
        <img src="{{ asset(get_setting('header.menu.logo')) }}">
    </div>
    <div id="m-menu" class="menu-container d-none d-md-inline-block">
        <div class="menu-header p-3 d-md-none">
            <i id="menu-close" class="fas fa-times"></i>
            <a href="{{ route("userarea") }}" class="login-btn"><i class="far fa-user-circle"></i>ورود به حساب </a>
        </div>
        <span class="top-logo d-md-none"><img src="{{ asset('images/daya-logo-circular.png') }}"> DAYAARTZ</span>
        <ul class="main-menu menu-items-container p-md-0 m-md-0">
            @foreach (get_menu_items('main') as $item)
                <li class="{{ $item['route'] && request()->routeIs($item['route']) ? 'active' : '' }}">
                    <a href="{{ custom_route($item['route']) }}">
                        @if ($item['details']->icon_class)
                            <i class="{{ $item['details']->icon_class }}"></i>
                        @endif
                        {{ $item['title'] }}
                    </a>
                </li>
            @endforeach
            {{-- 
            <li class="has-sub {{ request()->routeIs('services.index') ? 'active' : '' }}">
                <a href="{{ route('services.index') }}"><i class="d-md-none fas fa-paint-brush"></i>خدمات طراحی گرافیک</a>
                <ul class="submenu-m submenu">
                    <li class="animated"><a href="#">طراحی چاپی</a></li>
                    <li class="animated"><a href="#">طراحی دیجیتال</a></li>
                    <li class="animated"><a href="#">طراحی فضای مجازی</a></li>
                </ul>
            </li> --}}
        </ul>
    </div>
    <div class="last-item">
        <a href="{{ route('userarea') }}" class="login-btn">ورود/عضویت <i class="far fa-sign-in vertical-middle"></i></a>
        <a href="{{ get_setting('header.menu.button.href') }}" class="btn-white">{{ get_setting('header.menu.button.text') }}</a>
        <a href="tel:{{ get_setting('header.menu.phone_number') }}" class="btn-phone"><i class="fas fa-phone"></i></a>
    </div>
</nav>