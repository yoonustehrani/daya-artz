@extends('layouts.page')

@section('header')
    <!-- Policy Header -->
    <div class="header-section policy-header">
        <div class="header-text p-4 col-12 col-md-7">
            <h2>قوانین و مقررات <a href="{{ route('home') }}">دایا آرتز</a></h2>
            <br>
            <p>تیم طراحی لوگو و خدمات گرافیکی <a href="{{ route('home') }}">دایا آرتز</a> در چارچوب های اخلاقی جمهوری اسلامی ایران و تابع انجمن صنفی طراحان گرافیک ایران است که اصول حرفه و متود های کیفی جهانی را سرلوح فعالیت های خود قرار داده است.</p>
        </div>
        <div class="header-vector col-12 col-md-5 mb-3 mb-md-0">
            <img src="{{ asset('images/rules.svg') }}" alt="rules vector" class="rules">
            <img src="{{ asset('images/rules-back.svg') }}" alt="rules-back" class="rules-back">
        </div>
        <div class="triangle d-none d-md-block"></div>
    </div>
    <!-- end Policy Header -->
@endsection

@section('content')
<!-- daya duties -->
<div class="section w-100">
    <div class="title-section w-100 mt-5 mb-4">
        <div class="title-container">
            <h3 class="title-text w-100 m-0">تعهدات و سیاست های دایا آرتز در قبال مشتریان و کارفرمایان:</h3>
        </div>
    </div>
    <div class="daya-duties w-100">
        <div class="duty-item col-12">
            <p class="bold">1- آیا تیم دایا آرتز در جهت حفظ اطلاعات کارفرمایان حقوقی و حقیقی مسئول است؟</p>
            <p>بله کاملا ، رعایت حقوق معنوی و حفظ کرامت کارفرما از اصول اخلاقیست. تیم نوین طراحی گرافیک دایا آرتز مسئول حفاظت از اطلاعات مشتریان است و نسبت به صیانت از حقوق مشتریان کاملا متعهد می شود.</p>
        </div>
        <div class="duty-vector-text">
            <div class="col-5 d-none d-md-block customer-vector float-left">
                <img src="{{ asset('images/customer.svg') }}" alt="daya-shopping-basket">
            </div>
            <div class="customer-text col-md-7 float-right">
                <div class="duty-item">
                    <p class="bold">2- قرار داد محرمانگی چیست؟</p>
                    <p>دایا آرتز چگونه امنیت اطلاعات هر مشتری را تضمین می کند؟</p>
                    <p>قرار داد محرمانگی میان دایا آرتز و مشتریان قرار گرفته است تا ضمانت نامه حغاظت از اطلاعات ایشان باشد. تیم دایا آرتز ضمن عقد قرار داد محرمانگی اطلاعات معنوی مشتریان نسبت به حفظ حقوق معنوی ایشان حتی پس از اتمام پروژه و سفارش را متعهد می شود.</p>
                </div>
                <div class="duty-item">
                    <p class="bold">تیم طراحان دایا آرتز متعهد می شود آثار طراحی شده دارای خلاقیت و نواوری و عاری از کپی باشد.</p>
                </div>
                <div class="duty-item">
                    <p class="bold">آیا دایا آرتز پاسخگو و برطرف کننده پرسش های مشتریان در حوزه طراحی و گرافیک ضمن سفارش می باشد؟</p>
                    <p>بله تیم طراحی دایا آرتز آماده به تفهیم جزئیات و برطرف کننده پرسش های مطرح شده مشتریان است ، تیم طراحی دایا آرتز متعهد می شود ضمن تکمیل روند پروژه تمام اطلاعات مورد نیاز مشتریان از روند و چگونگی و چرایی کار را در اختیارشان قرار دهد.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end daya duties --> 

<!-- FAQ accordion -->
<!-- <div class="section w-100 FAQ-section">
    <h4 class="faq-title mt-3 mb-4">سوالات متداول</h4>
    <div class="accordion-container p-4">
        <div class="item-wrapper col-12 col-md-3 mr-1">
            <div class="question-wrapper">
                <h4>چگونه سفارش را ثبت کنیم؟</h4>
                <span><i class="fas fa-minus"></i></span>
            </div>
            <p class="answer">سفارش هارو میتونید به دو روش تخصصی و فوری ثبت کنید ، برای اطلاعات بیشتر میتونید به صفحه راهنمای ثبت سفارش مراجعه کنید.</p>
        </div>
        <div class="item-wrapper col-12 col-md-3 mr-1">
            <div class="question-wrapper">
                <h4>تفاوت سفارش فوری با تخصصی چیست؟</h4>
                <span><i class="fas fa-minus"></i></span>
            </div>
            <p class="answer">در سفارش فوری با پر کردن فرم همکاران ما با شما تماس خواهند گرفت ، در سفارش تخصصی با پر کردن فرم ها سفارش خود را ثبت خواهید کرد.</p>
        </div>
        <div class="item-wrapper col-12 col-md-3 mr-1">
            <div class="question-wrapper">
                <h4>ثبت سفارش تخصصی چگونه است؟</h4>
                <span><i class="fas fa-minus"></i></span>
            </div>
            <p class="answer">با انتخاب کردن تعرفه مورد نظر خود که در سه بسته تقسیم بندی شده ، منتظر ارسال اتود های مورد نظر خود که در بازه زمانی ۱۵ الی ۲۰ روزه می باشد ، باشید.</p>
        </div>
        <div class="item-wrapper col-12 col-md-3 mr-1">
            <div class="question-wrapper">
                <h4>چگونه به دایا اعتماد کنیم؟</h4>
                <span><i class="fas fa-minus"></i></span>
            </div>
            <p class="answer">گروه طراحی دایا قدرت گرفته شده از تیم بزرگ سمپی با شماره ثبت ۳۲۳۵۰۵۰ و دارای نشان اعتماد و درگاه پرداخت زرین پال است.</p>
        </div>
        <div class="item-wrapper col-12 col-md-3 mr-1">
            <div class="question-wrapper">
                <h4>شرایط ثبت سفارش چیست؟</h4>
                <span><i class="fas fa-minus"></i></span>
            </div>
            <p class="answer">مطالعه دقیق شرایط و ظوابط و سپس تعرفه های سفارش ، پر کردن فرم درخواست سفارش و در انتها پرداخت مبلغ یا بیعانه بر اساس نوع سفارش</p>
        </div>
        <div class="item-wrapper col-12 col-md-3 mr-1">
            <div class="question-wrapper">
                <h4>روش های پرداخت چیست؟</h4>
                <span><i class="fas fa-minus"></i></span>
            </div>
            <ul class="answer">
                <li>از طریق درگاه های اینترنتی سایت</li>
                <li>از طریق کارت به کارت</li>
            </ul>
        </div>
    </div>
</div> -->
<!-- end FAQ accordion -->
@endsection