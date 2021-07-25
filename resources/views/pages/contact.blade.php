@extends('layouts.page')

@section('head')
    <title>Contact us | Daya Artz</title>
@endsection


@section('content')
<!-- contact us form and vector -->
<div class="section contact-us-first-section w-100 text-center mb-4">
    <div class="contact-us-background w-100">
        <div class="background-left">
            <img src="{{ asset('images/contact-us-background-2.png') }}" alt="">
        </div>
        <div class="background-right">
            <img src="{{ asset('images/contact-us-background-1.png') }}" alt="">
        </div>
        <div class="contact-us-vector-1">
            <img src="{{ asset('images/contact-us-vector-1.png') }}" alt="">
        </div>
    </div>
    <div class="contact-us-form">
        <h4 class="mb-3 mb-md-2 mb-lg-4">ما منتظر شنیدن صدای شما هستیم</h4>
        <form action="#">
            <div class="input-group mb-2 mb-lg-4"><input class="form-control" type="text" name="name" placeholder="نام و نام خانوادگی"></div>
            <div class="form-group"><textarea class="form-control" name="message" cols="30" rows="10" placeholder="متن پیام شما"></textarea></div>
            <button class="float-left btn btn-dark">ارسال پیام</button>
        </form>
    </div>
</div>
<!-- end contact us form and vector -->
<!-- contact ways and vector -->
<div class="section w-100 text-center contact-us-section-2">
    <div class="title-section w-100 mb-5">
        <div class="title-container">
            <h3 class="title-text">راه های ارتباطی</h3>
        </div>
    </div>
    <div class="contact-ways-container w-100 mb-5">
        <div class="text-center mb-4 col-10 col-md-3">
            <span><i class="contact-way-icon fas fa-phone mb-4 mt-4 mb-md-5 mt-md-5"></i></span>
            <div>
                <div class="address-label mb-4 p-2"><span class="float-left vertical-center"><i class="label-icon fas fa-mobile"></i></span><h3 class="text-center vertical-center">+98 1234567891</h3></div>
                <div class="address-label mb-4 p-2"><span class="float-left vertical-center"><i class="label-icon fas fa-tty"></i></span><h3 class="text-center vertical-center">+0513 1234567</h3></div>
            </div>
        </div>
        <div class="text-center mb-4 col-10 col-md-3">
            <span><i class="contact-way-icon fab fa-battle-net mb-4 mt-4 mb-md-5 mt-md-5"></i></span>
            <div>
                <div class="address-label mb-4 p-2"><span class="float-left vertical-center"><i class="label-icon fab fa-instagram"></i></span><h3 class="text-center vertical-center">@Dayaartz</h3></div>
                <div class="address-label mb-4 p-2"><span class="float-left vertical-center"><i class="label-icon fab fa-telegram-plane"></i></span><h3 class="text-center vertical-center">@Dayaartz</h3></div>
                <div class="address-label mb-4 p-2"><span class="float-left vertical-center"><i class="label-icon fab fa-whatsapp"></i></span><h3 class="text-center vertical-center">+98 1234567891</h3></div>
            </div>
        </div>
        <div class="text-center mb-4 col-10 col-md-3 mb-4">
            <span><i class="contact-way-icon fas fa-robot mb-4 mt-4 mb-md-5 mt-md-5"></i></span>
            <div>
                <div class="address-label mb-4 p-2"><span class="float-left vertical-center"><i class="label-icon fas fa-robot"></i></span><h3 class="text-center vertical-center">@Dayaartzbot</h3></div>
            </div>
        </div>
    </div>
    <div class="contact-us-vector-2 text-center col-12 col-md-4 offset-md-4 mb-5"><img src="{{ asset('images/contact-us-vector-2.svg') }}" alt="" srcset=""></div>
</div>
<!-- end contact ways and vector -->
@endsection