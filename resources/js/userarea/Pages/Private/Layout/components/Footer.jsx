import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class Footer extends Component {
    render() {
        return (
            <div className="section w-100 footer mt-5">
                <div className="footer-content w-100">
                    <div className="float-left col-12 text-center mb-5 mt-4 logo-container">
                        <img src={`${APP_PATH}images/daya-logo-circular.png`} alt="daya-logo" />
                        <p className="ml-2 text-light">DAYAARTZ</p>
                    </div>
                    <div className="col-12 float-left px-3 footer-info-container">
                        <div className="col-lg-3 col-md-6 col-12">
                            <p className="title">درباره ما</p>
                            <div><p>گروه طراحی دایا آرتز متشکل از تیمی با تجربه و حرفه ای در زمینه های طراحی گرافیـکی و تبلیغاتی در تلاش است بستر مناسبی را برای کسانی که نیازمند طراحی یا طراحی با کیفیت و در سطح بین المللی و همچنین درآمدزایی برای طراحان حرفه ای و درجه یک کشور ایران ایجاد سازد.</p></div>
                        </div>
                        <div className="col-lg-2 col-md-6 col-12">
                            <p className="title">لینک های سریع</p>
                            <div>
                                <ul className="text-right p-0">
                                    <li><a href="#">حساب من</a></li>
                                    <li><a href="#">سفارش سریع</a></li>
                                    <li><a href="#">سفارش تخصصی</a></li>
                                    {/* <li><a href="#">راهنمای سفارشات</a></li> */}
                                    <li><a href={`${APP_PATH}/policy`}>شرایط و ضوابط</a></li>
                                    <li><a href="#">وبلاگ</a></li>
                                </ul>
                            </div>
                        </div>
                        <div className="col-lg-2 col-md-6 col-12">
                            <p className="title">پشتیبانی</p>
                            <div>
                                <ul className="text-right p-0 mb-4">
                                    <li><a href="#">تماس با ما</a></li>
                                    <li><Link to="/tickets/new">ارسال تیکت</Link></li>
                                </ul>
                                <img src={`${APP_PATH}images/gallery/zarin-paal.jpg`} alt="zarin-paal" className="float-right ml-2" />
                                <img src={`${APP_PATH}images/gallery/etemad-namad.png`} alt="etemead" className="float-right" />
                            </div>
                        </div>
                        <div className="col-lg-3 col-md-6 col-12">
                            <p className="title">دایا مجازی</p>
                            <div className="mb-4 social-media-rows">
                                <div className="social-media-container">
                                    <a href="https://instagram.com/dayaartz"><i className="fab fa-instagram"></i></a>
                                    <a href="https://t.me/dayaartz"><i className="fab fa-telegram-plane ml-4"></i></a>
                                </div>
                                <div className="social-media-container">
                                    <a href="https://linkedin.com/"><i className="fab fa-linkedin-in"></i></a>
                                    <a href="https://wa.me/+989016045025"><i className="fab fa-whatsapp ml-4"></i></a>
                                </div>
                            </div>
                            <p className="ltr m-text-center">
                                <i className="far fa-copyright"></i>
                                Sampi Group. All rights reserved
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Footer;