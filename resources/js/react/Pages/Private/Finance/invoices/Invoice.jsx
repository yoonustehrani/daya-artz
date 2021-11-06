import React, { Component } from 'react';
// custom components
import FactorsGuide from '../components/FactorsGuide'
import InvoiceTable from './components/InvoiceTable';

class Invoice extends Component {
    render() {
        return (
            <div>
                <FactorsGuide light={true}/>
                <InvoiceTable/>
            </div>
        );
    }
}

export default Invoice;