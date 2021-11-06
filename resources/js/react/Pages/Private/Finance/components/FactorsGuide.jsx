import React, { Component } from 'react';

class FactorsGuide extends Component {
    render() {
        let { light } = this.props
        return (
            <nav className="orders-filter">
                <h4>وضعیت پرداختی سفارشات: </h4>
                <ul className="filter-items">
                    <li>فاکتور های پیش پرداختی <span className={`bg-${light ? "light-" : ""}peach`}></span></li>
                    <li>فاکتور های پرداخت نشده <span className={`bg-${light ? "light" :"horny"}-eggplant`}></span></li>
                    <li>فاکتور های پرداخت شده<span className={`bg-${light ? "light-" : ""}green`}></span></li>
                </ul>
            </nav>
        );
    }
}

export default FactorsGuide;