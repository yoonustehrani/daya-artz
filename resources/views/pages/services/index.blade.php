@extends('layouts.page')

@push('head')
    <title>{{ $page->title }}</title>
    @component('components.seo', ['instance' => $page, 'slug' => 'pages', 'og' => ['title' => $page->title]]) @endcomponent
@endpush

@section('header')
<div class="header-section policy-header dotted-background services-header">
    <div class="header-text p-4 col-12 col-md-7">
        <h1>خدمات <a class="aqua" href="{{ route('home') }}">دایا آرتز</a></h1>
        <br>
        <p>تیم طراحی <b class="aqua">دایا آرتز</b> با ارائه لیست کاملی از خدمات طراحی برای شما مشتریان در تلاش است تا ثبت سفارشات شما را به راحت ترین روش ممکن ایجاد کند.</p>
    </div>
    <div class="header-vector col-12 col-md-5 mb-3 mb-md-0">
        <img data-src="{{ asset('images/services.svg') }}" class="rules lazyload" alt="خدمات دایا آرتز">
        <img data-src="{{ asset('images/services-back-vector.png') }}" class="rules-back lazyload" alt="vector background">
    </div>
    <div class="triangle d-none d-md-block"></div>
</div>
@endsection

@section('content')
<div class="section w-100 mt-5 mb-5">
    <div class="title-section w-100 mb-4">
        <div class="title-container">
            <h2 class="title-text">خدمات طراحی گرافیک</h2>
        </div>
    </div>
    <div class="services-groups-container w-100">
        @php
            $group_icons = get_setting('services_page.groups.icon_list') ?: [];
            if (is_string($group_icons)) {
                $group_icons = explode(',', $group_icons);
            }
        @endphp
        @foreach ($service_groups->keys() as $group_name)
            <div class="group-item col-12 col-md-3 mb-5 mb-md-0">
                <span class="computer-container">
                    <i class="far fa-desktop computer-icon"></i>
                    <i class="{{ $group_icons[$loop->index] ?? 'far fa-pencil-ruler' }} inside-computer"></i>
                </span>
                <h3 class="group-name">{{ $group_name }}</h3>
            </div>
            @if (! $loop->last)
            <div class="d-none d-md-block matcher-line match-line-{{ $loop->index + 1 }}"></div>
            @endif
        @endforeach
    </div>
</div>

<div class="section dotted-background bg-purple-gr col-12 py-4 p-md-4">
    <p class="title title-bigger text-light text-center">دنبال چه نوع طراحی میگردی؟</p>
    <div id="react-service-search" data-search="{{ route('api.services.index') }}"></div>
</div>

<div class="section w-100 mt-5 mb-0 mb-md-3">
    <div class="title-section w-100 mb-4">
        <div class="title-container">
            <h4 class="title-text">خدمات اصلی دایا آرتز</h4>
        </div>
    </div>
    <div class="main-services-container w-100 p-2">
        @php
            $group_link_title = get_setting('services_page.main.button') ?: __('Continue to read');
        @endphp
        @foreach ($main_services as $main)
        <a href="{{ route('services.show', ['slug' => $main->slug]) }}" class="main-service text-dark">
            <div class="icon-container">
                <span class="back-aqua">
                    <i class="{{ $main->icon_class }}"></i>
                </span>
                <h2>{{ $main->title }}</h2>
            </div>
            <div class="info-container">
                <p class="title service-title">{{ $main->subtitle }}</p>
                <p class="service-description">{{ $main->short_description }}</p>
            </div>
        </a>
        @endforeach
        <div class="main-service d-none">
            <div class="icon-container"><span class="back-aqua big-icon"><i class="fas fa-plus-circle"></i></span><h2>ترکیبی</h2></div>
            <div class="info-container">
                <p class="title service-title">ترکیب خود را بسازید</p>
                <p class="service-description">اگه نیاز به طراحی های متنوع در بخش ها و خدمات مختلف هستید، این بسته بهترین انتخاب برای شما و برندتان خواهد بود</p>
            </div>
        </div>
    </div>
</div>

<div class="section w-100 text-center mb-4 daya-guide">
    <div class="title-section w-100">
        <div class="title-container">
            <p class="title-text">راهنمای دایا</p>
        </div>
    </div>
    <div class="section contact-us-first-section w-100 text-center">
        <div class="contact-us-background w-100">
            <div class="background-left">
                <img data-src="{{ asset('images/contact-us-background-2.png') }}" class="lazyload" alt="vector background">
            </div>
            <div class="background-right">
                <img data-src="{{ asset('images/contact-us-background-1.png') }}" class="lazyload" alt="vector background">
            </div>
            <div class="contact-us-vector-1">
                <img data-src="{{ asset('images/contact-us-vector-1.png') }}" class="lazyload" alt="ارتباط با دایا">
            </div>
        </div>
        <div class="contact-us-form">
            <p class="title contact-us-title mb-3 mb-md-2 mb-md-4">راهنمایی احتیاج دارید ؟</p>
            <form action="#">
                <div class="input-group mini-field d-inline-flex mb-2 mb-md-4 float-right"><input class="form-control" type="text" name="name" placeholder="نام و نام خانوادگی"></div>
                <div class="input-group mini-field d-inline-flex mb-2 mb-md-4 float-left">
                    <div class="input-group-prepend"><span class="input-group-text">+98</span></div>
                    <input type="text" name="number" placeholder="شماره موبایل" class="form-control ltr">
                </div>
                <div class="form-group"><textarea class="form-control" name="message" cols="30" rows="10" placeholder="متن پیام شما"></textarea></div>
                <button class="float-left btn btn-dark">ارسال پیام</button>
            </form>
        </div>
    </div>
</div>
<!-- end guide section -->

{{-- Service Groups --}}
<div class="service-groups-container">
    @php
        $link_title = get_setting('services_page.group_items.button') ?: __('Continue to read');
    @endphp
    @foreach ($service_groups as $group => $services)
    <div class="section w-100 mt-3 mt-md-5">
        <div class="title-section w-100 mb-4">
            <div class="title-container">
                <p class="title-text">{{ $group }}</p>
            </div>
        </div>
        <div class="other-services-container w-100">
            @foreach ($services as $service)
                <a href="{{ route('services.show', ['slug' => $service->slug]) }}" class="other-service text-dark">
                    <span class="back-aqua"><i class="{{ $service->icon_class }}"></i></span>
                    <h3 class="title service-title">{{ $service->title }}</h3>
                    <span>{{ $service->subtitle }}</span>
                </a>
            @endforeach
        </div>
    </div>
    @endforeach
</div>
{{-- End Service Groups --}}

<x-quick-order-form />
@endsection