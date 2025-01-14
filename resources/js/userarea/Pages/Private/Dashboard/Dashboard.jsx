import React, { Component } from 'react';
import { connect } from 'react-redux';
import { useHttpService } from '../../../hooks'
// components
const BottomItem = React.lazy(() => import('./components/BottomItem'));
const MiddleItem = React.lazy(() => import('./components/MiddleItem'));
const TopItem    = React.lazy(() => import('./components/TopItem'));

class Dashboard extends Component {
    constructor(props) {
        super(props);
        this.http = useHttpService('/userarea/stats')
        this.state = {
            statistics: {
                invoices_count: false,
                orders_count: false,
                tickets_count: false,
                orders: {}
            },
            recent_orders: [],
            recent_pays: [],
            recent_notifications: []
        }
    }

    loadStats = async () => {
        const [general, orders, latest] = await Promise.all([
            this.http.get('/general'),
            this.http.get('/orders'),
            this.http.get('/latest')
        ]);
        this.setState(prev => ({
            statistics: {...prev.statistics, ...general, orders: orders},
            recent_orders: [...latest.orders.map(x => ({text: x.text, href: `/orders/${x.id}`}))],
            recent_pays: [...latest.transactions.map(x => ({text: x.text, href: `/finance/transactions`}))],
            recent_notifications: latest.notifications.map(x => ({text: x.data.title, href: '#'}))
        }))
    }

    componentDidMount() {
        document.title = "داشبورد"
        this.loadStats()
    }

    render() {
        let { statistics, recent_orders, recent_pays, recent_notifications } = this.state
        let components = {top_items: TopItem, middle_items: MiddleItem, bottom_items: BottomItem}
        let dashboard_items = {
            top_items: [
                {
                    title: "سفارش در حال انجام",
                    number: statistics.orders_count,
                    icon: "fas fa-clipboard-list",
                    buttons: [
                        {title: "لیست سفارشات", href: "/orders"},
                        {title: "سفارش جدید", href: "#special-order"}
                    ]
                },
                {
                    title: "فاکتور پرداخت نشده",
                    number: statistics.invoices_count,
                    icon: "fas fa-file-invoice-dollar",
                    buttons: [
                        {title: "پرداخت فاکتور ها", href: "#factors_pay"},
                        {title: "پیش فاکتور ها", href: "/finance/invoices"},
                        {title: "فاکتور ها", href: "/finance/invoices?active"}
                    ]
                },
                {
                    title: "تیکت های در حال بررسی",
                    number: statistics.tickets_count,
                    icon: "fas fa-headset",
                    buttons: [
                        {title: "تیکت جدید", href: "/tickets/new"},
                        {title: "لیست تیکت ها", href: "/tickets"}
                    ]
                }
            ],
            middle_items: [
                {title: "سفارشات تکمیل شده", number: statistics.orders.completed},
                {title: "سفارشات در انتظار تایید", number: statistics.orders.awaiting},
                {title: "سفارشات پیش پرداخت شده", number: statistics.orders.prepaid}
            ],
            bottom_items: [
                {title: "سفارشات اخیر", items: recent_orders},
                {title: "پرداخت های اخیر", items: recent_pays},
                {title: "آخرین پیام ها", items: recent_notifications}
            ]
        }
        return (
            <div className="dashboard-container">
                {Object.keys(dashboard_items).map((key, i) => (
                    dashboard_items[key].map((item, index) => (
                        React.createElement(components[key], {key: index, ...item})
                    ))
                ))}
            </div>
        )
    }
}

const mapStateToProps = (state) => ({
    user: state.auth.user
})
export default connect(mapStateToProps)(Dashboard);