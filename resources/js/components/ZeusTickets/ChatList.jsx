import React, { Component } from 'react';
import InfiniteScroll from 'react-infinite-scroller';
import LoaderComponent from '../../userarea/components/LoaderComponent';

class ChatList extends Component {
    render() {
        let {tickets, loadingTickets, openTicket, getTickets, ticketsPagination, currentDepartment} = this.props
        return (
            <div className='flex flex-col items-stretch w-full lg:w-3/12 overflow-y-auto hide-scrollbar h-full' id='chat-list-scroll'>
                {loadingTickets ? <LoaderComponent size={30} /> : tickets && tickets.length ?
                <InfiniteScroll
                    pageStart={0}
                    hasMore={ticketsPagination.hasMore && !loadingTickets}
                    loadMore={getTickets.bind(this, currentDepartment, false)}
                    useWindow={false}
                    getScrollParent={() => document.getElementById("chat-list-scroll")}
                    loader={<LoaderComponent size={30}/>}
                > 
                { tickets.map((ticket, i) => {
                    let { closed_at, created_at, deleted_at, id, messaging_is_allowed, notes, status, title, tracking_code, unread_messages_count, updated_at } = ticket
                    return (
                        <a key={i} href='#' onClick={openTicket.bind(this, id, true)} className="text-white text-smlg:pl-2  bg-indigo-100 hover:bg-indigo-200 duration-300 p-2 flex justify-between items-center h-16">
                            <span className='rounded-full inline-flex min-w-[2rem] h-8 justify-center items-center text-center bg-emerald-500'>{unread_messages_count}</span>
                            <p className='text-slate-900 text-xs font-bold mx-2'>{title}</p>
                            <span className='bg-orange-300 py-1 px-2 rounded-full min-w-fit'>{status}</span>
                        </a>
                    )})
                }</InfiniteScroll>
                : <p className='w-fit mx-auto mt-6'>در حال حاضر درخواستی وجود ندارد</p> }
            </div>
        );
    }
}

export default ChatList;