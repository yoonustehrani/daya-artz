import React, { Component } from 'react';
import reactInfiniteScroller from 'react-infinite-scroller';
import LoaderComponent from '../../react/components/LoaderComponent';

class ChatList extends Component {
    render() {
        let {tickets, loadingTickets, openTicket} = this.props
        return (
            <div className='flex flex-col items-stretch w-full lg:w-3/12 overflow-y-auto hide-scrollbar h-full'>
                {loadingTickets ? <LoaderComponent size={30} /> : tickets && tickets.length ? tickets.map((ticket, i) => (
                    <a key={i} href='#' onClick={openTicket.bind(this, ticket)} className="text-white text-base text-left bg-slate-800 hover:bg-slate-700 duration-300 p-2 flex items-stretch h-16">
                        <img className='w-auto h-full rounded-full mr-2' src={ticket.avatar} alt="user avatart" />
                        <div className='flex flex-col justify-evenly'>
                            <h2>{ticket.name}</h2>
                            <p className='text-sm text-gray-100'>{ticket.subtitle}</p>
                        </div>
                    </a>
                ))
                : <p>There is no ticket at the moment</p> }
            </div>
        );
    }
}

export default ChatList;