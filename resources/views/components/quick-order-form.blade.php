<div class="section fast-order-container w-100 mt-4">
    <div class="title-section w-100 mb-4">
        <div class="title-container">
            <h2 class="title-text">سفارش سریع</h2>
            <span class="title-underline"></span>
        </div>
    </div>
    <div class="fast-order-section text-center p-2">
        <div class="fast-order-guide col-12 col-md-6 col-xl-5 mt-md-3 ml-xl-4 pl-md-4">
            <h3 class="mb-3">سفارش رو در کوتاه ترین زمان ممکن ثبت کن !</h3>
            <p>فقط با پر کردن این فرم در سریعترین و خلاصه ترین روش ممکن سفارشت بدست ما میرسه</p>
            <h5>راهنمای ثبت فرم:</h5>
            <ul>
                <li>وارد کردن مشخصات شخصی</li>
                <li>وارد کردن شماره تماس در دسترس</li>
                <li>انتخاب دسته مورد نیاز برای طراحی</li>
            </ul>
            <br>
            <p class="text-secondary">توجه داشته باشید حداقل زمان تماس کارشناسان <b>دایا آرتز</b> با شما بعد از ثبت سفارش بین ۱۲ الی ۲۴ ساعت میباشد.</p>
            <p class="text-secondaty">ضمنا اگر می‌خواید به صورت شخصی سازی شده و هوشمند سفارشتون رو ثبت کنید ؛ از سیستم سفارش تخصصی استفاده کنین</p>
            <button class="btn btn-lg btn-dark">برو بریم</button>
        </div>
        <div class="fast-order-form col-12 col-md-6 col-xl-4 mt-4 mt-md-0">
            <form action="#">
                <div class="input-group float-right mb-3">
                    <input type="text" name="fast-order-name" class="form-control" placeholder="نام و نام خانوادگی">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                </div>
                <div class="input-group float-right mb-3">
                    <input type="text" name="fast-order-number" class="form-control" placeholder="شماره تلفن">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                    </div>
                </div>
                <div class="order-types mb-3 w-100">
                    <div class="checkbox"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/brand.svg') }}"></span><span class="checkbox-label">لوگو</span></span></label></div>
                    <div class="checkbox"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/big-brochure.svg') }}"></span><span class="checkbox-label">کاتالوگ</span></span></label></div>
                    <div class="checkbox"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/credit-card.svg') }}"></span><span class="checkbox-label">کارت ویزیت</span></span></label></div>
                    <div class="checkbox"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/paper.svg') }}"></span><span class="checkbox-label">سربرگ</span></span></label></div>
                    <div class="checkbox"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/office-tools.svg') }}"></span><span class="checkbox-label">ست اداری</span></span></label></div>
                </div>
                <div class="form-group"><textarea name="fast-order-description" cols="30" rows="10" class="form-control" placeholder="توضیحات"></textarea></div>
                <button type="submit" class="btn">ثبت سفارش</button>
            </form>
        </div>
    </div>
</div>