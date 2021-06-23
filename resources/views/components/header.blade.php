<nav>
    <div class="logo-container">
        <img src="{{ asset('images/daya-white-logo.png') }}">
    </div>
    <ul class="main-menu p-0 m-0">
        <li>
            <a href="{{ route('home') }}">خانه</a>
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
        <li><a href="{{ route('about') }}">درباره ما</a></li>
        <li><a href="{{ route('contact') }}">تماس با ما</a></li>
    </ul>
    <div class="last-item">
        <a href="#" class="btn-white">+‌ سفارش</a>
        <button class="btn-phone mr-3"><i class="fas fa-phone"></i></button>
    </div>
</nav>