import React, { Component } from 'react';

class OrderItem extends Component {
    render() {
        let { title, type, status, created_at, due_date } = this.props
        return (
            <div>
                <div className="order-title">
                    <img src={APP_PATH + 'images/brand.svg'} />
                    <h4>{title}</h4>
                </div>
                <ul className="order-details">
                    <li>وضعیت: <span>{status}</span></li>
                    <li>تاریخ ثبت سفارش: <span>{created_at}</span></li>
                    <li>{due_date} روز تا پایان پروژه</li>
                </ul>
                <span className={status}>در حال انجام</span>
            </div>
        )
    }
}

export default OrderItem;