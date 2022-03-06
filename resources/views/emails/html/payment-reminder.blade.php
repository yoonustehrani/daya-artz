@component('emails.layout')
    @slot('header')
        <p class="rtl header-name text-white" style="padding: 10px 0 10px 0;">سلام یوسف مستغنی عزیز،</p>
        <h1 class="rtl header-title text-white">تنها یک گام تا آغاز روند طراحی باقی مانده است.</h1>
    @endslot
    @slot('title')
        <p class="rtl content-title text-purple">یادآور می شویم سفارش شما در حالت انتظار است.</p>
    @endslot
    <p class="rtl text-purple text-medium" style="text-align: justify !important;">
        احتراما سفارش طراحی گرافیک شما ثبت شد و آماده شروع است؛ تنها مرحله تسویه پیش پرداخت برای آغاز روند طراحی باقی‌مانده است.
    </p>
    @component('vendor.mail.html.button', ['url' => route('userarea'), 'color' => 'purple']) تسویه پیش پرداخت @endcomponent
    <p class="rtl text-purple text-medium">
        سفارش طراحی گرافیک شما با کد سریال {{ $order->code }} مورخ {{ jdate($order->created_at)->format('Y/n/j') }} در سیستم ما ثبت شد و اطلاعات فرم های سفارش شما تمام و کمال به دست ما رسید . برای شروع روند طراحی ، تنها مرحله واریز و تسویه پیش پرداخت باقی مانده است . شما می توانید مبلغ پیش پرداخت سفارش خود را از طریق دکمه بالا پرداخت کنید و سفارش طراحی گرافیک خود را رسما آغاز نمایید .
    </p>
    @include('emails.html.inc.contact')
@endcomponent