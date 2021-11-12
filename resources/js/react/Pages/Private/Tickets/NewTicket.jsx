import React, { Component } from 'react';
import axios from 'axios';

class NewTicket extends Component {
    state = {
        ticket_content: ""
    }

    sendNewTicket = () => {
        let { ticket_content } = this.state
        // axios.post('', {message: ticket_content}).then(res => {
        //     let { data } = res.data
        // })
    }

    componentDidMount() {
        document.title = "ارسال تیکت جدید"
        console.log(this.props);
    }
    
    render() {
        return (
            <div>
                
            </div>
        );
    }
}

export default NewTicket;