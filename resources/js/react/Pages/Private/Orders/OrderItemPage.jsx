import React, { Component } from 'react'

export default class OrderItemPage extends Component {
    constructor(props) {
        super(props)
        this.state = {
            orderItem: null,
            loading: true
        }
    }
    componentDidMount() {
        this.loadItem()
    }
    loadItem = async () => {
        let {orderId, itemId} = this.props.params
        console.log(itemId);
    }
    render() {
        return (
            <div>OrderItemPage</div>
        )
    }
}