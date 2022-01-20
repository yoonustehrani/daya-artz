@extends('layouts.page')

@section('head')
    <title>{{ $title }} | Daya Artz Blog</title>
@endsection


@section('content')
    <div class="section w-100">
        <div class="horizontal-centerlize-w col-12 col-md-11 post-info-section mt-3 mt-md-3">
            <div class="post-info-container vertical-centerlize p-4">
                <h2 class="horizontal-centerlize mb-4 pr-2">{{ $title }}</h2>
                <div class="post-info-flex">
                    <div class="col-12 col-md-6 mb-4 mb-md-3 mb-lg-4 pr-2"><span>دسته موضوع: </span> <span>طراحی گرافیک</span></div>
                    <div class="col-12 col-md-6 mb-4 mb-md-3 mb-lg-4 pr-2"><span>تاریخ انتشار: </span> <span>۲۰ شهریور ۱۴۰۰</span></div>
                    <div class="col-12 col-md-6 mb-4 mb-md-3 mb-lg-4 pr-2"><span>مدت زمان مطالعه: </span> <span>۱۰ دقیقه</span></div>
                    <div class="col-12 col-md-6 mb-4 mb-md-3 mb-lg-4 pr-2"><span>نویسنده: </span> <span>دانیال طهرانیم</span></div>
                </div>
            </div>
            <div class="post-info-cover float-left mt-2 mt-md-0">
                <img src="{{ asset('images/gallery/blog-post-1.jpg') }}" alt="blog-post-cover">
            </div>
        </div>
    </div>

    <div class="section w-100 post-main-section mt-5 p-2 p-md-5">
        <div class="recommand-section col-md-6 col-lg-5 col-xl-4 float-left p-3 p-lg-4 mr-4 mt-4 mb-2 d-none d-md-block">
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
        </div>    
        <div class="post-main-text">
            <h2>{{ $title }}</h2>
            <p class="pr-md-2 pl-md-2"> لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد. لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.</p>
        </div>
        <div class="recommand-section col-12 float-left text-center p-4 mt-4 d-md-none">
            <div class="recommand-vector-container col-12">
                <img src="{{ asset('images/recommanded-post.png') }}" alt="">
            </div>
            <h4>پست های پیشنهادی شما</h4>
            <div class="recommanded-posts w-100 float-left">
                <div class="post-item mb-4 w-100">
                    <div class="recommand-post-cover"><img src="{{ asset('images/gallery/blog-post-1.jpg') }}" alt=""></div>
                    <div class="recommand-post-info vertical-centerlize p-2">
                        <span class="recommand-post-title">با گران ترین لوگوی جهان آشنا شوید !</span>
                        <span class="recommand-post-date">شهریور ۹۹</span>
                    </div>
                </div>
                <div class="post-item mb-4 w-100">
                    <div class="recommand-post-cover"><img src="{{ asset('images/gallery/blog-post-1.jpg') }}" alt=""></div>
                    <div class="recommand-post-info vertical-centerlize p-2">
                        <span class="recommand-post-title">با گران ترین لوگوی جهان آشنا شوید !</span>
                        <span class="recommand-post-date">شهریور ۹۹</span>
                    </div>
                </div>
                <div class="post-item mb-4 w-100">
                    <div class="recommand-post-cover"><img src="{{ asset('images/gallery/blog-post-1.jpg') }}" alt=""></div>
                    <div class="recommand-post-info vertical-centerlize p-2">
                        <span class="recommand-post-title">با گران ترین لوگوی جهان آشنا شوید !</span>
                        <span class="recommand-post-date">شهریور ۹۹</span>
                    </div>
                </div>
            </div>
            <div class="recommand-btn w-100 text-center mt-1">
                <button class="btn btn-gradient bg-aqua">دیگر پست ها</button>
            </div>
        </div>  
    </div>
    <div class="section col-12 col-md-10 offset-md-1 blog-post-end mt-2">
        <img src="{{ asset('images/blog-post-end.svg') }}" alt="people-shaking-hands">
    </div>
@endsection