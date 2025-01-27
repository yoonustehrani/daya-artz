@extends('layouts.page')

@push('head')
    <title>{{ $service->title }} - خدمات طراحی گرافیک - دایا آرتز</title>
    @php
        $seo = get_seo_settings('services', $service);
        $offers = $service->plans->sortBy('price');
        $image_path = $service->image ? optional($service->image->file)->path : null;
    @endphp
    @component('components.seo', ['instance' => $service, 'slug' => 'services']) @endcomponent
    @include('pages.services.json-ld')
@endpush

@section('header')
<div class="header-section policy-header dotted-background services-header">
    <div class="p-4 col-12 col-md-7">
        <div class="w-100 piped">
            <h1 class="d-inline text-white">{{ $service->title }}</h1>
        </div>
        <p class="px-3 text-light">{{ $service->short_description ?:  $service->subtitle }}</p>
        <br>
        @if ($service->children->count())
            @foreach ($service->children->chunk(3) as $chunk)
            <div>
                @foreach ($chunk as $item)
                <a href="{{ route('services.show', ['slug' => $item->slug]) }}" class="fancy-btn bg-purple text-white d-inline-flex align-items-center py-2 px-3 mx-2">
                    {{ $item->title }} <i class="circle mr-2 mt-0 fas fa-plus"></i>
                </a>
                @endforeach
            </div>
            @endforeach
        @endif
        <div>
            <button class="fancy-btn whiten d-inline-flex align-items-center py-2 px-3 mx-2 scroll-to-form">ثبت سفارش<i class="circle mr-2 mt-0 fas fa-plus"></i></button>
            @if ($service->children->isEmpty())
            <button class="fancy-btn bg-success d-inline-flex align-items-center py-2 px-3 mx-2 scroll-to-element" data-scroll="pricing">پلن های قیمتی<i class="circle mr-2 mt-0 fas fa-dollar-sign"></i></button>
            @endif
            <button class="fancy-btn bg-warning d-inline-flex align-items-center py-2 px-3 mx-2 scroll-to-element" data-scroll="portfolio">نمونه کارها<i class="circle mr-2 mt-0 fas fa-drafting-compass"></i></button>
        </div>
    </div>
    @if ($image_path)
        <div class="flex-center col-12 col-md-5 mb-3 mb-md-0">
            <div class="flex-center mw-100 overflow-hidden service-image">
                <img data-src="{{ asset($image_path) }}" class="h-auto lazyload" alt="خدمات دایا آرتز">
            </div>
        </div>
    @endif
    {{-- <div class="triangle d-none d-md-block"></div> --}}
</div>
@endsection

