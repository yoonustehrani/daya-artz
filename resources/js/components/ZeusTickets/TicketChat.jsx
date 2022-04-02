import React, { Component } from 'react'
import InfiniteScroll from 'react-infinite-scroller'

export default class TicketChat extends Component {
    render() {
        let { getMoreMessages, hasMore, loadingMessages } = this.props
        return (
            <div className="" id='userarea-ticket-scroller'>
                <InfiniteScroll
                    pageStart={0}
                    loadMore={getMoreMessages}
                    hasMore={hasMore && !loadingMessages}
                    useWindow={false}
                    getScrollParent={() => document.getElementById('userarea-ticket-scroller')}
                    isReverse={true}
                    initialLoad={false}
                    threshold={50}
                >
                {loadingMessages && <div className='w-100 mt-3 d-flex justify-content-center'><Spinner color="#6332df" size={28}/></div>}
                {messages.map((message) => <TicketMessage key={`${message.id}`} {...message} />)} 
                </InfiniteScroll>
            </div>
        )
  }
}
