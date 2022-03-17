import React, { Component } from 'react';
import { useHttpService } from '../../../hooks';
// custom components
import Activity from '../Layout/components/Activity';
import NoItem from '../Layout/components/NoItem'
import TicketRow from './components/TicketRow';

// todo : pagination
class Tickets extends Component {
    constructor(props) {
        super(props)
        this.http = useHttpService('/userarea/')
        this.state = {
            tickets: [],
            loading: true
        }
    }

    loadTickets = async () => {
        const response = await this.http.get('tickets')
        let tickets = response.data
        this.setState({
            tickets,
            loading: false
        })
    }
    componentDidMount() {
        document.title = "درخواست های پشتیبانی"
        this.loadTickets()
    }
    
    render() {
        let { tickets, loading } = this.state
        return (
            <div>
                <div className="form-title mb-5"><h4>درخواست های پشتیبانی</h4></div>
                {loading ? <Activity/> : tickets && tickets.length > 0 ?
                    <div className="table-responsive userarea-table">
                        <table className="table table-striped table-bordered table-hover thead-light">
                            <thead>
                                <tr>
                                    <th><i className="fas fa-hashtag"></i></th>
                                    <th>عنوان تیکت</th>
                                    <th>شماره تیکت</th>
                                    <th>وضعیت تیکت</th>
                                    <th>دپارتمان</th>
                                    <th>تاریخ ایجاد</th>
                                </tr>
                            </thead>
                            <tbody>
                                {tickets.map((ticket, i) => (
                                    <TicketRow key={ticket.id} index={i+1} {...ticket} />
                                ))}
                            </tbody>
                        </table>
                    </div>
                    : <NoItem/>
                }
            </div>
        );
    }
}

export default Tickets;