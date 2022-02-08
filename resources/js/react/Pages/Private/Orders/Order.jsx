import React, { Component } from 'react';
// custom components
import FilterBar from './components/FlterBar';
import OrderItem from './components/OrderItem';
import Activity from '../Layout/components/Activity';
import NoItem from '../Layout/components/NoItem';
import { useHttpService } from '../../../hooks';

class Order extends Component {
    constructor(props) {
        super(props)
        this.state = {
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
        this.http = useHttpService(`/userarea/orders/`)
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
        let { orderId } = this.props.params;
        document.title = `مشاهده سفارش`
        const response = this.http.get(orderId)
        console.log(response);
        // if (response.) {
            
        // }
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
                    : <NoItem/>
                }            
            </div>
        );
    }
}

export default Order;