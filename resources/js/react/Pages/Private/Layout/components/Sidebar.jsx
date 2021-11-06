import React, { Component } from 'react';
import { connect } from 'react-redux';
import { Link } from 'react-router-dom';
import { logoutUser } from '../../../../redux/actions'

class Sidebar extends Component {
    render() {
        let { name, company } = this.props.user
        return (
            <div id="m-menu" className="user-area-sidebar d-none d-md-inline-block">
                <i id="menu-close" className="fas fa-times float-right d-md-none"></i>
                <div className="user-info">
                    <div className="user-avatar"><img src={`${APP_PATH}images/user-avatar.png`} alt="user-avatar"/></div>
                    {name&&<p>{name}</p>}
                    {company&&company.title&&<span>{company.title}</span>}
                </div>
                <ul className="menu-items-container p-0">
                    <li>
                        <Link to="/dashboard" className="link"><i className="fas fa-columns"></i>داشبورد</Link>
                    </li>
                    <li className="has-sub">
                        <a to="#profile"><i className="fas fa-id-card"></i>حساب کاربری</a>
                        <ul className="submenu-m">
                            <li><Link to="/registerInfo" className="link">اطلاعات فردی</Link></li>
                            <li><Link to="/brandInfo" className="link">مشخصات کسب و کار</Link></li>
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
                                <Link to="/finance/pre_invoices" className="link">پیش فاکتور ها</Link>
                            </li>
                            <li>
                                <Link to="/finance/bills" className="link">صورت حساب ها</Link>
                            </li>
                            <li>
                                <Link to="/finance/transactions" className="link">تراکنش ها</Link>
                            </li>
                            <li>
                                <Link to="/finance/discounts" className="link">کوپن تخفیف</Link>
                            </li>
                        </ul>
                    </li>
                    <li className="has-sub">
                        <a to="#tickets"><i className="fas fa-headset"></i>پشتیبانی</a>
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
                    <li className="has-sub">
                        <a href="#contracts"><i className="fas fa-file-signature"></i> قرارداد ها</a>
                        <ul className="submenu-m">
                            <li>
                                <Link to="/contracts" className="link">قرارداد های من</Link>
                            </li>
                            <li>
                                <Link to="/contract_sample" className="link">نمونه قرارداد ها</Link>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a onClick={() => this.props.dispatch(logoutUser())} href="#logout"><i className="fas fa-power-off"></i>خروج</a>
                    </li>
                </ul>
                <a href={APP_PATH} className="home-link"><i className="fas fa-link"></i> http://dayaartz.com</a>
            </div>
        );
    }
}

const mapStateToProps = (state) => ({
    user: state.auth.user
})

export default connect(mapStateToProps)(Sidebar);