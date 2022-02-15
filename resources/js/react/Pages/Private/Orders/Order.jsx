import React, { Component } from 'react';
// custom components
import FilterBar from './components/FlterBar';
import OrderInfo from './components/OrderInfo';
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
            items: []
        }
        this.http = useHttpService(`/userarea/orders/`)
    }

    onFilterClick = (newFilter) => {
        $("#no-item-elem").remove()
        this.setState({
            filter: newFilter
        }, () => {
            let noItem = true
            $(".order-items-container").children().each((i, elem) => {
                if (!$(elem).hasClass("d-none")) {
                    console.log(`elem ${i} is not none`);
                    return noItem = false
                }
            })
            console.log(React.createElement("h1", {}, "hello"))
            noItem ? $('#order-container').append(React.createElement("h1", {}, "hello")) : null
        })
    }

    loadOrder = async () => {
        let { orderId } = this.props.params
        let newState = {};
        const response = await this.http.get(orderId)
        if (response.okay) {
            let {order, items} = response
            newState = {order, items}
            document.title += ` ${order.code}`
        }
        this.setState({loading: false, ...newState})
    }
    componentDidMount() {
        document.title = `مشاهده سفارش`
        this.setState({loading: true}, this.loadOrder)
    }
    render() {
        let { loading, items, order, filter } = this.state
        return (
            <div id='order-container'>
                <OrderInfo {...order} />
                <FilterBar onFilterClick={this.onFilterClick} />
                {
                    loading ? <Activity/>
                    : items && items.length > 0
                    ? <div className="order-items-container">
                        {items.length > 0 && items.map((item, i) => (
                            <OrderItem key={item.id} filter={filter} {...item} />
                        ))}
                    </div>
                    : <NoItem/>
                }
            </div>
        );
    }
}

export default Order;