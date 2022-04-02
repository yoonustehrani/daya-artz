import React, { Component } from 'react';
import ChatList from './ChatList';
import ChatPage from './ChatPage';

class TicketsContiner extends Component {
    constructor(props) {
        super(props);
        this.state = {
            tickets: [],
            currentTicket: null,
            loadingTickets: true,
            loadingCurrentTicket: true
        }
    }

    openTicket = (ticket) => {
        console.log(ticket);
    }

    componentDidMount() {
        setTimeout(() => {
            this.setState({
                tickets: [
                    {avatar: `${APP_PATH}images/zeus-images/yoonus.jpg`, name: "Yoonus Tehrani", subtitle: "this is a test"}
                ],
                loadingTickets: false
            })
        }, 1000);
    }
    
    render() {
        let { tickets, currentTicket, loadingTickets } = this.state
        return (
            <div className='w-full h-full mt-5 flex items-stretch'>
                <ChatList tickets={tickets} openTicket={this.openTicket} loadingTickets={loadingTickets} />
                <ChatPage currentTicket={currentTicket} />
            </div>
        );
    }
}

export default TicketsContiner;