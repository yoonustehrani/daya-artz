import React, { Component } from 'react'
import { Windmill } from 'react-activity'
import InfiniteScroll from 'react-infinite-scroller'
import LoaderComponent from '../../react/components/LoaderComponent'
import TicketMessage from './TicketMessage'

export default class TicketChat extends Component {
    state = {
        newMsg: ""
    }
    componentDidMount() {
        this.props.scrollToEnd()
    }
    render() {
        let { loadMoreMessages, loadingMessages, messages, messagesPagination, sendMsg, sendingMsg } = this.props, {newMsg} = this.state
        return (
            <>
            <div className="max-h-[280px] overflow-y-auto custom-scrollbar shadow-md px-2" id='ticket-chat-scroller'>
                <InfiniteScroll
                    pageStart={0}
                    loadMore={loadMoreMessages}
                    hasMore={messagesPagination.hasMore && !loadingMessages}
                    useWindow={false}
                    getScrollParent={() => document.getElementById('ticket-chat-scroller')}
                    isReverse={true}
                    initialLoad={false}
                    threshold={50}
                    className="float-left"
                >
                {loadingMessages && <LoaderComponent size={28} />}
                {messages && messages.length && messages.map((message) => <TicketMessage key={`${message.id}`} {...message} />)} 
                </InfiniteScroll>
            </div>
            <div className="h-52 mt-3">
                <textarea className="h-[calc(100%-3.75rem)] w-full simple-textarea" onChange={(e) => this.setState({newMsg: e.target.value})} value={newMsg}></textarea>
                <div className='text-center pt-3'>
                    <a onClick={sendMsg.bind(this, newMsg)} href="#" className="p-3 bg-indigo-200 inline-block hover:bg-indigo-300 duration-300 text-slate-800 rounded-md">ارسال پیام</a>
                    {sendingMsg && <div className='w-fit inline-block translate-y-2 ml-2'><Windmill size={25} color="#6332df" /></div>}
                </div>
            </div>
            </>
        )
  }
}
