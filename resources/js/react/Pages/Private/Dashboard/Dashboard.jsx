import React, { Component } from 'react';
import { connect } from 'react-redux';
// components
const BottomItem = React.lazy(() => import('./components/BottomItem'));
const MiddleItem = React.lazy(() => import('./components/MiddleItem'));
const TopItem    = React.lazy(() => import('./components/TopItem'));

class Dashboard extends Component {
    constructor(props) {
        super(props);
        this.state = {
            statistics: {
                inprogress_orders: 10,
                complted_orders: 25,
                waiting_orders: 25,
                prepaid_orders: 25,
                unpaid_factors: 5,
                inprogress_tickets: 0
            },
            recent_orders: [
                {title: "لوگو تایپ", href: "#"},
                {title: "کارت ویزیت", href: "#"}
            ],
            recent_pais: [],
            recent_messages: [
                {title: "سلام", href: "#"}
            ]
        }
    }

    componentDidMount() {
        document.title = "داشبورد"
    }

    render() {
        let components = {top_items: TopItem, middle_items: MiddleItem, bottom_items: BottomItem}
        let dashboard_items = {
            top_items: [
                {
                    title: "سفارش در حال انجام",
                    number: this.state.statistics.inprogress_orders,
                    icon: "fas fa-clipboard-list",
                    buttons: [
                        {title: "لیست سفارشات", href: "/orders"},
                        {title: "سفارش جدید", href: "#special-order"}
                    ]
                },
                {
                    title: "فاکتور پرداخت نشده",
                    number: this.state.statistics.unpaid_factors,
                    icon: "fas fa-file-invoice-dollar",
                    buttons: [
                        {title: "پرداخت فاکتور ها", href: "#factors_pay"},
                        {title: "پیش فاکتور ها", href: "/finance/invoices"},
                        {title: "فاکتور ها", href: "/finance/invoices?active"}
                    ]
                },
                {
                    title: "تیکت های در حال بررسی",
                    number: this.state.statistics.inprogress_tickets,
                    icon: "fas fa-headset",
                    buttons: [
                        {title: "تیکت جدید", href: "/tickets/new"},
                        {title: "لیست تیکت ها", href: "/tickets"}
                    ]
                }
            ],
            middle_items: [
                {title: "سفارشات تکمیل شده", number: this.state.statistics.complted_orders},
                {title: "سفارشات در انتظار تایید شما", number: this.state.statistics.waiting_orders},
                {title: "سفارشات پیش پرداخت شده", number: this.state.statistics.prepaid_orders}
            ],
            bottom_items: [
                {title: "سفارشات اخیر شما", items: this.state.recent_orders},
                {title: "پرداخت های اخیر شما", items: this.state.recent_pais},
                {title: "آخرین پیام ها", items: this.state.recent_messages}
            ]
        }
        return (
            <div className="dashboard-container">
                {Object.keys(dashboard_items).map((key, i) => (
                    <div className={key} key={i}>
                        {
                            dashboard_items[key].map((item, index) => (
                                React.createElement(components[key], {key: index, ...item})
                            ))
                        }
                    </div>
                ))}
            </div>
        )
    }
}

const mapStateToProps = (state) => ({
    user: state.auth.user
})

export default connect(mapStateToProps)(Dashboard);