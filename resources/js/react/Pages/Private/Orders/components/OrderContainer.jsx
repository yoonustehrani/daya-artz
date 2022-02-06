import React, { Component } from 'react';
import { Link, useHistory } from 'react-router-dom';
import ServiceOrderItem from './ServiceOrdertem';
import moment from 'moment-jalaali';

const OrderContainer = ({order_items, created_at, id}) => {
    let history = useHistory()
    return (
        <div className="order-box-bg">
            <div className='order-box'>
                <span className="order-date">{moment(created_at).format("jYYYY/jMM/jDD")}</span>
                <div className="service-order-items-container">
                    {order_items.map((item, i) => (
                        <ServiceOrderItem {...item} key={i} />
                    ))}
                </div>
                <div className="w-100 text-center mt-3"><button className="btn btn-light" onClick={() => history.push(`/orders/${id}`, {order_id: id})}>اطلاعات بیشتر</button></div>
            </div>
        </div>
    );
}

export default OrderContainer;