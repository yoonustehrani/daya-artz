import React, { Component } from 'react';
// custom components
import Loading from '../Layout/components/Loading';
import NoItem from '../Layout/components/NoItem';
import OrderContainer from './components/OrderContainer'
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
    loadOrders = (customUrl = null) => {
        this.setState({
            loading: true,
        }, async () => {
            let url = customUrl ?? ''
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
        this.loadOrders()
    }
    render() {
        let { loading, orders, paginateInfo } = this.state
        return (
            <div>
                {
                    loading ? <Loading/>
                    : orders && orders.length > 0
                    ? <>
                        <div className="orders-container">
                            {orders.map((order, i) => <OrderContainer key={order.id} {...order} />)}
                        </div>
                        {paginateInfo && <Paginate {...paginateInfo} next_page_handler={this.handlePageChange.bind(this)} prev_page_handler={this.handlePageChange.bind(this, false)} />}
                      </>                        
                    : <NoItem/>
                }
            </div>
        );
    }
}

export default Orders;