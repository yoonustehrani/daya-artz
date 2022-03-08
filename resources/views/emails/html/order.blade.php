@component('emails.layout')
    @slot('header')
    <p class="rtl header-name text-white" style="padding: 10px 0 10px 0;">سلام یوسف مستغنی عزیز،</p>
        <h1 class="rtl header-title text-white">سفارش شما در حالت انتظار است.</h1>
    @endslot
    @slot('title')
        <p class="rtl content-title text-purple">سفارش شما ثبت شده و در حال انتظار برای تسویه پیش پرداخت است.</p>
    @endslot
    <p class="rtl text-purple text-medium" style="text-align: justify !important;">شما می توانید مبلغ پیش پرداخت سفارش خود را از طریق لینک زیر پرداخت کنید و روند پروژه طراحی گرافیک خود را رسما آغاز نمایید .</p>
    @component('vendor.mail.html.button', ['url' => route('userarea'), 'color' => 'purple']) تسویه پیش پرداخت @endcomponent
    <p class="text-purple text-medium" style="text-align: center;direction: rtl;margin: 10px 0 10px 0;">
        (<span style="font-weight: bold;">در صورت عدم تسویه پیش پرداخت پس از یک هفته، سفارش شما غیر فعال خواهد شد</span>)
    </p>
    <p class="rtl text-purple text-medium">
        از ثبت سفارش شما در استارت آپ طراحی گرافیک دایا آرتز بسیار سپاس گزاریم ؛ سفارش طراحی گرافیک شما با کد پیگیری {{ $order->code }} مورخ {{ jdate($order->created_at)->format('Y/n/j') }} در سیستم ما ثبت شد و اطلاعات فرم های سفارش شما تمام و کمال به دست ما رسید . برای شروع روند طراحی پروژه گرافیکی شما ، تنها مرحله واریز و تسویه پیش پرداخت باقی مانده است .
    </p>
    <br />
    <p class="rtl text-purple text-medium">
        سفارش شما به مدت یک هفته فعال و در حالت انتظار باقی خواهد ماند تا شما پیش پرداخت خود را تسویه کنید.
    </p>
    <p class="rtl text-purple text-medium">
        ضمنا شما می توانید از طریق حساب کاربری شخصی خود در سایت دایا آرتز برای تسویه پیش پرداخت اقدام کنید . حساب کاربری شما دارای قابلیت های منحصر به فردی است که به شما امکان نظارت برروند پیشرفت پروژه ها را می دهد . برای ورود به حساب کاربری خود روی دکمه زیر کنید.
    </p>
    @component('vendor.mail.html.button', ['url' => route('userarea'), 'color' => 'purple']) ورود به حساب کاربری @endcomponent
    @include('emails.html.inc.contact')
@endcomponent