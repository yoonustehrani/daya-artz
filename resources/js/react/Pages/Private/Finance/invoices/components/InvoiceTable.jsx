import React, { Component } from 'react';
import axios from 'axios';
import Activity from '../../../Layout/components/Activity'
import InvoiceHead from './InvoiceHead';
import InvoiceRow from './InvoiceRow';

class InvoiceTable extends Component {
    state = {
        invoices: [
            {
                title: "لوگو (تصویری)",
                price: "3,000,000",
                pre_pay: "1,000,000",
                debt: "2,000,000",
                created_at: "1400/08/10",
                details: "1 عدد اتود + 1 عدد ادیت",
                color: "bg-light-peach"
            },
            {
                title: "لوگو (تصویری)",
                price: "3,000,000",
                pre_pay: "1,000,000",
                debt: "2,000,000",
                created_at: "1400/08/10",
                details: "1 عدد اتود + 1 عدد ادیت",
                color: 'bg-light-eggplant'
            },
            {
                title: "لوگو (تصویری)",
                price: "3,000,000",
                pre_pay: "1,000,000",
                debt: "2,000,000",
                created_at: "1400/08/10",
                details: "1 عدد اتود + 1 عدد ادیت",
                color: "bg-light-green"
            }
        ],
        loading: false
    }
    
    componentDidMount() {
        // axios.get('').then(res => {
        //     let { data } = res
        //     this.setState({
        //         invoices: data,
        //         loading: false
        //     })
        // })
    }
    
    render() {
        let { invoices, loading } = this.state
        return (
            loading ? <Activity/> :
            invoices && invoices.length > 0 ?
            <table className="table table-striped table-responsive table-bordered invoice-table">
                <InvoiceHead />
                <tbody>
                    {
                        invoices.map((invoice, i) => (
                            <InvoiceRow key={i} {...invoice} />
                        ))
                    }
                </tbody>
            </table>
            : <div className="activity-container alert alert-light">موردی برای نمایش وجود ندارد</div>
        );
    }
}

export default InvoiceTable;