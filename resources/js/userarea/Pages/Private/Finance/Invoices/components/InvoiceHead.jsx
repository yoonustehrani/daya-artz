import React, { Component } from 'react';

class InvoiceHead extends Component {
    render() {
        return (
            <thead>
                <tr>
                    <th scope="col">عنوان سفارش</th>
                    <th scope="col">مبلغ کل سفارش</th>
                    <th scope="col">پیش پرداخت</th>
                    <th scope="col">مبلغ بدهکاری</th>
                    <th scope="col">تاریخ ثبت سفارش</th>
                    <th scope="col">توضیحات</th>
                </tr>
            </thead>
        );
    }
}

export default InvoiceHead;