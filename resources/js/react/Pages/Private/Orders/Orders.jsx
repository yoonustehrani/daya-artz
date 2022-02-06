import React, { Component } from 'react';
import axios from 'axios';
// custom components
import Activity from '../Layout/components/Activity';
import NoItem from '../Layout/components/NoItem';
import OrderContainer from '../Orders/components/OrderContainer'
import Paginate from '../../../../components/Paginate';

class Orders extends Component {
    state = {
        loading: false,
        data: {}
    }

    getOrders = (page) => {
        // this.setState({
        //     loading: true,
        //     data: {}
        // }, () => {
        //     axios.get('orders api addres according to the give page index in the arguments').then(res => {
        //         let { data } = res
        //         this.setState({
        //             data: data,
        //             loading: false
        //         })
        //     })
        // })

        // the below code is just for testing the react without sending any requets. after making the api the above code will replace with the below one
        this.setState({
            loading: true,
            data: {}
        }, () => {
            console.log(`send get ajax to orders api at page ${page}`);
            setTimeout(() => {
                this.setState({
                    data: {
                        orders: [
                            {
                                order_items: [
                                    {service_title: "لوگو", icon: "fab fa-d-and-d"},
                                    {service_title: "سربرگ", icon: "fas fa-scroll"},
                                    {service_title: "اسلایدر", icon: "fas fa-image"},
                                    {service_title: "موزیک", icon: "fas fa-guitar"},
                                    {service_title: "لوگو", icon: "fab fa-d-and-d"},
                                    {service_title: "سربرگ", icon: "fas fa-scroll"},
                                    {service_title: "اسلایدر", icon: "fas fa-image"},
                                    {service_title: "موزیک", icon: "fas fa-guitar"},
                                ],
                                created_at: '2022/02/06 16:40',
                                id: "order-item"
                            },
                            {
                                order_items: [
                                    {service_title: "لوگو", icon: "fab fa-d-and-d"},
                                    {service_title: "سربرگ", icon: "fas fa-scroll"},
                                    {service_title: "اسلایدر", icon: "fas fa-image"},
                                    {service_title: "موزیک", icon: "fas fa-guitar"},
            
                                ],
                                created_at: '2022/02/06 16:40',
                                id: "order-item"
                            },
                            {
                                order_items: [
                                    {service_title: "لوگو", icon: "fab fa-d-and-d"},
            
                                ],
                                created_at: '2022/02/06 16:40',
                                id: "order-item"
                            },
                        ],
                        current_page_index: 1,
                        last_page_index: 10,
                    },
                    loading: false
                })
                console.log(`got the results and new data has been set`);
            }, 2000);
        })
    }

    componentDidMount() {
        document.title = "سفارشات"
        this.getOrders(1)
    }
    
    render() {
        let { loading, data } = this.state, { orders, current_page_index, last_page_index } = data
        return (
            <div>
                {
                    loading ? <Activity/>
                    : orders && orders.length > 0
                    ? <div className="orders-container">
                        {orders.map((order, i) => (
                            <OrderContainer key={i} {...order} />
                        ))}
                        <Paginate current_page_index={current_page_index} last_page_index={last_page_index} next_page_handler={() => this.getOrders(current_page_index += 1)} prev_page_handler={() => this.getOrders(current_page_index -= 1)} />
                    </div>
                    : <NoItem/>
                }
            </div>
        );
    }
}

export default Orders;