@component('emails.layout')
    @slot('header')
        {{-- <p class="rtl header-name text-white" style="padding: 10px 0 10px 0;">سلام {{ $username }}،</p> --}}
        <h1 class="rtl header-title text-white">سفارش شما آماده است و منتظر تسویه نهایی می باشد.</h1>
    @endslot
    @slot('title')
        <p class="rtl content-title text-purple">تنها یک گام تا دریافت فایل های نهایی فاصله دارید.</p>
    @endslot
    <p class="rtl text-purple text-medium" style="margin: 0 0 20px 0;">
        احتراما سفارش طراحی گرافیک شما ثبت شد و در مراحل پایانی خود قرار دارد ؛ تنها مرحله تسویه نهایی پرداخت باقی مانده . یادآور می شویم که سفارش طراحی گرافیک شما با کد پیگیری  ... مورخ ../../.... در سیستم ما ثبت شد فایل‌های نهایی سفارش شما کاملا آماده هستند برای به پایان رسیدن این پروژه و دریافت فایل‌های پروژه ، تنها مرحله واریز و تسویه نهایی فاکتور باقی مانده است . شما می توانید مبلغ تسویه آن را از طریق دکمه زیر پرداخت کنید و سفارش طراحی گرافیک خود را رسما دریافت نمایید .
    </p>
    @component('vendor.mail.html.button', ['url' => route('userarea', ['path' => 'orders/orderId/items/itemId']), 'color' => 'purple']) پرداخت نهایی و دریافت فایل @endcomponent
    @include('emails.html.inc.contact')
@endcomponent
