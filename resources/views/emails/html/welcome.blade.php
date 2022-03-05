@component('emails.layout')
    @slot('header')
        <p class="rtl header-name text-white" style="padding: 10px 0 10px 0;">سلام {{ $username }}،</p>
        <h1 class="rtl header-title text-white">ثبت نام شما با موفقیت در دایا آرتز انجام شد.</h1>
    @endslot
    @slot('title')
        <p class="rtl content-title text-purple">به پلتفرم دایا آرتز خوش آمدید</p>
    @endslot
    @slot('bottom')
        <p class="text-purple bold">دایا آرتز |‌ گامی تا مدرنیته</p>
        <p class="text-purple bold">سرویس امور مشتریان دایا آرتز</p>
    @endslot
    <p class="rtl text-purple text-medium" style="text-align: justify !important;">
        از ثبت نام شما در استارتاپ طراحی گرافیک دایا آرتز بسیار سپاس گزاریم ؛ شما می توانید پس از انتخاب نوع خدمات مورد نیازتان ، فوری و سریع از روش های متفاوت سفارش خود را ثبت کنید و آماده شروع پروژه طراحی گرافیک خود پس از تکمیل فرم های سفارش باشید
        از این پس به راحتی می توانید طراحی لوگو، کارت ویزیت، یا هر گونه خدمات طراحی گرافیک مورد نیازتان را سفارش دهید و منتظر یک طراحی حرفه ایی از طرف ما باشید . 
    </p>
    <p style="padding: 20px 0 20px 0;">
        <img src="{{ asset('images/email/welcome-image.gif') }}" width="410" style="display: block; height: auto;" alt="">
    </p>
    <p class="rtl text-purple text-medium" style="text-align: justify !important; padding: 20px 0 0 0;">
        پیشنهاد می کنم به صفحه <a href="{{ route('services.index') }}">انواع خدمات</a> دایا آرتز سری بزنید و سرویس مورد نیازتان را به راحتی سفارش دهید یا حتی می توانید از پکیج های فوق العاده هدفمند سازی شده کسب و کار خودتان استفاده کنید و همه نیاز های طراحی گرافیک را یک جا از طریق سیستم سفارش تخصصی دایا آرتز تامین کنید .
        <br />
        فراموش نکنید که آنچه برای نظارت بر پروژه خود نیاز دارید در پنل کاربری شما قرار گرفته ؛ برای تکمیل سازی و ورود روی دکمه زیر کلیک کنید.
    </p>
    @component('vendor.mail.html.button', ['url' => route('userarea'), 'color' => 'purple']) ورود به حساب کاربری @endcomponent
    <p class="rtl text-purple text-medium" style="text-align: justify !important; padding: 20px 0 0 0;">@include('emails.html.inc.contact')</p>
@endcomponent