import React, { Component } from 'react';

class InvoiceRow extends Component {
    render() {
        let { title, price, pre_pay, debt, created_at, details, color } = this.props, cells = [title, price, pre_pay, debt, created_at, details]
        return (
            <tr className={color}>
                {cells && cells.length > 0 && cells.map((cell, i) => (
                    <td key={i}>{cell}</td>
                ))}
            </tr>
        );
    }
}

export default InvoiceRow;