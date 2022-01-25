@extends('layouts.page')

@section('head')
    <title>{{ $post->title }} | Daya Artz Blog</title>
@endsection


@section('content')
    <div class="section w-100">
        <div class="horizontal-centerlize-w col-12 col-lg-11 col-xl-10 post-info-section mt-3">
            <div class="post-info-container vertical-centerlize p-4">
                <h2 class="horizontal-centerlize mb-4 pr-2">{{ $post->title }}</h2>
                <div class="post-info-flex">
                    <div class="col-12 col-md-6 mb-4 mb-md-3 mb-lg-4 pr-2"><i class="fas fa-icons"></i> <span>دسته موضوع: </span> <span>طراحی گرافیک</span></div>
                    <div class="col-12 col-md-6 mb-4 mb-md-3 mb-lg-4 pr-2"><i class="fas fa-calendar-day"></i> <span>تاریخ انتشار: </span> <span>۲۰ شهریور ۱۴۰۰</span></div>
                    <div class="col-12 col-md-6 mb-4 mb-md-3 mb-lg-4 pr-2"><i class="fas fa-hourglass-start"></i> <span>مدت زمان مطالعه: </span> <span>۱۰ دقیقه</span></div>
                    <div class="col-12 col-md-6 mb-md-3 mb-lg-4 pr-2"><i class="fas fa-user-edit"></i> <span>نویسنده: </span> <span>دانیال طهرانیم</span></div>
                </div>
            </div>
            <div class="post-info-cover float-left mt-2 mt-md-0">
                <img src="{{ asset('images/gallery/sampi-logo.jpg') }}" alt="blog-post-cover">
            </div>
        </div>
    </div>

    <div class="section post-main-section p-2 mt-4">
        {{-- <div class="recommand-section col-md-6 col-lg-5 col-xl-4 float-left p-3 p-lg-4 mr-4 mt-4 mb-2 d-none d-md-block">
            <div class="recommand-vector-container col-12">
                <img src="{{ asset('images/recommanded-post.png') }}" alt="">
            </div>
            <h4>پست های پیشنهادی شما</h4>
            <div class="recommanded-posts w-100 float-left">
                <div class="post-item mb-4 w-100">
                    <div class="recommand-post-cover"><img src="{{ asset('images/gallery/blog-post-1.jpg') }}" alt=""></div>
                    <div class="recommand-post-info vertical-centerlize p-2">
                        <span class="recommand-post-title mb-1">با گران ترین لوگوی جهان آشنا شوید !</span>
                        <span class="recommand-post-date">شهریور ۹۹</span>
                    </div>
                </div>
                <div class="post-item mb-4 w-100">
                    <div class="recommand-post-cover"><img src="{{ asset('images/gallery/blog-post-1.jpg') }}" alt=""></div>
                    <div class="recommand-post-info vertical-centerlize p-2">
                        <span class="recommand-post-title mb-1">با گران ترین لوگوی جهان آشنا شوید !</span>
                        <span class="recommand-post-date">شهریور ۹۹</span>
                    </div>
                </div>
                <div class="post-item mb-4 w-100">
                    <div class="recommand-post-cover"><img src="{{ asset('images/gallery/blog-post-1.jpg') }}" alt=""></div>
                    <div class="recommand-post-info vertical-centerlize p-2">
                        <span class="recommand-post-title mb-1">با گران ترین لوگوی جهان آشنا شوید !</span>
                        <span class="recommand-post-date">شهریور ۹۹</span>
                    </div>
                </div>
            </div>
            <div class="recommand-btn w-100 text-center mt-1">
                <button class="btn btn-gradient bg-aqua">دیگر پست ها</button>
            </div>
        </div>   --}}

        <div class="post-main-text">
            <h2>{{ $post->title }}</h2>
            <p> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
        </div>
    </div>

    <div class="section w-100">
        <div class="title-section col-12 mb-3">
            <div class="title-container">
                <h2 class="title-text">مطالب مرتبط</h2>
                <span class="title-underline"></span>
            </div>
        </div>
        <div class="blog-posts-container swiper-container w-100">
            <div class="swiper-wrapper">
                <article class="blog-post col-12 col-md-4 col-lg-3 swiper-slide">
                    <a href="#">
                        <div class="img-container w-100">
                            <img src="{{ asset('images/gallery/blog-post-1.jpg') }}" alt="post-cover" class="w-100 h-100">
                            <span class="article-date">19 فروردین <br> 1400</span>
                        </div>
                        <div class="article-info">
                            <p class="blog-post-source">نوشته شده توسط: ویکی پدیا</p>
                            <h3 class="title block">چگونه لوگوی خوب را بشناسیم</h3>
                            <p class="blog-post-description text-secondary"> ، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، ت لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا </p>
                            <div class="article-time"><span>زمان مطالعه: 5 دقیقه <i class="far fa-clock"></i></span></div>
                        </div>
                    </a>
                </article>
                <article class="blog-post col-12 col-md-4 col-lg-3 swiper-slide">
                    <a href="#">
                        <div class="img-container w-100">
                            <img src="{{ asset('images/gallery/blog-post-2.jpg') }}" alt="post-cover" class="w-100 h-100">
                            <span class="article-date">19 فروردین <br> 1400</span>
                        </div>
                        <div class="article-info">
                            <p class="blog-post-source">نوشته شده توسط: تیم دایا</p>
                            <h3 class="title block">بهترین لوگوهای جهان</h3>
                            <p class="blog-post-description text-secondary">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا </p>
                            <div class="article-time"><span>زمان مطالعه: 5 دقیقه <i class="far fa-clock"></i></span></div>
                        </div>
                    </a>
                </article>
                <article class="blog-post col-12 col-md-4 col-lg-3 swiper-slide">
                    <a href="#">
                        <div class="img-container w-100">
                            <img src="{{ asset('images/gallery/blog-post-3.jpg') }}" alt="post-cover" class="w-100 h-100">
                            <span class="article-date">19 فروردین <br> 1400</span>
                        </div>
                        <div class="article-info">
                            <p class="blog-post-source">نوشته شده توسط: تیم دایا</p>
                            <h3 class="title block">درباره برندینگ چه میدانید؟</h3>
                            <p class="blog-post-description text-secondary">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا </p>
                            <div class="article-time"><span>زمان مطالعه: 5 دقیقه <i class="far fa-clock"></i></span></div>
                        </div>
                    </a>
                </article>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>
        </div>
    </div>

    <div class="section col-12 col-md-10 offset-md-1 col-xl-8 offset-xl-2 blog-post-end">
        <img src="{{ asset('images/blog-post-end.svg') }}">
    </div>
@endsection