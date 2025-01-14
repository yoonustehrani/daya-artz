@extends('layouts.page')

@push('head')
    <title>{{ $page->title }}</title>
    @component('components.seo', ['instance' => $page, 'slug' => 'pages', 'og' => ['title' => $page->title]]) @endcomponent
@endpush


@section('content')
<!-- contact us form and vector -->
<div class="section contact-us-first-section w-100 text-center mb-4">
    <div class="contact-us-background w-100">
        <div class="background-left">
            <img data-src="{{ asset('images/contact-us-background-2.png') }}" class="lazyload" alt="پس زمینه وکتور ارتباط با دایا">
        </div>
        <div class="background-right">
            <img data-src="{{ asset('images/contact-us-background-1.png') }}" class="lazyload" alt="پس زمینه ارتباط با دایا">
        </div>
        <div class="contact-us-vector-1">
            <img data-src="{{ asset('images/contact-us-vector-1.png') }}" class="lazyload" alt="ارتباط با دایا">
        </div>
    </div>
    <div class="contact-us-form">
        <h4>ما منتظر دریافت پیام شما هستیم</h4>
        <form action="{{ route('api.forms.contact') }}" class="form-group" method="POST">
            @csrf
            <div class="input-group col-12 mt-3">
                <input class="form-control mb-2" type="text" name="fullname" placeholder="نام و نام خانوادگی">
                @error('fullname')
                <ul class="w-full">
                @foreach ($errors->get('fullname') as $err)
                    <li class="text-danger">{{ $err }}</li>
                @endforeach
                </ul>
            @enderror
            </div>
            <div class="input-group col-12 col-md-6 mt-3 float-right">
                <input class="form-control mb-2" type="text" name="phone_number" placeholder="شماره تلفن">
                @error('phone_number')
                    <ul class="w-100 m-0 text-right">
                    @foreach ($errors->get('phone_number') as $err)
                        <li class="text-danger">{{ $err }}</li>
                    @endforeach
                    </ul>
                @enderror
            </div>
            <div class="input-group col-12 col-md-6 mt-3 float-left">
                <input class="form-control mb-2" type="email" name="email" placeholder="ایمیل">
                @error('email')
                    <ul class="w-100 m-0 text-right">
                    @foreach ($errors->get('email') as $err)
                        <li class="text-danger">{{ $err }}</li>
                    @endforeach
                    </ul>
                @enderror
            </div>
            <div class="input-group p-3 mt-2">
                <textarea class="form-control mb-2" name="message" cols="30" rows="10" placeholder="متن پیام شما"></textarea>
                @error('message')
                    <ul class="w-100 m-0 text-right">
                    @foreach ($errors->get('message') as $err)
                        <li class="text-danger">{{ $err }}</li>
                    @endforeach
                    </ul>
                @enderror
            </div>
            <button class="ml-3 float-left btn btn-dark">ارسال پیام</button>
        </form>
    </div>
</div>
<!-- end contact us form and vector -->
<!-- contact us text -->
<div class="col-12 col-md-10 offset-md-1 mt-3 mt-md-5 contact-us-text">
    <p class="contact-us-tagline"><span>دایا آرتز</span> پشتیبان خوش ذوق ها</p>
    <p class="contact-p p-2">
        تیم طراحی گرافیک دایا آرتز در مقام یک پلتفرم هنری متعهد شده است که پشتیبان کارفرمایان و متقاضیان سرویس های طراحی گرافیک به بهترین شکل ممکن باشد . مشاورین و مدیران ارشد تکریم مشتریان آماده به خدمت و دریافت پیشنهادات و انتقادات شما و برطرف سازی مشکلات و نیاز های تمامی شما عزیزان هستند.
        <br>
        مسئولین پاسخ و رسیدگی به امور مشتریان گرامی در دو نوبت صبح از ساعت ۸ تا ۱۲ و نوبت عصر از ساعت ۱۶ تا ۲۰ برخط و انلاین می باشند.
    </p>
</div>
<!-- end cintact us text -->
<!-- contact ways and vector -->
<div class="section w-100 text-center contact-us-section-2 mt-5">
    <div class="title-section w-100 mb-3 mb-md-5">
        <div class="title-container">
            <h1 class="title-text">راه های ارتباطی دایا آرتز</h1>
        </div>
    </div>
    <div class="contact-ways-container w-100 mb-5">
        <div class="text-center mb-4 col-10 col-md-3">
            <span><i class="contact-way-icon far fa-phone mb-4 mt-4 mb-md-5 mt-md-5"></i></span>
            <div>
                <a href="tel:+982128423542">
                    <div class="address-label mb-4 p-2"><span class="float-left vertical-center"><i class="label-icon far fa-phone-office"></i></span><p class="text-center vertical-center">021 2842 3542</p></div>
                </a>
                <a href="tel:+989015045025">
                    <div class="address-label mb-4 p-2"><span class="float-left vertical-center"><i class="label-icon far fa-mobile"></i></span><p class="text-center vertical-center">(+98) 901 504 50 25</p></div>
                </a>
            </div>
        </div>
        <div class="text-center mb-4 col-10 col-md-3">
            <span><i class="contact-way-icon fad fa-wifi mb-4 mt-4 mb-md-5 mt-md-5"></i></span>
            <div>
                <a href="https://instagram.com/dayaartz">
                    <div class="address-label mb-4 p-2"><span class="float-left vertical-center"><i class="label-icon fab fa-instagram"></i></span><p class="text-center vertical-center">DayaArtz</p></div>
                </a>
                <a href="https://t.me/dayacontact">
                    <div class="address-label mb-4 p-2"><span class="float-left vertical-center"><i class="label-icon fab fa-telegram-plane"></i></span><p class="text-center vertical-center">@@dayacontact</p></div>
                </a>
                <a href="https://wa.me/989016045025?text={{ urlencode('سلام من به پشتیبانی احتیاج دارم') }}">
                    <div class="address-label mb-4 p-2"><span class="float-left vertical-center"><i class="label-icon fab fa-whatsapp"></i></span><p class="text-center vertical-center">(+98) 901 604 5025</p></div>
                </a>
            </div>
        </div>
        <div class="text-center mb-4 col-10 col-md-3">
            <span><i class="contact-way-icon fal fa-robot mb-4 mt-4 mb-md-5 mt-md-5"></i></span>
            <a href="https://telegram.me/DayaArtzBot">
                <div class="address-label mb-4 p-2 soon"><span class="float-left vertical-center"><i class="label-icon far fa-robot"></i></span><p class="text-center vertical-center">بزودی</p></div>
            </a>
        </div>
    </div>
    <div class="contact-us-vector-2 text-center col-12 col-md-4 offset-md-4 mb-5"><img data-src="{{ asset('images/contact-us-vector-2.svg') }}" class="lazyload" alt="راه های ارتباطی با دایا"></div>
</div>
<!-- end contact ways and vector -->
@endsection