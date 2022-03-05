import React, { Component } from 'react'
import { useHttpService } from '../../../hooks'

export default class OrderItemPage extends Component {
    constructor(props) {
        super(props)
        this.state = {
            orderItem: null,
            loading: true
        }
        this.http = useHttpService('/userarea/')
    }
    componentDidMount() {
        this.loadItem()
    }
    loadItem = async () => {
        let {orderId, itemId} = this.props.params
        const response = await this.http.get(`orders/${orderId}/items/${itemId}`)
        console.log(response);
    }
    render() {
        return (
            <div>OrderItemPage</div>
        )
    }
}