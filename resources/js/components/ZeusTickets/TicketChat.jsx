import React, { Component } from 'react'
import { Windmill } from 'react-activity'
import InfiniteScroll from 'react-infinite-scroller'
import LoaderComponent from '../../userarea/components/LoaderComponent'
import TicketMessage from './TicketMessage'

export default class TicketChat extends Component {
    state = {
        newMsg: ""
    }
    sendMsg = (e) => {
        e.type === "keydown" && e.keyCode === 13 && !e.shiftKey ? e.preventDefault() : null
        if (e.type === "click" || (e.type === "keydown" && e.keyCode === 13 && !e.shiftKey)) {
            this.props.sendMsg(this.state.newMsg)
            this.setState({newMsg: ""})
        }
    }
    componentDidMount() {
        this.props.scrollToEnd()
    }
    render() {
        let { loadMoreMessages, loadingMessages, messages, messagesPagination, sendingMsg } = this.props, {newMsg} = this.state
        return (
            <>
            <div className="max-h-96 overflow-y-auto custom-scrollbar px-2 mt-2 w-full" id='ticket-chat-scroller'>
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
                {messages && messages.length && messages.map((message, i) => <TicketMessage key={i} {...message} />)} 
                </InfiniteScroll>
            </div>
            <div className="h-52 mt-3 p-3">
                <textarea onKeyDown={this.sendMsg} className="h-[calc(100%-3.75rem)] w-full simple-textarea" onChange={(e) => this.setState({newMsg: e.target.value})} value={newMsg}></textarea>
                <div className='text-center pt-3'>
                    <a onClick={this.sendMsg} href="#" className="p-3 bg-indigo-200 inline-block hover:bg-indigo-300 duration-300 text-slate-800 rounded-md">ارسال پیام</a>
                    {sendingMsg && <div className='w-fit inline-block translate-y-2 ml-2 m-left'><Windmill size={25} color="#6332df" /></div>}
                </div>
            </div>
            </>
        )
  }
}
