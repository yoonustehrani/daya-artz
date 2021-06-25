@extends('layouts.page')

@section('head')
    <title>Contact us | Daya Artz</title>
@endsection


@section('content')
<div class="section contact-us-first-section w-100 text-center">
    <div class="contact-us-background w-100">
        <div class="background-left">
            <img src="{{ asset('images/contact-us-background-2.png') }}" alt="">
        </div>
        <div class="background-right">
            <img src="{{ asset('images/contact-us-background-1.png') }}" alt="">
        </div>
    </div>
    <div class="contact-us-vector-1 col-12 col-md-7 p-md-0">
        <img src="{{ asset('images/contact-us-vector-1.png') }}" alt="">
    </div>
    <div class="contact-us-form col-12 col-md-5">
        <h4 class="mb-4">ما منتظر شنیدن صدای شما هستیم</h4>
        <form action="#">
            <div class="input-group mb-4"><input class="form-control" type="text" name="name" placeholder="نام و نام خانوادگی"></div>
            <div class="form-group"><textarea class="form-control" name="message" cols="30" rows="10" placeholder="متن پیام شما"></textarea></div>
            <button class="float-left btn btn-dark">ارسال پیام</button>
        </form>
    </div>
</div>
@endsection