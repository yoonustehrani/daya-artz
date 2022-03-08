import React, { Component } from 'react';
// custom components
import FilterBar from './components/FilterBar';
import OrderInfo from './components/OrderInfo';
import OrderItem from './components/OrderItem';
import Activity from '../Layout/components/Activity';
import NoItem from '../Layout/components/NoItem';
import { useHttpService } from '../../../hooks';
import { Link } from 'react-router-dom';

class Order extends Component {
    constructor(props) {
        super(props)
        this.state = {
            loading: false,
            filter: "all",
            statuses: null,
            order: null,
            items: [],
            noFilteredItem: false
        }
        this.http = useHttpService(`/userarea/orders/`)
    }

    onFilterClick = (e) => {
        let {value} = e.target;
        if (value) {
            this.setState({
                filter: value
            })
        }
    }

    loadOrder = async () => {
        let { orderId } = this.props.params
        let newState = {};
        const response = await this.http.get(orderId)
        if (response.okay) {
            let {order, items, statuses} = response
            newState = {order, items, statuses: {all: "همه سفارشات", ...statuses}}
            document.title += ` ${order.code}`
        }
        this.setState({loading: false, ...newState})
    }
    filteredItems = () => {
        let {items, filter} = this.state
        return filter === 'all' 
            ? items
            : this.state.items.filter(j => j.status && j.status === filter)
    }
    componentDidMount() {
        document.title = `مشاهده سفارش`
        this.setState({loading: true}, this.loadOrder)
    }
    render() {
        let { loading, items, order, filter, noFilteredItem, statuses } = this.state
        return (
            <div id='order-container'>
                <OrderInfo {...order} />
                {statuses && <FilterBar onFilterClick={this.onFilterClick} current={filter} filters={statuses}/>}
                {
                    loading ? <Activity/>
                    : items && items.length > 0
                    ? <div className="order-items-container">
                        {items.length > 0 && this.filteredItems().map((item, i) => (
                            <Link to={`/orders/${order.id}/items/${item.id}`}>
                                <OrderItem key={item.id} statusName={statuses[item.status] ?? ''} filter={filter} {...item} />
                            </Link>
                        ))}
                    </div>
                    : <NoItem/>
                }
                {noFilteredItem&&<NoItem />}
            </div>
        );
    }
}

export default Order;