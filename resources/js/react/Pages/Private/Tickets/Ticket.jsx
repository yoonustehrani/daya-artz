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
            loading: false,
            department: "پشتیبانی طراحی",
            ticketNo: "312349",
            messages: [
                // {
                //     type: "user",
                //     user_name: "دانیال طهرانیم",
                //     date: "1400/02/09",
                //     time: "13:45",
                //     content: "سلام خسته نباشید ... جسارتا داخل پروفایل من آخرین سفارشم ثبت نشده امکانش هست پیگیری کنید بنده مبلغ رو واریز کزدم"
                // },
                // {
                //     type: "admin",
                //     date: "1400/02/09",
                //     time: "13:45",
                //     content: "سلام قربان خسته نباشید. به روی چشم همین الان بررسی میکنیم و مشکل برطرف میشه. بخاطر ایجاد تاخیر در ثبت عذر خواهی میکنم"
                // },
            ],
            hasMore: false,
            current_page: 1,
            loading_messages: false,
            new_message: "",
            sending: false
        }
        this.http = useHttpService('/userarea/')
        this.loadTicket()
    }
    

    setNewMessage = (e) => {
        this.setState({
            new_message: e.target.value
        })
    }

    sendMessage = () => {
        let { new_message } = this.state
        // if (new_message.length > 0) {
        //     this.setState({
        //         sending: true
        //     }, () => {
        //         axios.post('', {message: new_message}).then(res => {
        //             let { data } = res
        //             this.setState(prevState => ({
        //                 new_message: "",
        //                 sending: false,
        //                 messages: [
        //                       ...prevState.ticket.messages,
        //                       data.message
        //                   ],
        //             }))
        //         })
        //     })
        // }
    }
    loadTicket = () => {

    }

    loadMore = () => {
        let { current_page } = this.state
        this.setState({
            loading_messages: true
        }, () => {
            // axios.get(`?page=${current_page}`).then(res => {
            //     let { last_page, current_page, data } = res.data
            //     this.setState(prevState => ({
            //         hasMore: current_page !== last_page,
            //         current_page: current_page+=1,
            //         messages: [...prevState.messages, data],
            //         loading_messages: false
            //     }))
            // })
        })
    }
    
    componentDidMount() {
        document.title = "تیکت شماره 1"
        console.log(this.props);
        // this.loadMore()
        // this.setState({
        //     loading: false
        // })
    }
    
    render() {
        let { loading, new_message, sending, department, ticketNo, messages, hasMore, current_page, loading_messages } = this.state
        return (
            loading ? <Activity/> :
            <div className='ticket-container'>
                <TicketTopNav department={department} ticketNo={ticketNo} />
                <TicketMessages messages={messages} hasMore={hasMore} current_page={current_page} loading_messages={loading_messages} loadMore={this.loadMore} />
                <TicketInputs messageText={new_message} setNewMessage={this.setNewMessage} sendMessage={this.sendMessage} sending={sending} />
            </div>
        );
    }
}

export default Ticket;