import React, { Component } from 'react';
import axios from 'axios';
// custom components
import Activity from '../Layout/components/Activity'

class Ticket extends Component {
    state = {
        loading: false,
        ticket: {
            department: "پشتیبانی طراحی",
            ticketNo: "312349",
            messages: [
                {
                    type: "user",
                    user_name: "دانیال طهرانیم",
                    date: "1400/02/09",
                    time: "13:45",
                    content: "سلام خسته نباشید ... جسارتا داخل پروفایل من آخرین سفارشم ثبت نشده امکانش هست پیگیری کنید بنده مبلغ رو واریز کزدم"
                },
                {
                    type: "admin",
                    date: "1400/02/09",
                    time: "13:45",
                    content: "سلام قربان خسته نباشید. به روی چشم همین الان بررسی میکنیم و مشکل برطرف میشه. بخاطر ایجاد تاخیر در ثبت عذر خواهی میکنم"
                },
            ]
        }
    }
    
    componentDidMount() {
        document.title = "تیکت شماره 1"
        // axios.get("").then(res => {
        //     let { data } = res
        //     this.setState({
        //         ticket: data,
        //         loading: false
        //     })
        // })
    }
    
    render() {
        let { ticket, loading } = this.state, { department, ticketNo, messages } = ticket
        return (
            loading ? <Activity/> : ticket &&
            <div className='ticket-container'>
                <div className="ticket-top-nav">
                    <h4>بخش مربوطه: <span>{department}</span></h4>
                    <h4>شماره تیکت: <span>{ticketNo}</span></h4>
                </div>
                <div className="ticket-messages">
                    
                </div>
            </div>
        );
    }
}

export default Ticket;