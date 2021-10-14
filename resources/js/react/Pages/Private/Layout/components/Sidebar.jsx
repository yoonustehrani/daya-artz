import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class sidebar extends Component {
    render() {
        return (
            <div className="user-area-sidebar">
                <div className="user-info">
                    <div className="user-avatar"><img src={`${APP_PATH}images/user-avatar.png`} alt="user-avatar"/></div>
                    <p>دایا | daya</p>
                    <span>شرکت DAYA ARTZ</span>
                </div>
                <ul className="menu-items-container p-0">
                    <li>
                        <Link to="/dashboard"><i className="fas fa-columns"></i>داشبورد</Link>
                    </li>
                    <li>
                        <Link to="/profile"><i className="fas fa-id-card"></i>مشخصات مشتری</Link>
                    </li>
                    <li>
                        <Link to="/orders"><i className="fas fa-hand-pointer"></i>پیگیری سفارشات</Link>
                    </li>
                    <li>
                        <Link to="/finance"><i className="fas fa-hand-holding-usd"></i>امور مالی</Link>
                    </li>
                    <li>
                        <Link to="/tickets"><i className="fas fa-headset"></i>پشتیبانی</Link>
                    </li>
                </ul>
                <a href={APP_PATH} className="home-link"><i className="fas fa-link"></i> http://dayaartz.com</a>
            </div>
        );
    }
}

export default sidebar;