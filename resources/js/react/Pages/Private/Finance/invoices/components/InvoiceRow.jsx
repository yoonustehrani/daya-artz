import React, { Component } from 'react';

class InvoiceRow extends Component {
    render() {
        let { title, price, pre_pay, debt, created_at, details, color } = this.props
        return (
            <tr className={color}>
                <td>{title}</td>
                <td>{price}</td>
                <td>{pre_pay}</td>
                <td>{debt}</td>
                <td>{created_at}</td>
                <td>{details}</td>
            </tr>
        );
    }
}

export default InvoiceRow;