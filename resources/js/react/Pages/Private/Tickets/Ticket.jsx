import React, { Component } from 'react';
import axios from 'axios';
// custom components
import Activity from '../Layout/components/Activity'
import TicketTopNav from './components/TicketTopNav';
import TicketMessages from './components/TicketMessages';
import TicketInputs from './components/TicketInputs';
import { useHttpService } from '../../../hooks';

class Ticket extends Component {
    constructor(props) {
        super(props)
        this.state = {
            loading: true,
            ticket: null,
            messages: [],
            hasMore: false,
            next_page_url: null,
            loading_messages: false,
            new_message: "",
            sending: false
        }
        this.http = useHttpService('/userarea/')
    }
    

    setNewMessage = (e) => {
        this.setState({
            new_message: e.target.value
        })
    }

    sendMessage = (e) => {
        e.preventDefault()
        let { new_message, sending } = this.state
        if (new_message.length > 0 && ! sending) {
            this.setState({
                sending: true
            }, async () => {
                const response = await this.http.put(`tickets/${this.props.params.ticketId}`, {message: new_message})
                if (response.okay) {
                    this.setState(prevState => ({
                        new_message: "",
                        sending: false,
                        messages: [
                            ...prevState.messages,
                            response.message
                        ],
                    }))
                    return
                }
                this.setState({sending: false})
            })
        }
    }
    loadTicket = async () => {
        let {ticketId} = this.props.params,
        url = this.state.next_page_url ?? `tickets/${ticketId}`,
        appends = {}
        const {ticket, messages} = await this.http.get(url)
        if (this.state.ticket === null) {
            appends = {ticket, loading: false};
            document.title = `${ticket.title} |‌ پشتیبانی دایا آرتز`
        }
        this.setState(prev => {
            let newMessages = messages.data.sort((a,b) => new Date(a.created_at) >= new Date(b.created_at) ? 1 : -1)
            return {
                ...appends,
                loading_messages: false,
                next_page_url: messages.next_page_url,
                hasMore: messages.next_page_url !== null,
                messages: newMessages.concat([...prev.messages])
            }
        })
    }

    loadMore = () => {
        console.log('loading more');
        this.setState({
            loading_messages: true
        }, this.loadTicket)
    }
    
    componentDidMount() {
        document.title = `Ticket No ${this.props.params.ticketId}`
        this.loadTicket()
    }
    
    render() {
        let { loading, ticket, new_message, sending, messages, hasMore, current_page, loading_messages } = this.state
        return (
            ! loading && ticket !== null
            ?   <div className='ticket-container'>
                    <TicketTopNav {...ticket}/>
                    <TicketMessages messages={messages} hasMore={hasMore} current_page={current_page} loading_messages={loading_messages} loadMore={this.loadMore} />
                    {ticket.messaging_is_allowed 
                    ? <TicketInputs messageText={new_message} setNewMessage={this.setNewMessage} sendMessage={this.sendMessage} sending={sending} />
                    :   <div className='alert alert-info'>
                            <p className='m-0'>در این درخواست پشتیبانی بدلیل وضعیت فعلی تیکت مجاز به ارسال پیام نیستید. می توانید در صورت لزوم مراتب را از طریق تماس با پشتیبانی رفع رجوع کنید.</p>
                        </div>
                    }
                </div>
            :   <Activity/> 
        );
    }
}

export default Ticket;