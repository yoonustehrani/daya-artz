import React, { Component } from 'react';
// custom components

class Invoice extends Component {
    render() {
        return (
            <div className='factor-container p-3 p-md-4 '>
                <div className="factor-first-section">
                    {/* <span className="factor-date mb-3">9 آذر 1400</span> */}
                    <div>
                        <ul>
                            <li><span>فاکتور پیش پرداخت برای:</span> آقا / خانم نخعی</li>
                            <li><span>نام شرکت:</span> خایه های امام باقر</li>
                            <li><span>آدرس شرکت:</span> خیابان سجاد - سجاد 21 - پلاک 124</li>
                            <li className='contact-info'>amir@gmail.com</li>
                            <li className='contact-info'>09012032190</li>
                        </ul>
                        <ul>
                            <li><span>شماره فاکتور:</span>13895874</li>
                            <li><span>شماره سفارش:</span>319987</li>
                            <li><span>تاریخ فاکتور:</span>1400/12/23</li>
                            <li className='alert alert-danger'>مبلغ سر رسید: 5,280,000 تومان</li>
                        </ul>
                    </div>
                </div>
                <div className="float-left w-100 table-responsive mt-4">
                    <h3 className='factor-section-title'>آیتم های سفارش</h3>
                    <table className="table">
                        <thead>
                            <tr>
                                <th scope='col'>عنوان سفارش</th>
                                <th scope='col'>قیمت</th>
                                <th scope='col'>تخفیف</th>
                                <th scope='col'>مبلغ نهایی</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope='row'>راحی لوگو تصویری</th>
                                <td>2,800,000 تومان</td>
                                <td>500,000 تومان</td>
                                <td>2,300,000 تومان</td>
                            </tr>
                            <tr>
                                <th scope='row'>طراحی بروشور برای گی</th>
                                <td>2,800,000 تومان</td>
                                <td>500,000 تومان</td>
                                <td>2,300,000 تومان</td>
                            </tr>
                            <tr>
                                <th scope='row'>گایش امام حسین با دیلدو</th>
                                <td>2,800,000 تومان</td>
                                <td>500,000 تومان</td>
                                <td>2,300,000 تومان</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div className="float-left w-100 table-responsive factor-info mt-4">
                    <h3 className='factor-section-title'>هزینه کلی</h3>
                    <table className="table">
                        <tbody>
                            <tr>
                                <th scope='row'>مبلغ کل سفارش</th>
                                <td>10,000,000 تومان</td>
                            </tr>
                            <tr>
                                <th scope='row'>مالیات</th>
                                <td>0</td>
                            </tr>
                            <tr>
                                <th scope='row'>تخفیف</th>
                                <td>500,000 تومان</td>
                            </tr>
                            <tr>
                                <th scope='row'>قابل پرداخت</th>
                                <td>9,500,000 تومان</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div className="float-left w-100 table-responsive mt-5">
                    <h3 className="factor-section-title">وضعیت پرداختی</h3>
                    <table className="table table-hover">
                        <thead>
                            <tr>
                                <th scope='col'>نوع</th>
                                <th scope='col'>شماره قبض</th>
                                <th scope='col'>عنوان</th>
                                <th scope='col'>مقدار</th>
                                <th scope='col'>وضعیت پرداخت</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope='row'>پیش پرداخت</th>
                                <td>31435</td>
                                <td>پیش پرداخت لوگوی تصویری</td>
                                <td>2,000,000 تومان</td>
                                <td>پرداخت شده <i className='far fa-check text-success'></i></td>
                            </tr>
                            <tr>
                                <th scope='row'>تسویه</th>
                                <td>31436</td>
                                <td>تسویه لوگوی تصویری</td>
                                <td>2,000,000 تومان</td>
                                <td><a href="#" className='btn btn-sm btn-primary'>پرداخت</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div className='float-left alert alert-light text-center mt-5 horizontal-center-left'>مهلت پرداخت تسویه فاکتور شما به شماره 425f45، تا تاریخ 1400/12/34 میباشد.</div>
            </div>
        );
    }
}

export default Invoice;