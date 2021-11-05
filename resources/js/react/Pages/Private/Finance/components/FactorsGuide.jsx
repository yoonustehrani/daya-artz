import React, { Component } from 'react';

class FactorsGuide extends Component {
    render() {
        return (
            <nav className="orders-filter">
                <h4>وضعیت پرداختی سفارشات: </h4>
                <ul className="filter-items">
                    <li>فاکتور های پیش پرداختی <span className='bg-peach'></span></li>
                    <li>فاکتور های پرداخت نشده <span className="bg-horny-eggplant"></span></li>
                    <li>فاکتور های پرداخت شده<span className="bg-green"></span></li>
                </ul>
            </nav>
        );
    }
}

export default FactorsGuide;