@section('content')
    <!-- first-section -->
    <div class="section col-12 mt-4 py-5 service-first-section dotted-background">
        {!! $service->content !!}
    </div>
    <!-- end first-section -->
    @if ($service->children->count())
    <div class="section w-100 pt-3 pb-4 dotted-background">
        <div class="title-section w-100 mb-4">
            <div class="title-container">
                <p class="title-text">خدمات زیر مجموعه</p>
                <span class="title-underline"></span>
            </div>
        </div>
        <div class="other-services-container w-100">
            <p class="text-center w-100">شما می‌توانید با انتخاب خدمات زیر مجموعه سرویس {{ $service->title }} از جزئیات تعرفه و پلن های قیمت گذاری {{ $service->title }} مطلع شوید و سفارش خود را ثبت کنید</p>
            @foreach ($service->children as $child)
            <div class="other-service">
                <span class="back-aqua"><i class="{{ $child->icon_class }}"></i></span>
                <h3 class="title service-title">{{ $child->title }}</h3>
                <a class="service-subtitle" href="{{ route('services.show', ['slug' => $child->slug]) }}">{{ $child->subtitle }}</a>
                <div class="button-container">
                    <a href="{{ route('services.show', ['slug' => $child->slug]) }}" class="btn btn-gradient">مشاهده تعرفه</a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
    <!-- sevices benefits -->
    <div class="header-section service-benefits-section auto-height p-3">
        <div class="header-text col-12 col-md-8">
            <h2>مزیت های {{ $service->title }} در دایا آرتز ...</h2>
            {!! $service->description !!}
        </div>
        <div class="header-vector col-10 col-sm-8 col-md-4 mb-3 mb-md-0">
            <img data-src="{{ asset('images/benefits.svg') }}" alt="مزیت های دایا" class="lazyload rules">
            <img data-src="{{ asset('images/benefits-background.svg') }}" alt="vector background" class="lazyload rules-back">
        </div>
        <div class="triangle d-none d-md-block"></div>
    </div>
    <!-- end sevices benefits -->
    <!-- order steps -->
    <div class="section col-12 dotted-background">
        <div class="title-section mb-5 mt-4 w-100">
            <div class="title-container">
                <h4 class="title-text">روند سفارش</h4>
            </div>
        </div>
        <div class="step-container p-rel">
            <div class="step-item-container t-0 l-0">
                <div class="step-item t-0 step-1">
                    <div class="step-shape">
                        <span class="step-index">01</span>
                        <span class="step-icon"><i class="fas fa-bullseye"></i></span>
                    </div>
                    <div class="match-line"></div>
                </div>
                <div class="step-info step-1">
                    <h4>ثبت سفارش</h4>
                    <p>ایجاد سفارش از طریق روش های ثبت سفارش درج شده در صفحه ، روش های ثبت سفارش دایا آرتز</p>
                </div>
            </div>
            <div class="step-item-container b-0 l-25">
                <div class="step-item b-0 step-2">
                    <div class="step-shape">
                        <span class="step-index">02</span>
                        <span class="step-icon"><i class="fas fa-dollar-sign"></i></span>
                    </div>
                    <div class="match-line count-clock"></div>
                </div>
                <div class="step-info step-2">
                    <h4>تایید تیم دایا</h4>
                    <p>تایید سفارش ، ایجاد قرارداد بین طرفین و پرداخت پیش پرداخت</p>
                </div>
            </div>
            <div class="step-item-container t-0">
                <div class="step-item t-0 l-50 step-3">
                    <div class="step-shape">
                        <span class="step-index">03</span>
                        <span class="step-icon"><i class="fas fa-handshake"></i></span>
                    </div>
                    <div class="match-line"></div>
                </div>
                <div class="step-info step-3">
                    <h4>دریافت اتود ها</h4>
                    <p>تحویل اتود و طرح ها بعد از مدت زمان مقرر شده ای که در زمان ایجاد پروژه محاسبه گردیده</p>
                </div>
            </div>
            <div class="step-item-container b-0 l-75">
                <div class="step-item b-0 step-4">
                    <div class="step-shape">
                        <span class="step-index">04</span>
                        <span class="step-icon"><i class="fas fa-cog"></i></span>
                    </div>
                    <div class="match-line count-clock"></div>
                </div>
                <div class="step-info step-4">
                    <h4>ادیت و تغییرات</h4>
                    <p>انجام ادیت ها و تغییرات شما و نزدیک شدن پروژه به طرح مد نظر شما توسط طراحان دایا</p>
                </div>
            </div>
            <div class="step-item-container t-0 r-0">
                <div class="step-item t-0 step-5">
                    <div class="step-shape">
                        <span class="step-index">05</span>
                        <span class="step-icon"><i class="fas fa-check-square"></i></span>
                    </div>
                </div>
                <div class="step-info step-5">
                    <h4>تسویه و تحویل</h4>
                    <p>پرداخت کامل هزینه سفارش و دریافت فایل مورد نظر شما</p>
                </div>
            </div>
        </div>
    </div>

    @include('components.start-order')
    
    @if ($service->children->isEmpty())
        <x-portfolio :api-target="route('api.portfolios.index', ['service' => $service->getKey()])"/>
    @else
        <x-portfolio 
            :api-target="route('api.portfolios.index') . '?' . make_http_multi_params(
                'service',
                array_merge(
                    [$service->getKey()],
                    $service->children->pluck('id')->toArray()
                )
            )"
        />
    @endif
    
    @if ($service->children->isEmpty())
    <div class="section w-100 mt-3 order-packs-section">
        <div class="title-section w-100 mb-4">
            <div class="title-container">
                <h2 class="title-text">{{ 'پلن های قیمتی' . ' ' . $service->title}}</h2>
                <h4 class="subtitle">بسته های هوشمند جهت سفارش {{ $service->title }} برای شما</h4>
            </div>
        </div>
        @foreach ($service->plans->groupBy('row')->sortKeys() as $key => $plans)
            <div class="col-12 mb-3 order-card-container">
                @foreach ($plans->sortBy('order') as $plan)
                <div class="order-card col-12 col-md-6 col-lg-4 col-xl-3 p-0 my-2 my-md-0 p-md-2 mx-xl-2">
                    <div>
                        <h4 class="card-title bold">{{ $plan->title }}</h4>
                        <div class="card-price-container">
                            <span class="card-price font-24 bold">{{ number_format($plan->price) }}</span>
                            <span class="font-16 ltr card-price">/تومان</span>
                        </div>
                        {!! $plan->caption !!}
                        {{-- <form action="{{ route('order.store', ['service' => $service->getKey(), 'plan' => $plan->getKey()]) }}" method="post">
                            @csrf
                            <button type="submit" class="btn badge-pill">ثبت سفارش</button>
                        </form> --}}
                    </div>
                </div>
                @endforeach
            </div>
        @endforeach
    </div>
    @endif
    <x-contact-ways />
    <div class="section w-100 text-center mb-4 daya-guide">
        <div class="title-section w-100">
            <div class="title-container">
                <h3 class="title-text">راهنمای دایا آرتز</h3>
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
                <h4 class="mb-3 mb-md-2 mb-md-4">به راهنمایی احتیاج داری؟</h4>
                <form action="#">
                    <div class="input-group mb-2 mb-md-4"><input class="form-control" type="text" name="name" placeholder="نام و نام خانوادگی"></div>
                    <div class="form-group"><textarea class="form-control" name="message" cols="30" rows="10" placeholder="متن پیام شما"></textarea></div>
                    <button class="float-left btn btn-dark">ارسال پیام</button>
                </form>
            </div>
        </div>
    </div>
    <x-quick-order-form />
    <div class="section w-100 FAQ-section mt-5">
        <h4 class="faq-title mt-3 mb-4">سوالات متداول</h4>
        <div class="accordion-container p-4">
            <div class="item-wrapper col-12 col-md-6">
                <div class="question-wrapper">
                    <h4>دایا آرتز برای چه کسب و کار هایی طراحی می کنه ؟</h4>
                    <span>
                        <i class="fas fa-plus animated rotateIn"></i>
                        <i class="fas fa-minus animated rotateIn d-none"></i>
                    </span>
                </div>
                <p class="answer animated flipInY d-none">دایا آرتز برای تمامی مشاغل و کسب و کار های موجود، فعالیت طراحی گرافیک را به شکل حرفه ایی دنبال می کند . از رستوران و کافی شاپ تا استارتاپ ها و شرکت های توسعه فناوری ؛ نیاز هایشان توسط دایا آرتز سنجیده شده تا بهترین خدمات را دریافت کنند.</p>
            </div>
            <div class="item-wrapper col-12 col-md-6">
                <div class="question-wrapper">
                    <h4>دایا آرتز چگونه ما را پشتیبانی و پیگیری می کند ؟</h4>
                    <span>
                        <i class="fas fa-plus animated rotateIn"></i>
                        <i class="fas fa-minus animated rotateIn d-none"></i>
                    </span>
                </div>
                <p class="answer animated flipInY d-none">دایا آرتز دارای یک سیستم پشتیبانی منظم و فعال آنلاین می باشد که منظم به سوالات شما پاسخ می دهد و همچنین در یک اقدام فوق العاده امکان پیگیری های چند جانبه شما را از طریق پنل شخصی کارفرما ایجاد کرده است . ضمنا دایا آرتز از طریق تماس تلفنی و شبکه های اجتماعی نیز پشتیبان و پیگیر مخاطبان خود می باشد .</p>
            </div>
            <div class="item-wrapper col-12 col-md-6">
                <div class="question-wrapper">
                    <h4>به چه روش هایی امکان سفارش داریم ؟</h4>
                    <span>
                        <i class="fas fa-plus animated rotateIn"></i>
                        <i class="fas fa-minus animated rotateIn d-none"></i>
                    </span>
                </div>
                <p class="answer animated flipInY d-none">سفارش تلفنی، سفارش از طریق ربات تلگرام، سفارش از طریق سیستم شبکه های اجتماعی، سفارش فوری و همچنین امکان خاص و ویژه سفارش تخصصی برای تمامی مخاطبان قابل استفاده است.</p>
            </div>
            <div class="item-wrapper col-12 col-md-6">
                <div class="question-wrapper">
                    <h4>سفارش تخصصی چیست ؟</h4>
                    <span>
                        <i class="fas fa-plus animated rotateIn"></i>
                        <i class="fas fa-minus animated rotateIn d-none"></i>
                    </span>
                </div>
                <p class="answer animated flipInY d-none">روش هوشمند و ویژه که دایا آرتز برای ثبت سفارش با جزئیات کامل، توسعه داده است. سفارش تخصصی فراهم گردیده است که به جزئیات اهمیت دهد و روند سفارش را برای شما دقیق و هیجان انگیز کند.</p>
            </div>
            <div class="item-wrapper col-12 col-md-6">
                <div class="question-wrapper">
                    <h4>دایا آرتز و امنیت فوق العاده ؛ محرمانه ها چیستند ؟</h4>
                    <span>
                        <i class="fas fa-plus animated rotateIn"></i>
                        <i class="fas fa-minus animated rotateIn d-none"></i>
                    </span>
                </div>
                <p class="answer animated flipInY d-none">دایا آرتز متعهد می شود که در قبال اطلاعات شما و به ویژه استارت آپ ها مطابق قرارداد محرمانگی در حفظ اطلاعات و امنیت بصری هویت برند شما کوشا باشد و صیانت از آن را در اولویت خود قرار دهد .</p>
            </div>
            <div class="item-wrapper col-12 col-md-6">
                <div class="question-wrapper">
                    <h4>نحوه ارائه طراحی های آماده شده و دریافت فایل ها به چه شکل است ؟</h4>
                    <span>
                        <i class="fas fa-plus animated rotateIn"></i>
                        <i class="fas fa-minus animated rotateIn d-none"></i>
                    </span>
                </div>
                <p class="answer animated flipInY d-none">فایل های طراحی شده به صورت آماده و فرمت مورد نظر شما از طریق پنل کاربر و همچنین از طریق واتساپ و تلگرام قابل دریافت و دانلود می باشند</p>
            </div>
        </div>
    </div>
    <div id="blog-suggestion-react" api-target-random="{{ route('api.posts.index', ['mode' => 'random', 'limit' => '8']) }}" api-target-latest="{{ route('api.posts.index', ['mode' => 'latest', 'limit' => '8']) }}"></div>
@endsection