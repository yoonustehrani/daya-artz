import React, { Component } from 'react';

class FinanceItem extends Component {
    render() {
        let { title, count, icon, last_title, last_date } = this.props
        return (
            <div className="finance-item">
                <span className="top-item-icon"><i className={icon}></i></span>
                <div className="top-item-info">
                    <span>{count}</span>
                    <h4>{title}</h4>
                    <span>{last_title}: {last_date}</span>
                </div>
            </div>
        );
    }
}

export default FinanceItem;