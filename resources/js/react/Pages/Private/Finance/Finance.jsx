import React, { Component } from 'react';
import { useHttpService } from '../../../hooks';
import Activity from '../Layout/components/Activity';
import Loading from '../Layout/components/Loading';
// custom components
import FactorsGuide from './components/FactorsGuide';
import FinanceItem from './components/FinanceItem';
import QuickAccess from './components/QuickAccess';

class Finance extends Component {
    constructor(props) {
        super(props)
        this.state = {
            loading: true,
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
                // {
                //     title: "فاکتور های پیش پرداختی",
                //     count: 10,
                //     last_title: "تاریخ آخرین پیش پرداختی",
                //     last_date: "1400/08/09",
                //     icon: "fas fa-receipt"
                // },
                {
                    title: "فاکتور های پرداخت نشده",
                    count: 5,
                    last_title: "تاریخ آخرین فاکتور پرداخت نشده",
                    last_date: "1400/08/09",
                    icon: "fas fa-hand-holding-usd"
                },
            ]
        }
    }

    loadStats = async () => {
        this.http.get('/').then(response => {
            if (response.okay) {
                
            }
        })
    }

    componentDidMount() {
        document.title = "امور مالی - آمار کلی"
        this.http = useHttpService("/userarea/stats/finance")
        this.loadStats()
    }
    
    render() {
        let { finance_info, loading } = this.state
        return (
            <div>
                <FactorsGuide/>
                <div className="finance-info-section">
                    <div className="finance-items-container">
                        { loading
                            ? <Loading color="#333333"/>
                            : finance_info && finance_info.length > 0 && finance_info.map((item, i) => <FinanceItem key={i} {...item} />)
                        }
                    </div>
                    <QuickAccess />
                </div>
            </div>
        );
    }
}

export default Finance;