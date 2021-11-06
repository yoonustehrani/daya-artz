import React, { Component } from 'react';
import axios from 'axios';
import Activity from '../Layout/components/Activity';
// custom components
import FactorsGuide from './components/FactorsGuide';
import FinanceItem from './components/FinanceItem';
import QuickAccess from './components/QuickAccess';

class Finance extends Component {
    state = {
        loading: false, // sets to true after make the get requests
        finance_info: [
            {
                title: "مجموع سفارشات",
                count: 40,
                last_title: "تاریخ ثبت آخرین سفارش",
                last_date: "1400/08/09",
                icon: "fas fa-scroll"
            },
            {
                title: "فاکتور های پرداخت شده",
                count: 25,
                last_title: "تاریخ آخرین سفارش پرداخت شده",
                last_date: "1400/08/09",
                icon: "fas fa-handshake"
            },
            {
                title: "فاکتور های پیش پرداختی",
                count: 10,
                last_title: "تاریخ آخرین پیش پرداختی",
                last_date: "1400/08/09",
                icon: "fas fa-receipt"
            },
            {
                title: "فاکتور های پرداخت نشده",
                count: 5,
                last_title: "تاریخ آخرین فاکتور پرداخت نشده",
                last_date: "1400/08/09",
                icon: "fas fa-hand-holding-usd"
            },
        ]
    }

    componentDidMount() {
        document.title = "امور مالی - آمار کلی"
        // axios.get('').then(res => {
        //     let { data } = res
        //     this.setState({
        //         finance_info: data,
        //         loading: false
        //     })
        // })
    }
    
    render() {
        let { finance_info, loading } = this.state
        return (
            <div>
                <FactorsGuide/>
                <div className="finance-info-section">
                    <div className="finance-items-container">
                        { loading ? <Activity/> :
                          finance_info && finance_info.length > 0 &&
                          finance_info.map((item, i) => (
                              <FinanceItem key={i} {...item} />
                          ))
                        }
                    </div>
                    <QuickAccess />
                </div>
            </div>
        );
    }
}

export default Finance;