@extends('layouts.page')

@section('head')
    <title>About us | Daya Artz</title>
@endsection


@section('content')
<article class="text-dark">
    <div class="section col-12 mt-3 p-2">
        <div class="col-12 title-section">
            <div class="title-container">
                <h1 class="title-text">درباره دایاآرتز</h1>
                <span class="title-underline"></span>
            </div>
        </div>
        <div class="col-12 float-left p-3 px-5 mt-3 text">
            <blockquote>"هنر، یک فعالیت انسانی و عبارت از اینست که : انسانی آگاهانه و با یاری علائم مشخصه ظاهری، احساسی را که خود تجربه کرده است به دیگران انتقال دهد؛ به طوری که این احساسات در دیگران سرایت کند و آنها نیز آن احساسات را تجربه نمایند و از همان مراحل حسی که هنرمند از آن گذشته است، عبور کنند [...] هنر تولید موضوعات دلپذیر نیست؛ بلکه وسیله ارتباط انسانهاست؛ برای حیات بشر و برای سیر به سوی سعادت فرد و جامعه انسان، موضوعی ضرور و لازم است؛ زیرا افراد بشر را با احساساتی یکسان، به یکدیگر پیوند می دهد."
            <cite>هنر چیست اثر لئون تولستوی</cite>
            </blockquote>
            <p class="text-center"></p>
        </div>
    </div>
    <div class="section advantage-section col-12 p-0">
        <div class="advantage-box float-right col-lg-6 col-12">
            <h2 class="title title-bigger text-white left-bordered float-right col-12">مزیت های دایا</h2>
            <ul class="advantages mt-4 float-right">
                <li>
                    <a href="#">
                        <i class="avatar far fa-chart-bar"></i>
                        <div class="description">
                            <p class="title">تحلیل شخصیت برند</p>
                            <p class="subtitle">تحلیل شخصیت برند با استفاده از مباحث روانشناسی برند</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="avatar fas fa-funnel-dollar"></i>
                        <div class="description">
                            <p class="title">صرفه جویی در هزینه</p>
                            <p class="subtitle">بهترین هزینه با توجه به کیفیت بی نظیر</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="avatar fas fa-bullseye"></i>
                        <div class="description">
                            <p class="title">طراحی هدفمند</p>
                            <p class="subtitle">طراحی در راستای فعالیت و بازار برند شما</p>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="avatar far fa-question-circle"></i>
                        <div class="description">
                            <p class="title">راهنمایی شخصیت برند</p>
                            <p class="subtitle">معرفی شخصیت برند شما</p>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
        <div class="image-box float-right p-0 col-lg-6 col-12">
            <img src="{{ asset('images/about-us-vector.svg') }}" alt="">
        </div>
    </div>
    <div class="section col-lg-10 offset-lg-1 col-12 p-3 px-5 mt-3">
        <p>ما در شرکت دایا آرتز (dayarts) ، طراحی و ترسیم را یک فرایند برای ایجاد زیبایی های بصری خالی از هویت و مفهوم شخصیت و برند ایده نمی دانیم بلکه دایا آرتز با رویکرد مهندسی سازی شده از سابقه خود در عرصه گرافیک، نیاز های بازار طراحی نوین را شناخته است تا بر اساس نیاز های موجود تلاش کند بهترین نتیجه را به متقاضایان خود ارائه دهد. 
        همانطور که تولستوی می گوید و همان گونه که این کلام سرلوحه فعالیت های دایا آرتز نیز هست باور داریم که هنر وسیله ایی برای ایجاد ارتباط و انتقال مفاهیم است و هنر فضا پذیرش ایده ها را برای دیگران ساده می سازد. در دنیای امروز که برای فروش کالا یا حتی ارائه یک سرویس ساده نیاز است که مخاطب فرایند و نوع فعالیت ایده شما را درک کند، تازه برایمان کاربرد هنر و رسالتش روشن می شود. دایا آرتز، پیشگام در ادغام هنر و اندیشه به وسیله فناوری و تجربه، پردازنده هویت برند شماست.</p>
        <p>پس از اتمام هر یک از پروژه های دایا آرتز کتابچه هویت بصری دایا آرتز تقدیم حضور مشتریان و کارفرمایان گرامی می شود که شامل توضیحات کامل از جزئیات روند طراحی و اتود ها و اسکیز های ناموفق است که به نوعی مراحل رشد و تکامل لوگو و سفارش شما را به تصویر کشیده است . به علاوه این کتابچه شامل مجموعه فشرده ایی از عقاید و مفاهیمی است که طراحان و کارشناسان بر اساس هویت سازمانی فعالیت یا شرکت شما برداشت کردند و آن را در لوگو و اثر هنری قرار دادند . بدین ترتیب مفاهیم فلسفی و جهانبینی لوگو و سفارش شما در این کتابچه عنوان شده است . این کتابچه به صورت الکترونیک پس از پایان پروژه از حساب کاربری شخصی هر مشتری قابل دریافت است .</p>
    </div>
    <article>
        <div class="section col-12 p-2">
            <div class="col-12 title-section">
                <div class="title-container">
                    <h1 class="title-text">فلسفه لوگو دایا</h1>
                    <span class="title-underline"></span>
                </div>
            </div>
            <div class="col-12 float-left p-3 px-4 mt-3 text">
                <p class="ltr text-left">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. In aliquid quas, nisi, reiciendis molestiae quod dolorum quae velit atque consectetur nemo ipsa enim eligendi dicta temporibus inventore minima explicabo ullam.
                    Delectus rem quo consectetur nihil modi, pariatur, id animi repellendus ad fugiat minima quibusdam quis consequuntur laudantium ab? Laudantium quasi temporibus nostrum officia amet placeat expedita vero natus vitae! Dolorum.
                    Expedita, magnam id iure sunt ullam dignissimos similique facilis itaque voluptates, neque fuga repudiandae dolor perspiciatis vitae, eveniet qui sequi hic reprehenderit sit nemo! Ducimus in facilis sequi eius tenetur.
                    Perferendis vel perspiciatis id accusamus eligendi natus iste? Reprehenderit quam commodi dolore aut ab totam consequatur recusandae explicabo, eos dolor nisi sed laudantium deserunt. Tempora, dolore recusandae. Eaque, maiores necessitatibus.
                    Tempore laboriosam nobis asperiores nam vitae esse! Recusandae eveniet pariatur dolore suscipit porro rem laborum velit, accusantium possimus repudiandae veniam? Mollitia natus ab cum aperiam itaque explicabo hic maiores quasi.
                </p>
            </div>
        </div>
    </article>
    <div class="section col-lg-10 offset-lg-1 col-12 p-3 px-5 mt-3">
        <p>هسته محوری هر کالا یا محصول در شرکت ها ، انجمن ها و مخصوصا استارتاپ ها "ایده" است. ایده نمی تواند توسط موجودی غیراز انسان پدید آید ، از همین جهت هر محصول یا فعالیتی که دارای ایده باشد همانند انسان است و دارای شخصیت و هویت به شمار می آید. متاسفانه نمی شود در نخستین نگاه ، مغز یک انسان را شکافت و ایده و شخصیتش را بررسی کرد بنابراین دیدگاه اولیه انسان ها به افراد ناشناس بر اساس آنچه از ظاهر دیده می شود شکل می گیرد ، حال اگر شخصیت و هویت ایده هر محصول تجاری یا هسته فعالیت شما متناسب با ظاهرشان نباشد چه می شود ؟ درست است ؛ قضاوت نادرستی از طرف مخاطبان شما به وجود می آید که براولین برداشت مشتریان و مخاطبان اثر ضیان باری می گذراد که تغییرش سخت و زمان بر است . در نتیجه نیاز است تا ایده شما مورد بحث طراحان و ناظران مختلفی قرار بگیرد تا بتوان ظاهری چشم نواز و شکیل برای آن ترسیم نمود .
        پلتفرم دایا آرتز(dayarts) با رویکرد هنری و شناختی ، ایده و شخصیت فعالیت های شما را در قالب های گرافیکی مختلف طراحی می کند . دایا آرتز پشتیبان برندینگ و هویت ظاهری فعالیت شما است تا با خاطری آسوده هویت تجاری-اجتماعی ایده هایتان درخشنده ترین انعکاس را در زمینه برندینگ از خود به جا گذارند .</p>
        <p>دایا آرتز با موشکافی بسیار و جزئی نگری به اطلاعات و نیاز ها و خواسته های شما می پردازد تا کوچک ترین مفهوم قابل پردازش را برای استفاده در هویت بصری برند شما از دست ندهد ، همانطور که با جزئیات تمام به هویت بصری خود در لوگو اش پرداخته است .</p>
    </div>
    <!-- TimeLine -->
    <div class="section timeline-section col-12 mt-3 p-3">
        <div class="col-lg-2 col-md-3 col-12">
            <div class="timeline-content text-center col-12 float-left">
                <i class="fas fa-4x fa-users"></i>
                <p class="mt-3 title title-big">1396</p>
                <p class="description text-right">1- تشکیل هسته تیم دایا آرتز
                <br>2- تشکیل تیم دایا
                <br>3- شروع نخستین فعالیت دایا</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-12">
            <div class="timeline-content text-center col-12 float-left">
                <i class="fas fa-4x fa-pencil-ruler"></i>
                <p class="mt-3 title title-big">1397</p>
                <p>آغاز طراحی لوگو ویژه کسب و کار های دیجیتال</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-12">
            <div class="timeline-content text-center col-12 float-left">
                <i class="fas fa-4x fa-search"></i>
                <p class="mt-3 title title-big">1399</p>
                <p class="description text-right">1- انجام تحقیقات گسترده برای ایجاد استارت آپ دایا
                <br>2- فراهم سازی زمینه شروع فعالیت دایا آرتز</p>
            </div>
        </div>
        <div class="col-lg-2 col-md-3 col-12">
            <div class="timeline-content text-center col-12 float-left">
                <i class="fas fa-4x fa-wifi"></i>
                <p class="mt-3 title title-big">1400</p>
                <p class="description text-right">1- آغاز برپاسازی پلتفرم الکترونیک دایا
                <br>2- آغاز رویکرد استارت آپی دایا آرتز</p>
            </div>
        </div>
    </div>
    <!-- end TimeLine -->
    <div class="section col-lg-10 offset-lg-1 col-12 p-3 px-5 mt-3">
        <p>تیم طراحی گرافیک دایا آرتز فعالیت خود را درسال 1396 آغاز نمود و سهم متناسبی از  بازار طراحی های دیجیتال به دست آورد. در سال های 1399 تیم فنی- هنری دایا آرتز تحقیقات خود را در زمینه رویکرد استارتاپی و شناخت نیاز گروه های مختلف و درک تفاوت های نیاز مشتریان بازار طراحی دیجیتال را به ویژه در طراحی لوگو شروع کرد و حاصل دو سال پیاپی ادغام تحقیق و تجربه و فناوری ، پلتفرم الکترونیک دایا آرتز را سرپا ساخت . 
        چارچوب های حرفه ایی و اخلاقی، هویت و شخصیت دایا آرتز را در مسیری قرار داد که تعرفه ها و قرداد هایی متناسب با نیاز مشتریانش ارائه دهد و از ارائه بسته ها و تعرفه های فروش که سازگاری با نیاز کارفرما ندارند بپرهیزد. در همین جهت سفارش های اختصاصی و تعرفه های ترکیبی را ضمن اضافه سازی استراتژی های حمایتی از استارتاپ های نوپا و کسب و کار های غیر الکترونیک کوچک فراهم اوردیم تا بار کوچکی از دوش همراهان مبتکر و کارآفرین برداریم. 
        البته ناگفته نماند توجه ویژه به نیاز های کارفرمایان سبب شد استاندارد های جهانی و متدولوژی های نوین را ویژه تجارت های بالغ، در سطح بین الملل اختصاص دهیم تا اصول حرفه ایی طراحی هنری ناظر بر تمام فعالیت های دایا آرتز باشد. صیانت از حقوق معنوی-مادی مشتریان نهاد ما گشته است تا در خدمت رشد هویت و شخصیت برند شما باشیم.</p>
    </div>
</article>
@endsection