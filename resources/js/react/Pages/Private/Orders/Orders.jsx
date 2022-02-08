import React, { Component } from 'react';
// custom components
import Activity from '../Layout/components/Activity';
import NoItem from '../Layout/components/NoItem';
import OrderContainer from '../Orders/components/OrderContainer'
import Paginate from '../../../../components/Paginate';
import { useHttpService } from '../../../hooks';

class Orders extends Component {
    state = {
        loading: false,
        orders: [],
        paginateInfo: null
    }
    loadOrders = () => {
        this.setState({
            loading: true,
        }, async () => {
            // let http = this.state.paginateInfo ?  : useHttpService()
            const response = await useHttpService('/userarea/orders').get('')
            if (response.data) {
                let {data, next_page_url, prev_page_url, current_page} = response
                this.setState({
                    loading: false,
                    orders: data,
                    paginateInfo: {
                        next_page_url,
                        prev_page_url,
                        current_page
                    }
                })
            }
        })
    }
    handleNextPage = () => {
        console.log("called next page handler");
    }
    prev_page_handler = () => {
        console.log("called prev page handler");
    }
    componentDidMount() {
        document.title = "سفارشات"
        this.loadOrders()
    }
    render() {
        let { loading, orders, paginateInfo } = this.state
        // { current_page_index, last_page_index } = data
        return (
            <div>
                {
                    loading ? <Activity/>
                    : orders && orders.length > 0
                    ? <div className="orders-container">
                        {orders.map((order, i) => (
                            <OrderContainer key={order.id} {...order} />
                        ))}
                        {paginateInfo ? <Paginate  {...paginateInfo} next_page_handler={() => this.handleNextPage()} prev_page_handler={() => this.handlePrevPage()} /> : null}
                    </div>
                    : <NoItem/>
                }
            </div>
        );
    }
}

export default Orders;