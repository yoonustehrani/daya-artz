import React, { Component } from 'react';
import { useHttpService } from '../../userarea/hooks';
import ChatList from './ChatList';
import ChatPage from './ChatPage';
import Departments from './Departments';

class TicketsContiner extends Component {
    constructor(props) {
        super(props);
        this.http = useHttpService("")
        this.state = {
            departments: [],
            currentDepartment: "",
            tickets: [],
            currentTicket: null,
            ticketMessages: [],
            loadingTickets: false,
            loadingCurrentTicket: false,
            loadingDepartments: false,
            sendingMsg: false,
            ticketsPagination: {},
            messagesPagination: {},
        }
    }

    getDepartments = () => {
        this.setState({loadingDepartments: true}, async () => {
            const response = await this.http.get(this.props.getDepartmentsUrl)
            if (response) {
                this.setState({
                    departments: response,
                    loadingDepartments: false
                })
            }
        })
    }
    getTickets = (departmentId, reset) => {
        if (reset) {
            this.setState({
                tickets: [], ticketsPagination: {}, currentTicket: null, ticketMessages: [], messagesPagination: {} 
            })
        }
        this.setState({loadingTickets: true, currentDepartment: departmentId}, async () => {
            let { next_page_url } = this.state.ticketsPagination 
            const res = await this.http.get(next_page_url ? next_page_url : this.props.getTicketsUrl.replace("departmentId", departmentId))
            if (res) {
                let { current_page, last_page, next_page_url, data } = res.tickets
                this.setState(prevState => ({
                    ticketsPagination: {
                        current_page: current_page,
                        last_page: last_page,
                        next_page_url: next_page_url,
                        hasMore: next_page_url !== null
                    },
                    tickets: [...prevState.tickets, ...data],
                    loadingTickets: false
                }))
            }
        })
    }
    openTicket = (ticketId, reset=false) => {
        if (reset) {
            let { tickets } = this.state,
            targetTicket = tickets.find(obj => obj.id === ticketId),
            targetIndex = tickets.indexOf(targetTicket)
            targetTicket.unread_messages_count = 0
            let finalTickets = tickets
            finalTickets[targetIndex] = targetTicket
            this.setState({
                currentTicket: null, ticketMessages: [], messagesPagination: {}, tickets: finalTickets
            })
        }
        this.setState({loadingCurrentTicket: reset, loadingMessages: !reset}, async () => {
            let { next_page_url } = this.state.messagesPagination 
            const res = await this.http.get(next_page_url ? next_page_url : this.props.getTicketUrl.replace("ticketId", ticketId))
            if (res) {
                let { ticket, messages } = res
                this.setState(prevState => ({
                    currentTicket: ticket,
                    messagesPagination: {current_page: messages.current_page, next_page_url: messages.next_page_url, hasMore: messages.next_page_url !== null},
                    ticketMessages: messages.data.sort((a, b) => new Date(a.created_at) >= new Date(b.created_at) ? 1 : -1).concat([...prevState.ticketMessages]),
                    loadingCurrentTicket: false,
                    loadingMessages: false,
                }), () => this.deleteDuplicates())
            }
        })
    }
    sendMsg = (msg) => {
        let { id } = this.state.currentTicket
        this.setState({sendingMsg: true}, async () => {
            const res = await this.http.post(this.props.sendmessagesUrl.replace("ticketId", id), {message: msg})
            if (res.okay) {
                this.setState(prevState => ({ticketMessages: [...prevState.ticketMessages, res.message]}))
            }
            this.setState({sendingMsg: false})
            this.scrollToEnd()
        })
    }
    scrollToEnd = () => {
        $("#ticket-chat-scroller").scrollTop($("#ticket-chat-scroller")[0].scrollHeight)
        setTimeout(() => {
            $("#ticket-chat-scroller").scrollTop($("#ticket-chat-scroller")[0].scrollHeight)
        }, 0);
    }
    deleteDuplicates = () => {
        let { ticketMessages } = this.state,
        mgsIds = ticketMessages.map(msg => msg.id),
        filteredMsgs = ticketMessages.filter(({id}, index) => !mgsIds.includes(id, index + 1))
        this.setState({
            ticketMessages: filteredMsgs
        })
    }

    render() {
        let { departments, currentDepartment, tickets, currentTicket, loadingTickets, loadingCurrentTicket, loadingDepartments, loadingMessages, ticketMessages, messagesPagination, ticketsPagination, sendingMsg } = this.state
        return (
            <div className='w-full h-full'>
                <Departments departments={departments} currentDepartment={currentDepartment} loadingDepartments={loadingDepartments} getDepartments={this.getDepartments} getTickets={this.getTickets} />
                {currentDepartment && !loadingDepartments ? <div className='w-full mt-6 flex items-stretch'>
                    <ChatList tickets={tickets} openTicket={this.openTicket} loadingTickets={loadingTickets} ticketsPagination={ticketsPagination} getTickets={this.getTickets} currentDepartment={currentDepartment} />
                    <ChatPage tickets={tickets} currentTicket={currentTicket} loadingCurrentTicket={loadingCurrentTicket} ticketMessages={ticketMessages} loadMoreMessages={this.openTicket} loadingMessages={loadingMessages} messagesPagination={messagesPagination} sendMsg={this.sendMsg} sendingMsg={sendingMsg} scrollToEnd={this.scrollToEnd} />
                </div> : !loadingDepartments && <p className='w-fit mx-auto mt-6'>لطفا یکی از دپارتمان ها را انتخاب کنید</p>}
            </div>
        );
    }
}

export default TicketsContiner;