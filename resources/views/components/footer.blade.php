<div class="footer-content w-100">
    <div class="float-left col-12 text-center mb-5 mt-4 logo-container">
        <img src="{{ asset('images/daya-logo-circular.png') }}" alt="لوگوی دایا">
        <p class="ml-2 text-light">DAYAARTZ</p>
    </div>
    <div class="col-12 float-left px-3 footer-info-container">
        <div class="col-lg-3 col-md-6 col-12">
            <p class="title">درباره ما</p>
            <div><p>گروه طراحی دایا آرتز متشکل از تیمی با تجربه و حرفه ای در زمینه های طراحی گرافیـکی و تبلیغاتی در تلاش است بستر مناسبی را برای کسانی که نیازمند طراحی یا طراحی با کیفیت و در سطح بین المللی و همچنین درآمدزایی برای طراحان حرفه ای و درجه یک کشور ایران ایجاد سازد.</p></div>
        </div>
        <div class="col-lg-2 col-md-6 col-12">
            <p class="title">لینک های سریع</p>
            <div>
                <ul class="text-right p-0">
                    <li><a href="{{ route('userarea', ['path' => 'dashboard']) }}">حساب من</a></li>
                    <li><a href="#">سفارش فوری</a></li>
                    <li><a href="#">سفارش تخصصی</a></li>
                    {{-- <li><a href="#">راهنمای سفارشات</a></li> --}}
                    <li><a href="{{ route('policy') }}">شرایط و ضوابط</a></li>
                    <li><a href="{{ route('blog.index') }}">وبلاگ</a></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-2 col-md-6 col-12">
            <p class="title">پشتیبانی</p>
            <div>
                <ul class="text-right p-0 mb-4">
                    <li><a href="{{ route('contact') }}">تماس با ما</a></li>
                    <li><a href="{{ route('userarea', ['path' => 'tickets']) }}">ارسال تیکت</a></li>
                </ul>
                <img src="{{ asset('images/gallery/zarin-paal.jpg') }}" alt="لوگوی زرین پال" class="float-right ml-2">
                <a id="enamad-logo" referrerpolicy="origin" target="_blank" href="https://trustseal.enamad.ir/?id=269100&amp;Code=RUmxsLwfWAGM1kGgdjv4"></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-12">
            <p class="title">دایا مجازی</p>
            <div class="mb-4 social-media-rows">
                <div class="social-media-container">
                    <a href="https://instagram.com/dayaartz"><i class="fab fa-instagram"></i></a>
                    <a href="https://t.me/dayaartz"><i class="fab fa-telegram-plane ml-4"></i></a>
                </div>
                <div class="social-media-container">
                    <a href="https://linkedin.com/"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://wa.me/989015045025"><i class="fab fa-whatsapp ml-4"></i></a>
                </div>
            </div>
            <p class="ltr m-text-center">
                <i class="far fa-copyright"></i>
                Sampi Group. All rights reserved
            </p>
        </div>
    </div>
</div>