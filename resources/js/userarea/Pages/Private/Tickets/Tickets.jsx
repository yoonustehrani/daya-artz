import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import { useHttpService } from '../../../hooks';
// custom components
import Activity from '../Layout/components/Activity';
import NoItem from '../Layout/components/NoItem'
import TicketRow from './components/TicketRow';
import Paginate from '../../../../components/Paginate'

// todo : pagination
class Tickets extends Component {
    constructor(props) {
        super(props)
        this.http = useHttpService('/userarea/')
        this.state = {
            tickets: [],
            loading: false
        }
    }

    loadTickets = async (pageIndex) => {
        this.setState({loading: true}, () => {
            this.http.get(`tickets?page=${pageIndex}`).then(res => {
                let tickets = res.data,
                paginateInfo = {
                    current_page: res.current_page,
                    next_page_url: res.next_page_url,
                    prev_page_url: res.prev_page_url,
        
                }
                this.setState({
                    tickets,
                    paginateInfo,
                    loading: false
                })
            })
        })
    }

    change_page_handler = (next=true) => {
        let currentPage = Number(this.state.paginateInfo.current_page)
        this.loadTickets(next ? currentPage + 1 : currentPage - 1)
    }

    componentDidMount() {
        this.loadTickets(1)
    }
    
    render() {
        let { tickets, loading, paginateInfo } = this.state
        return (
            <div>
                <div className='new-ticket-btn-container'>
                    <Link to={"/tickets/new"} className='flex-center'>ثبت درخواست جدید <i className='fas fa-plus'></i></Link>
                </div>
                {loading ? <Activity/> : tickets && tickets.length > 0 ? <>
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
                    <Paginate current_page={paginateInfo.current_page} next_page_url={paginateInfo.next_page_url} prev_page_url={paginateInfo.prev_page_url} next_page_handler={this.change_page_handler} prev_page_handler={this.change_page_handler.bind(this, false)} /></>
                    : <NoItem/>
                }
            </div>
        );
    }
}

export default Tickets;