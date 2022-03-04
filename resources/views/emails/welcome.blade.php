@component('emails.layout')
    @slot('header')
        <p class="rtl header-name text-white" style="padding: 10px 0 10px 0;">سلام حاجی سیف</p>
        <h1 class="rtl header-title text-white">ثبت نام شما با موفقیت در دایا آرتز انجام شد.</h1>
    @endslot
    @slot('title')
        <p class="rtl content-title text-purple">به پلتفرم دایا آرتز خوش آمدید</p>
    @endslot
    <p class="rtl text-purple text-medium" style="text-align: justify !important;">
        از ثبت نام شما در استارتاپ طراحی گرافیک دایــا آرتــز بسیار سپاس گزاریم ؛
        شما مــی توانید پس از انتخاب نوع خدمات مورد نیازتان ، فــوری و سریع از 
        روش های متفاوت ســفارش خود را ثبت کنید و آمـــاده شروع پروژه طراحی 
        گرافــــیک خود پس از تکمیل فرم های سفارش باشید . از این پس به راحتی
        می توانید طراحی لـــوگو، کارت ویزیت، یا هر گونه خدمات طراحی گرافــیک
        مورد نیازتان را سفارش دهید و منتظر یک طراحی حرفه ایی از طرف ما باشید .
    </p>
    <p style="padding: 20px 0 20px 0;">
        <img src="{{ asset('images/email/welcome-image.gif') }}" width="410" style="display: block; height: auto;" alt="">
    </p>
    <p class="rtl text-purple text-medium" style="text-align: justify !important; padding: 20px 0 0 0;">
        پیشنهاد می کنم به صفحه <a class="link" href="{{ route('services.index') }}">انواع خدمات</a> دایا آرتز سری بزنید و سرویس مورد
        نیازتان را به راحتی سفارش دهید یا حتی می توانید از پکیج های فوق العاده
        هــــدفمند سازی شده کسب و کار خودتان استفاده کنید و هـــمه نیاز های
        طراحی گرافیک را یک جا از طریق سیستم سفارش تخصصی دایــا آرتز تامین
        کنید . فراموش نکنید که تمام چیز هایی که برای نظارت پروژه خـود نیاز دارید
        در پنل کــــاربری شما قرار گرفته ؛ برای تکمیل اطلاعات ثبت نام و ورود به آن <a class="link" href="{{ route('userarea') }}">کلیک کنید</a>.
        <br />
        در صورت نیاز به هر گــــونه پشتیبانی و راهنمایی از راه های ارتباطی موجود
        با ما تماس بگیرید .
    </p>
@endcomponent