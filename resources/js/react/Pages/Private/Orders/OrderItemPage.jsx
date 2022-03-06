import React, { Component } from 'react'
import Loading from '../Layout/components/Loading'
import { useHttpService } from '../../../hooks'

export default class OrderItemPage extends Component {
    constructor(props) {
        super(props)
        this.state = {
            orderItem: null,
            loading: false
        }
        this.http = useHttpService('/userarea/')
    }
    componentDidMount() {
        this.loadItem()
    }
    loadItem = async () => {
        let {orderId, itemId} = this.props.params
        const response = await this.http.get(`orders/${orderId}/items/${itemId}`)
        console.log(response);
    }
    render() {
        let { loading } = this.state
        return (
            <div>
                {loading ? <Loading />
                : <>
                    <div className='order-item-header'>
                        <div className="order-item-header-title"><h4>سفارش لوگوی افتتاحیه رستوران احسان</h4></div>
                        <div className="progress">
                            <div className="progress-bar w-25" role="progressbar" aria-valuenow="25%" aria-valuemin="0%" area-valuemax="100%">25%</div>
                        </div>
                        {/* <span className='order-item-header-icon'><i className='far fa-drafting-compass'></i></span> */}
                    </div>
                    <div className='order-item-infos-container'>
                        <div className='order-item-section'>
                            <span className='order-item-section-icon'><i className='far fa-info-square'></i></span>
                            <ul className='order-item-list'>
                                <li>نوع طراحی: <span>طراحی لوگوی تصویری</span></li>
                                <li>سفارش: <span>#fs2l48fk</span></li>
                                <li></li>
                            </ul>
                        </div>
                        <div className='order-item-section'>
                            <span className='order-item-section-icon'><i className="far fa-spinner"></i></span>
                            <ul className='order-item-list'>
                                <li>وضعیت: <span>در دست طراحی</span></li>
                                <li>توضیحات: <span>در حال حاضر 2 اتود از 3 اتود درخواستی شما تکمیل شده.</span></li>
                            </ul>
                        </div>
                        <div className='order-item-section'>
                            <span className='order-item-section-icon'><i className="far fa-calendar-exclamation"></i></span>
                            <ul className='order-item-list'>
                                <li>موعد تحویل: <span>1400/12/24</span></li>
                                <li>تاریخ اتمام: <span>1401/1/2</span></li>
                            </ul>
                        </div>
                        <div className='order-item-section'>
                            <span className='order-item-section-icon'><i className="far fa-comment-alt-medical"></i></span>
                            <ul className='order-item-list'>
                                <li>پکیج مربوطه :<span>افتتاحیه رستوران</span></li>
                                <li>توضیحات پروژه :<span>این پروژه زیر نظر طراحان متخصص دایا در دست انجام است و دول اقا بزرگ من کوچیکه</span></li>
                            </ul>
                        </div>
                    </div>
                    <div className="order-item-progress-container level-4">
                        <div className='order-level-progress'>
                            <h4 className='order-level-title'>ثبت سفارش</h4>
                            <span className='order-level-circle'><i className='far fa-user-edit'></i></span>
                        </div>
                        <div className='order-level-progress'>
                            <h4 className='order-level-title'>تماس تلفنی</h4>
                            <span className='order-level-circle'><i className='far fa-phone-volume'></i></span>
                        </div>
                        <div className='order-level-progress'>
                            <h4 className='order-level-title'>پرداخت بیعانه</h4>
                            <span className='order-level-circle'><i className='far fa-credit-card'></i></span>
                        </div>
                        <div className='order-level-progress'>
                            <h4 className='order-level-title'>طراحی سفارش</h4>
                            <span className='order-level-circle'><i className='far fa-drafting-compass'></i></span>
                        </div>
                        <div className='order-level-progress'>
                            <h4 className='order-level-title'>تسویه و تحویل</h4>
                            <span className='order-level-circle'><i className='far fa-handshake'></i></span>
                        </div>
                    </div>
                    <div className="w-100 table-responsive">
                        <table className='table table-hover'>
                            <caption>تیکت های مرتبط به این سفارش</caption>
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>شماره تیکت</th>
                                    <th>عنوان تیکت</th>
                                    <th>بخش مربوطه</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ ایجاد</th>
                                    <th>تاریخ اتمام</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <td>#46753</td>
                                    <td>ویرایش</td>
                                    <td>امور طراحی</td>
                                    <td>بسته شده</td>
                                    <td>1400/12/5</td>
                                    <td>1400/12/12</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </> 
                }
            </div>
        )
    }
}