import React, { Component } from 'react';
import axios from 'axios';
// custom components
import Activity from '../Layout/components/Activity';
import NoItem from '../Layout/components/NoItem'
import TicketRow from './components/TicketRow';

class Tickets extends Component {
    state = {
        tickets: [
            {
                title: "ادیت سوم",
                ticket_number: "13907",
                created_at: "12:39 1400/05/02",
                department: "پشتیبانی طراحی",
                status: "در حال انجام",
                href: "/tickets/1"
            }
        ],
        loading: false
    }
    
    componentDidMount() {
        document.title = "درخواست های پشتیبانی"
        // axios.get('').then(res => {
        //     let { data } = res
        //     this.setState({
        //         tickets: data,
        //         loading: false
        //     })
        // })
    }
    
    render() {
        let { tickets, loading } = this.state
        return (
            <div>
                <div className="form-title mb-5"><h4>درخواست های پشتیبانی</h4></div>
                {loading ? <Activity/> : tickets && tickets.length > 0 ?
                    <table className="table table-striped table-bordered table-hover thead-light table-responsive userarea-table">
                        <thead>
                            <tr>
                                <th>عنوان تیکت</th>
                                <th>شماره تیکت</th>
                                <th>تاریخ ایجاد</th>
                                <th>بخش مرتبط</th>
                                <th>وضعیت تیکت</th>
                            </tr>
                        </thead>
                        <tbody>
                            {tickets.map((ticket, i) => (
                                <TicketRow key={i} {...ticket} />
                            ))}
                        </tbody>
                    </table>
                    : <NoItem/>
                }
            </div>
        );
    }
}

export default Tickets;