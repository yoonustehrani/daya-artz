import React, { Component } from 'react';

class ServiceOrderItem extends Component {
    render() {
        let { service_title, icon } = this.props
        return (
            <div className='service-order-item square'>
                <div>
                    <span className="back-aqua service-order-item-icon"><i className={icon}></i></span>
                    <p className="service-order-item-title">{service_title}</p>
                </div>
            </div>
        );
    }
}

export default ServiceOrderItem;