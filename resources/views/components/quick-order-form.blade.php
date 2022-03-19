<div class="section fast-order-container w-100 my-4" id="quick-order-container">
    <div class="title-section w-100 mb-4">
        <div class="title-container">
            <p class="title-text">سفارش سریع</p>
            <span class="title-underline"></span>
        </div>
    </div>
    <div class="fast-order-section text-center p-2">
        <div class="fast-order-guide col-12 col-md-6 col-xl-5 mt-md-3 ml-xl-4 pl-md-4 w-full md:w-1/2 xl:w-5/12 md:mt-3 xl:ml-4 md:pl-4">
            <p class="title mb-3">سفارش رو در کوتاه ترین زمان ممکن ثبت کن !</p>
            <p>فقط با پر کردن این فرم؛ در سریع ترین و  خلاصه ترین روش؛ درخواست سفارشت به ما میرسه و ما در اسرع وقت باهات تماس می‌گیریم.</p>
            <h5>راهنمای ثبت فرم:</h5>
            <ul>
                <li>وارد کردن مشخصات شخصی</li>
                <li>وارد کردن شماره تماس در دسترس</li>
                <li>انتخاب دسته مورد نیاز برای طراحی</li>
            </ul>
            <br/>
            <p class="text-secondary text-gray-500">توجه داشته باشید حداقل زمان تماس کارشناسان <b>دایا آرتز</b> با شما بعد از ثبت سفارش بین ۱۲ الی ۲۴ ساعت می باشد.</p>
            <p class="text-secondaty text-gray-500">ضمنا اگر می‌خواید به صورت شخصی سازی شده و هوشمند سفارشتون رو ثبت کنید؛ از سیستم سفارش تخصصی استفاده کنین</p>
            <button class="btn btn-lg btn-dark rounded-lg text-xl text-slate-50 duration-300">برو بریم</button>
        </div>
        <div 
            class="fast-order-form col-12 col-md-6 col-xl-4 mt-4 mt-md-0 px-3 w-full md:w-1/2 xl:w-1/3 md:mt-0"
            id="react-quick-order"
            data-post-api="{{ route('api.forms.orders.quick') }}"
            data-recaptcha="{{ config('services.reCAPTCHA.site_key') }}"
        ></div>
    </div>
</div>
@push('head')
<link rel="preconnect" href="https://www.google.com">
<link rel="preconnect" href="https://www.gstatic.com" crossorigin>
<script async src="https://www.google.com/recaptcha/api.js?trustedtypes=true&render={{ config('services.reCAPTCHA.site_key') }}"></script>
@endpush