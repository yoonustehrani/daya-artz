import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class sidebar extends Component {
    render() {
        return (
            <div id="m-menu" className="user-area-sidebar d-none d-md-inline-block">
                <i id="menu-close" className="fas fa-times float-right d-md-none"></i>
                <div className="user-info">
                    <div className="user-avatar"><img src={`${APP_PATH}images/user-avatar.png`} alt="user-avatar"/></div>
                    <p>دایا | daya</p>
                    <span>شرکت DAYA ARTZ</span>
                </div>
                <ul className="menu-items-container p-0">
                    <li>
                        <Link to="/dashboard" className="link"><i className="fas fa-columns"></i>داشبورد</Link>
                    </li>
                    <li className="has-sub">
                        <a to="#profile"><i className="fas fa-id-card"></i>مشخصات مشتری</a>
                        <ul className="submenu-m">
                            <li><Link to="/brandInfo" className="link">اطلاعات برند/شرکت</Link></li>
                            <li><Link to="/registerInfo" className="link">اطلاعات ثبت نام</Link></li>
                        </ul>
                    </li>
                    <li className="has-sub">
                        <a href="#orders"><i className="fas fa-hand-pointer"></i>سفارشات</a>
                        <ul className="submenu-m">
                            <li>
                                <Link to="/orders" className="link">لیست سفارش ها</Link>
                            </li>
                            <li>
                                <Link to="/orders/new" className="link">سفارش جدید</Link>
                            </li>
                        </ul>
                    </li>
                    <li className="has-sub">
                        <a to="#finance"><i className="fas fa-hand-holding-usd"></i>امور مالی</a>
                        <ul className="submenu-m">
                            <li>
                                <Link to="/finance" className="link">آمار کلی</Link>
                            </li>
                            <li>
                                <Link to="/finance/invoices" className="link">فاکتور ها</Link>
                            </li>
                            <li>
                                <Link to="finance/preInvoices" className="link">پیش فاکتور ها</Link>
                            </li>
                        </ul>
                    </li>
                    <li className="has-sub">
                        <a to="#"><i className="fas fa-headset"></i>پشتیبانی</a>
                        <ul className="submenu-m">
                            <li>
                                <Link to="/ticekts/new" className="link">درخواست های پشتیبانی</Link>
                            </li>
                            <li>
                                <Link to="/ticekts" className="link">ثبت درخواست پشتیبانی</Link>
                            </li>
                            <li>
                                <Link to="/tickets/faq" className="link">سوالات متداول</Link>
                            </li>
                        </ul>
                    </li>
                </ul>
                <a href={APP_PATH} className="home-link"><i className="fas fa-link"></i> http://dayaartz.com</a>
            </div>
        );
    }
}

export default sidebar;