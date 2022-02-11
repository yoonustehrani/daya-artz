import React, { Component } from 'react';
// custom components
import Activity from '../Layout/components/Activity';
import NoItem from '../Layout/components/NoItem';
import OrderContainer from '../Orders/components/OrderContainer'
import Paginate from '../../../../components/Paginate';
import { useHttpService } from '../../../hooks';

class Orders extends Component {
    constructor(props) {
        super(props)
        this.state = {
            loading: false,
            orders: [],
            paginateInfo: null
        }
        this.http = useHttpService('/userarea/orders')
    }
    loadOrders = (customUrl = false) => {
        this.setState({
            loading: true,
        }, async () => {
            let url = customUrl ? customUrl : ''
            const response = await this.http.get(url)
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
    handlePageChange = (next = true) => {
        let {paginateInfo} = this.state
        if (paginateInfo) {
            let url = next ? paginateInfo.next_page_url : paginateInfo.prev_page_url
            this.loadOrders(url)
        }
    }
    componentDidMount() {
        document.title = "سفارشات"
        this.loadOrders()
    }
    render() {
        let { loading, orders, paginateInfo } = this.state
        return (
            <div>
                {
                    loading ? <Activity/>
                    : orders && orders.length > 0
                    ? <div className="orders-container">
                        {orders.map((order, i) => <OrderContainer key={order.id} {...order} />)}
                        {paginateInfo && <Paginate {...paginateInfo} next_page_handler={this.handlePageChange.bind(this)} prev_page_handler={this.handlePageChange.bind(this, false)} />}
                    </div>
                    : <NoItem/>
                }
            </div>
        );
    }
}

export default Orders;