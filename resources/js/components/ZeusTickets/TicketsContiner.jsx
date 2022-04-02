import React, { Component } from 'react';
import ChatList from './ChatList';
import ChatPage from './ChatPage';
import Departments from './Departments';

class TicketsContiner extends Component {
    constructor(props) {
        super(props);
        this.state = {
            departments: [],
            currentDepartment: "",
            tickets: [],
            currentTicket: {},
            loadingMessages: false,
            hasMore: false,
            loadingTickets: false,
            loadingCurrentTicket: false,
            loadingDepartments: true
        }
    }

    getDepartments = () => {
        // send department ajax here
        this.setState({
            departments: ["بخش فروش", "بخش فنی", "بخش مالی", "بخش طراحی"],
            loadingDepartments: false
        })
    }
    getTickets = (department) => {
        this.setState({loadingTickets: true, department: department}, () => {
            // send ajax for getting tickets here
            this.setState({
                tickets: [
                    {
                        user: {
                            avatar: `${APP_PATH}images/zeus-images/yoonus.jpg`,
                            name: "Yoonus Tehrani",
                        },
                        code: "j245igr",
                        title: "عدم ثبت درخواست",
                        department: "بخش فروش",
                        status: "درحال ویرایش",
                    }
                ],
                loadingTickets: false
            })
        })
    }
    openTicket = (ticket) => {
        console.log(ticket);
    }
    loadMoreMessages = () => {

    }
    
    render() {
        let { departments, currentDepartment, tickets, currentTicket, loadingTickets, loadingCurrentTicket, loadingDepartments, loadingMessages, hasMore } = this.state
        return (
            <div className='w-full h-full mt-5 flex items-stretch'>
                <Departments departments={departments} currentDepartment={currentDepartment} loadingDepartments={loadingDepartments} getDepartments={this.getDepartments} getTickets={this.getTickets} />
                {currentDepartment && !loadingDepartments ? <>
                    <ChatList tickets={tickets} openTicket={this.openTicket} loadingTickets={loadingTickets} />
                    <ChatPage currentTicket={currentTicket} loadingCurrentTicket={loadingCurrentTicket} loadMoreMessages={this.loadMoreMessages} loadingMessages={loadingMessages} hasMore={hasMore} />
                </> : !loadingDepartments && <p>please select a depaartment to see the relavent ticekts</p>}
            </div>
        );
    }
}

export default TicketsContiner;