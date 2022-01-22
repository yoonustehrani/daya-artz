import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class Invoices extends Component {
    render() {
        return (
            <div>
                <Link to="/finance/invoices/1">فاکتور یک</Link>                
            </div>
        );
    }
}

export default Invoices;