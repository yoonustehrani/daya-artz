@extends('layouts.page')

@section('head')
    <title>{{ $title }} | Daya Artz Blog</title>
@endsection


@section('content')
    <!-- <div class="section col-12 col-md-8 post-info-section mt-5">
        <div class="post-info-container vertical-centerlize p-4">
            <h2 class="horizontal-centerlize mb-4 pr-2">{{ $title }}</h2>
            <div class="post-info-flex">
                <span class="col-6 mb-4 pr-2">دسته موضوع: </span>
                <span class="col-6 mb-4 pr-2">تاریخ انتشار: </span>
                <span class="col-6 mb-4 pr-2">مدت زمان مطالعه: </span>
                <span class="col-6 mb-4 pr-2">نویسنده: </span>
            </div>
        </div>
        <div class="post-info-cover">
            <img src="{{ asset('images/gallery/blog-post-1.jpg') }}" alt="blog-post-cover">
        </div>
    </div> -->
    <!-- <div class="section col-12 post-main-section">
        <div class="post-main-text col-12 col-md-8">
            <h2>{{ $title }}</h2>
            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
        </div>
        <div class="recommand-section col-12 col-md-4 float-left text-center">
            <div class="recommand-vector-container col-12">
                <img src="{{ asset('images/recommanded-post.svg') }}" alt="">
            </div>
            <h4>پست های پیشنهادی شما</h4>
            <div class="recommanded-posts col-12 float-left">
                <div class="post-item mb-2 w-100">
                    <div class="recommand-post-cover"><img src="{{ asset('images/gallery/blog-post-1.jpg') }}" alt=""></div>
                    <div class="recommand-post-info vertical-centerlize p-2">
                        <span class="recommand-post-title mb-1">با گران ترین لوگوی جهان آشنا شوید !</span>
                        <span class="recommand-post-date">شهریور ۹۹</span>
                    </div>
                </div>
                <div class="post-item mb-2 w-100">
                    <div class="recommand-post-cover"><img src="{{ asset('images/gallery/blog-post-1.jpg') }}" alt=""></div>
                    <div class="recommand-post-info vertical-centerlize p-2">
                        <span class="recommand-post-title mb-1">با گران ترین لوگوی جهان آشنا شوید !</span>
                        <span class="recommand-post-date">شهریور ۹۹</span>
                    </div>
                </div>
                <div class="post-item mb-2 w-100">
                    <div class="recommand-post-cover"><img src="{{ asset('images/gallery/blog-post-1.jpg') }}" alt=""></div>
                    <div class="recommand-post-info vertical-centerlize p-2">
                        <span class="recommand-post-title mb-1">با گران ترین لوگوی جهان آشنا شوید !</span>
                        <span class="recommand-post-date">شهریور ۹۹</span>
                    </div>
                </div>
            </div>
            <div class="recommand-btn w-100 text-center mt-1">
                <button class="btn btn-gradient aqua">دیگر پست ها</button>
            </div>
        </div>
    </div> -->
@endsection