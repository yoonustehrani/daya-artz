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
            order: null,
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
    loadOrder = async () => {
        let { orderId } = this.props.params
        let order = null
        const response = await this.http.get(orderId)
        if (response.okay) {
            order = response.order
            document.title += ` ${order.code}`
        }
        this.setState({loading: false, order})
    }
    componentDidMount() {
        document.title = `مشاهده سفارش`
        this.setState({loading: true}, this.loadOrder)
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