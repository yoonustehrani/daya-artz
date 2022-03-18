@component('emails.layout')
    @slot('header')
        {{-- <p class="rtl header-name text-white" style="padding: 10px 0 10px 0;">سلام {{ $username }}،</p> --}}
        <h1 class="rtl header-title text-white"> اتود های اولیه سفارش شما آماده است.</h1>
    @endslot
    @slot('title')
        <p class="rtl content-title text-purple">نیمی از روند طراحی طی شد و به زودی به شما ارائه خواهد شد.</p>
    @endslot
    <p class="rtl text-purple text-medium" style="margin: 0 0 20px 0;">
        مجدداً از ثبت سفارش شما در استارت آپ طراحی گرافیک دایا آرتز بسیار سپاس گزاریم ؛ سفارش طراحی -عنوان خدمت- با عنوان - عنوان سفارش – در تاریخ ../../…. در سیستم ما ثبت شد و طراحی اتود های اولیه آن به پایان رسید به زودی برای ارائه آنها با شما تماس حاصل می کنیم .
    </p>
    @component('vendor.mail.html.button', ['url' => route('userarea', ['path' => 'orders/orderId/items/itemId']), 'color' => 'purple']) مشاهده وضعیت سفارش @endcomponent
    @include('emails.html.inc.contact')
@endcomponent
