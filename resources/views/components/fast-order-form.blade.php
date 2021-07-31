<div class="section fast-order-container w-100 mt-4">
    <div class="title-section w-100 mb-5">
        <div class="title-container">
            <h2 class="title-text">سفارش فوری</h2>
            <span class="title-underline"></span>
        </div>
    </div>
    <div class="fast-order-section text-center">
        <div class="col-12 col-md-6 col-lg-5 ml-lg-4 col-xl-5 mt-4 fast-order-guide">
            <h3 class="mb-5">فرم سفارش فوری</h3>
            <p class="font-18">با پر کردن این فرم و ثبت نوع طراحی کورد نیاز خود منتظر تماس کارشناسان باشید.</p>
            <br>
            <h5 class="font-18">راهنمای ثبت فرم:</h5>
            <ul class="font-18">
                <li>وارد کردن مشخصات شخصی</li>
                <li>وارد کردن شماره تماس در دسترس</li>
                <li>انتخاب درسته مورد نیاز برای طراحی</li>
            </ul>
            <br><br>
            <p class="font-16 text-secondary">توجه داشته باشید حداقل زمان تماس کارشناسان با شما بعد از ثبت سفارش بین ۱۲ الی ۲۴ ساعت میباشد.</p>
        </div>
        <div class="fast-order-form col-12 col-md-6 col-lg-5 col-xl-4">
            <form action="#">
                <div class="input-group col-lg-6 col-12 float-right mb-3">
                    <input type="text" name="fast-order-name" class="form-control" placeholder="نام و نام خانوادگی">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                </div>
                <div class="input-group col-lg-6 col-12 float-right mb-3">
                    <input type="text" name="fast-order-number" class="form-control" placeholder="شماره تلفن">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fas fa-mobile-alt"></i></span>
                    </div>
                </div>
                <div class="order-types mb-3 w-100">
                    <div class="checkbox col-5 col-md-4 col-xl-xl-2 p-0"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/brand.svg') }}"></span><span class="checkbox-label">لوگو</span></span></label></div>
                    <div class="checkbox col-5 col-md-4 col-xl-xl-2 p-0"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/big-brochure.svg') }}"></span><span class="checkbox-label">کاتالوگ</span></span></label></div>
                    <div class="checkbox col-5 col-md-4 col-xl-xl-2 p-0"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/credit-card.svg') }}"></span><span class="checkbox-label">کارت ویزیت</span></span></label></div>
                    <div class="checkbox col-5 col-md-4 col-xl-xl-2 p-0"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/paper.svg') }}"></span><span class="checkbox-label">سربرگ</span></span></label></div>
                    <div class="checkbox col-5 col-md-4 col-xl-xl-2 p-0"><label class="checkbox-wrapper"><input type="checkbox" class="checkbox-input"><span class="checkbox-tile"><span class="checkbox-icon"><img src="{{ asset('images/office-tools.svg') }}"></span><span class="checkbox-label">ست اداری</span></span></label></div>
                </div>
                <div class="form-group"><textarea name="fast-order-description" cols="30" rows="10" class="form-control" placeholder="توضیحات"></textarea></div>
                <button type="submit" class="btn">ثبت سفارش</button>
            </form>
        </div>
    </div>
</div>