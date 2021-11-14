import React, { Component } from 'react';

class TicketTopNav extends Component {
    render() {
        let { department, ticketNo } = this.props
        return (
            <div className="ticket-top-nav">
                <h4>بخش مربوطه: <span>{department}</span></h4>
                <h4>شماره تیکت: <span>{ticketNo}</span></h4>
            </div>
        );
    }
}

export default TicketTopNav;