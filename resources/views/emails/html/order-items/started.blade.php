@component('emails.layout')
    @slot('header')
        {{-- <p class="rtl header-name text-white" style="padding: 10px 0 10px 0;">سلام {{ $username }}،</p> --}}
        <h1 class="rtl header-title text-white">پروژه طراحی گرافیک شما شروع شد.</h1>
    @endslot
    @slot('title')
        <p class="rtl content-title text-purple">پروژه طراحی - عنوان خدمت - به تیم طراحی دایا آرتز منتقل شد.</p>
    @endslot
    <p class="rtl text-purple text-medium" style="margin: 0 0 20px 0;">
        مجدداً از ثبت سفارش شما در استارت آپ طراحی گرافیک دایا آرتز بسیار سپاس گزاریم ؛ سفارش طراحی -عنوان خدمت- با عنوان - عنوان سفارش – در تاریخ ../../…. در سیستم ما ثبت شد.
        سفارش شما در حال انجام و طراحی می باشد . پس از طراحی اتود های اولیه ، با شما برای تایید اتود های طراحی شده تماس حاصل خواهد شد. 
    </p>
    @component('vendor.mail.html.button', ['url' => route('userarea'), 'color' => 'purple']) مشاهده جزئیات سفارش @endcomponent
    <br />
    <br />
    <p class="rtl text-purple text-medium">
        حساب کاربری شما دارای قابلیت های منحصر به فردی است که به شما امکان نظارت بر پروژه ها و سفارشات فعال و غیر فعال شما را می دهد . برای ورود به حساب کاربری خود کلیک کنید 
    </p>
    @component('vendor.mail.html.button', ['url' => route('userarea'), 'color' => 'purple']) مشاهده حساب کاربری @endcomponent
    @include('emails.html.inc.contact')
@endcomponent
