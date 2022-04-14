@component('emails.layout')
    @slot('header')
        <p class="rtl header-name text-white" style="padding: 10px 0 10px 0;">سلام {{ $username }}،</p>
        @if ($user->level === 'new')
        <h1 class="rtl header-title text-white">یک قدم دیگر تا تکمیل ثبت نام شما در دایا آرتز باقی مانده است.</h1>
        @else
        <h1 class="rtl header-title text-white">تایید آدرس جدید ایمیل شما در دایا آرتز</h1>
        @endif
    @endslot
    @slot('title')
        <p class="rtl content-title text-purple">تایید آدرس ایمیل</p>
    @endslot
    @slot('bottom')
        <p class="text-purple bold">دایا آرتز |‌ گامی تا مدرنیته</p>
        <p class="text-purple bold">پشتیبانی وبسایت دایا آرتز</p>
    @endslot
    <p class="rtl text-purple text-medium">برای تایید آدرس ایمیل خود روی دکمه زیر کلیک کنید</p>
    @component('vendor.mail.html.button', ['url' => $verification_url, 'color' => 'purple'])
        {{ "تایید آدرس ایمیل" }}
    @endcomponent
    <p class="rtl text-purple text-medium">{{ "اگر شما در وب سایت دایا آرتز ثبت نام نکرده اید. میتوانید این ایمیل را نادیده بگیرید" }}</p>
    <p class="rtl text-purple text-medium" style="margin: 20px 0 0 0;">
        @lang(
        "اگر برای کلیک کردن روی دکمه \":actionText\" ایرادی پیش آمده است. لینک زیر را در مرورگر خود کپی و پیست کنید.",
        ['actionText' => "تایید آدرس ایمیل"])
    </p>
    <p class="text-medium" style="word-break: break-all;">
        {{ $verification_url }}
    </p>
    @include('emails.html.inc.contact')
@endcomponent