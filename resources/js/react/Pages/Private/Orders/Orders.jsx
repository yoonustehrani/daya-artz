import React, { Component } from 'react';
import axios from 'axios';
// custom components
import FilterBar from './components/FlterBar';
import OrderItem from './components/OrderItem';
import Activity from '../Layout/components/Activity';

class Orders extends Component {
    state = {
        loading: false,
        filter: "all",
        items: [
            {
                title: "لوگو تصویری",
                type: "logo",
                status: 'in_progress',
                created_at: "1400/10/14",
                due_date: "5"
            },
            {
                title: "لوگو تصویری",
                type: "logo",
                status: 'in_progress',
                created_at: "1400/10/14",
                due_date: "5"
            },
            {
                title: "لوگو تصویری",
                type: "logo",
                status: 'in_progress',
                created_at: "1400/10/14",
                due_date: "5"
            },
        ]
    }

    sendFilterReq = () => {
        let { filter } = this.state
        // this.setState({loading: true}, () => {
        //     axios.get(`?filter${filter}`).then(res => {
        //         let { data } = res
        //         this.setState({
        //             items: data,
        //             loading: false
        //         })
        //     })
        // })
    }

    onFilterClick = (newFilter) => {
        this.setState({
            filter: newFilter
        }, () => {
            this.sendFilterReq()
        })
    }

    componentDidMount() {
        document.title = "سفارشات"
        this.sendFilterReq()
    }
    
    
    render() {
        let { loading, items } = this.state
        return (
            <div>
                <FilterBar onFilterClick={this.onFilterClick} />
                {
                    loading ? <Activity/>
                    : items && items.length > 0
                    ? <div className="order-items-container">
                        {items.map((item, i) => (
                            <OrderItem key={i} {...item} />
                        ))}
                    </div>
                    : <div className="activity-container alert alert-light">موردی برای نمایش وجود ندارد</div>
                }
            </div>
        );
    }
}

export default Orders;