import React, { Component } from 'react'
import Loading from '../Layout/components/Loading'
import { useHttpService, useJalaliDate } from '../../../hooks'
import { Link } from 'react-router-dom'
import { translate } from '../../../../helpers'

export default class OrderItemPage extends Component {
    constructor(props) {
        super(props)
        this.state = {
            orderItem: null,
            level: null,
            loading: true,
            tickets: []
        }
    }
    componentDidMount() {
        let {orderId} = this.props.params
        this.http = useHttpService(`/userarea/orders/${orderId}`)
        this.loadItem()
    }
    loadTickets = async () => {
        let {itemId} = this.props.params
        const response = await this.http.get(`/items/${itemId}/tickets`)
        let {tickets} = response
        this.setState({
            tickets: tickets ?? []
        })
    }

    onTicketClick = ticketId => this.props.history.push(`/tickets/${ticketId}`)

    loadItem = async () => {
        let {itemId} = this.props.params
        const response = await this.http.get(`/items/${itemId}`)
        this.loadTickets()
        this.setState({
            orderItem: response,
            loading: false
        }, () => {
            response.item.canceled ? null : this.getLevel()
        })
    }
    getLevel = () => {
        let { item, statuses } = this.state.orderItem, {status} = item, { normal, list } = statuses, level
        if (normal.indexOf(status) === -1) { // not unnormal procsess like suspended or editing
            let targetArray = list.slice(0, list.indexOf(status)).reverse()
            for (let i = 0; i < targetArray.length; i++ ) {
                let target_status = targetArray[i]
                if (normal.includes(target_status)) {
                    level = normal.indexOf(target_status) + 1
                    break
                }
            }
        } else { // normal proccess
            level = normal.indexOf(status) + 1            
        }
        this.setState({
            level: level,
        })
    }
    getPercent = (exact) => {
        let {level, orderItem} = this.state
        let percent = level * (100/orderItem.statuses.normal.length)
        return exact ? percent : Math.floor(percent)
    }
    render() {
        let { loading, orderItem, level } = this.state, { item, okay, order, statuses } = orderItem??{}
        return (
            <div>
                {loading ? <Loading />
                : <>
                    <div className='order-item-header'>
                        <div className="order-item-header-title"><h4>{item.title}</h4></div>
                        <div className="progress">
                            <div className={`progress-bar ${item.canceled&&"canceled"}`} style={{ width: `${this.getPercent(true)}%`}} role="progressbar" aria-valuenow={item.canceled ? "0%" : `${this.getPercent(true)}%`} aria-valuemin="0%" area-valuemax="100%">{item.canceled ? <span className='text-danger'>لغو شده <i className='far fa-times'></i></span> : `${this.getPercent()}%`}</div>
                        </div>
                    </div>
                    <div className='order-item-infos-container'>
                        <div className='order-item-section'>
                            <span className='order-item-section-icon'><i className='far fa-info-square'></i></span>
                            <ul className='order-item-list'>
                                <li>بسته یا خدمات مربوطه: <a href={item.service.uri}>{item.service.title}</a></li>
                                <li>کد سفارش: <Link to={`/orders/${order.id}`}>{order.code}</Link></li>
                                <li>شیوه ثبت: <span>{order.method}</span></li>
                            </ul>
                        </div>
                        <div className='order-item-section'>
                            <span className='order-item-section-icon'><i className="far fa-spinner"></i></span>
                            <ul className='order-item-list'>
                                <li>وضعیت: <span>{item.status_fa}</span></li>
                                <li>توضیحات: <span>{item.state_info}</span></li>
                            </ul>
                        </div>
                        <div className='order-item-section'>
                            <span className='order-item-section-icon'><i className="far fa-calendar-exclamation"></i></span>
                            <ul className='order-item-list'>
                                <li>موعد تحویل: <span>{item.due_date ? useJalaliDate(item.due_date).format("jYYYY/jM/jD dddd") : ""}</span></li>
                                <li>تاریخ اتمام: <span>{item.finished_at ? useJalaliDate(item.finished_at).format("jYYYY/jM/jD dddd") : ""}</span></li>
                            </ul>
                        </div>
                        <div className='order-item-section'>
                            <span className='order-item-section-icon'><i className="far fa-comment-alt-medical"></i></span>
                            <ul className='order-item-list'>
                                <li>طرح مربوطه: <span>نیاز به داینامیک سازی</span></li>
                                <li>توضیحات پروژه: {item.description}</li>
                            </ul>
                        </div>
                    </div>
                    <div className={`order-item-progress-container level-${level}`}>
                        {
                            statuses && statuses.normal.length > 0 ? statuses.normal.map((statuse, i) => (
                                <div key={i} className="order-level-progress">
                                    <h4 className='order-level-title'>{translate(statuse)}</h4>
                                    {!item.normal && i + 1 === level && <span className='badge badge-warning unnormal-status'>{item.status_fa}</span>}
                                    <span className='order-level-circle'><i className={`far ${statuse}`}></i></span>
                                </div>
                            )) : null
                        }
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
                                {this.state.tickets.map((ticket, i) => (
                                    <tr onClick={() => this.onTicketClick(ticket.id)}>
                                        <th>{i + 1}</th>
                                        <td>{ticket.tracking_code}</td>
                                        <td>{ticket.title}</td>
                                        <td>{ticket.department && ticket.department.name}</td>
                                        <td>{ticket.closed_at && "بسته شده"}</td>
                                        <td>{useJalaliDate(ticket.created_at).format()}</td>
                                        <td>{useJalaliDate(ticket.closed_at).format()}</td>
                                    </tr>
                                ))}
                            </tbody>
                        </table>
                    </div>
                </> 
                }
            </div>
        )
    }
}