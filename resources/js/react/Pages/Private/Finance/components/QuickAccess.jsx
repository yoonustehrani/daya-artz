import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class QuickAccess extends Component {
    render() {
        return (
            <div className="finance-quick-buttons">
                <div>
                    <h4>ثبت سفارش جدید</h4>
                    <span><i className="fas fa-cart-plus"></i></span>                            
                    <Link to="#start-order" className="badge badge-pill purple-pill">شروع سفارش</Link>
                </div>
                <div>
                    <div>
                        <h4>تصویه بدهی ها</h4>
                        <Link to="#pay" className="badge badge-pill purple-pill">تصویه حساب</Link>
                    </div>
                    <div>
                        <h4>پیش پرداخت ها</h4>
                        <Link to="#pay" className="badge badge-pill purple-pill">پیش پرداخت ها</Link>
                    </div>
                </div>
            </div>
        );
    }
}

export default QuickAccess;