import React, { Component } from 'react';

class FastOrder extends Component {
    render() {
        console.log('react rendered');
        return (
            <div className="section fast-order-container w-100 mt-4">
                <div className="title-section w-100 mb-4">
                    <div className="title-container">
                        <h2 className="title-text">سفارش سریع</h2>
                        <span className="title-underline"></span>
                    </div>
                </div>
                <div className="fast-order-section text-center p-2">
                    <div className="fast-order-guide col-12 col-md-6 col-xl-5 mt-md-3 ml-xl-4 pl-md-4">
                        <h3 className="mb-3">سفارش رو در کوتاه ترین زمان ممکن ثبت کن !</h3>
                        <p>فقط با پر کردن این فرم در سریعترین و خلاصه ترین روش ممکن سفارشت بدست ما میرسه</p>
                        <h5>راهنمای ثبت فرم:</h5>
                        <ul>
                            <li>وارد کردن مشخصات شخصی</li>
                            <li>وارد کردن شماره تماس در دسترس</li>
                            <li>انتخاب دسته مورد نیاز برای طراحی</li>
                        </ul>
                        <br/>
                        <p className="text-secondary">توجه داشته باشید حداقل زمان تماس کارشناسان <b>دایا آرتز</b> با شما بعد از ثبت سفارش بین ۱۲ الی ۲۴ ساعت میباشد.</p>
                        <p className="text-secondaty">ضمنا اگر می‌خواید به صورت شخصی سازی شده و هوشمند سفارشتون رو ثبت کنید ؛ از سیستم سفارش تخصصی استفاده کنین</p>
                        <button className="btn btn-lg btn-dark">برو بریم</button>
                    </div>
                    <div className="fast-order-form col-12 col-md-6 col-xl-4 mt-4 mt-md-0">
                        <form action="#">
                            <div className="input-group float-right mb-3">
                                <input type="text" name="fast-order-name" className="form-control" placeholder="نام و نام خانوادگی" />
                                <div className="input-group-append">
                                    <span className="input-group-text"><i className="fas fa-user"></i></span>
                                </div>
                            </div>
                            <div className="input-group float-right mb-3">
                                <input type="text" name="fast-order-number" className="form-control" placeholder="شماره تلفن" />
                                <div className="input-group-append">
                                    <span className="input-group-text"><i className="fas fa-mobile-alt"></i></span>
                                </div>
                            </div>
                            <div className="order-types mb-3 w-100">
                                <div className="checkbox"><label className="checkbox-wrapper"><input type="checkbox" className="checkbox-input"/><span className="checkbox-tile"><span className="checkbox-icon"><img src={APP_PATH + "images/brand.svg"} /></span><span className="checkbox-label">لوگو</span></span></label></div>
                                <div className="checkbox"><label className="checkbox-wrapper"><input type="checkbox" className="checkbox-input"/><span className="checkbox-tile"><span className="checkbox-icon"><img src={APP_PATH + "images/big-brochure.svg"} /></span><span className="checkbox-label">کاتالوگ</span></span></label></div>
                                <div className="checkbox"><label className="checkbox-wrapper"><input type="checkbox" className="checkbox-input"/><span className="checkbox-tile"><span className="checkbox-icon"><img src={APP_PATH + "images/credit-card.svg"} /></span><span className="checkbox-label">کارت ویزیت</span></span></label></div>
                                <div className="checkbox"><label className="checkbox-wrapper"><input type="checkbox" className="checkbox-input"/><span className="checkbox-tile"><span className="checkbox-icon"><img src={APP_PATH + "images/paper.svg"} /></span><span className="checkbox-label">سربرگ</span></span></label></div>
                                <div className="checkbox"><label className="checkbox-wrapper"><input type="checkbox" className="checkbox-input"/><span className="checkbox-tile"><span className="checkbox-icon"><img src={APP_PATH + "images/office-tools.svg"} /></span><span className="checkbox-label">ست اداری</span></span></label></div>
                            </div>
                            <div className="form-group"><textarea name="fast-order-description" cols="30" rows="10" className="form-control" placeholder="توضیحات"></textarea></div>
                            <button type="submit" className="btn">ثبت سفارش</button>
                        </form>
                    </div>
                </div>
            </div>
        );
    }
}

export default FastOrder;   