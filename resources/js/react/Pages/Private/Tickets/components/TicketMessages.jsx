import React, { Component } from 'react';
import InfiniteScroll from 'react-infinite-scroller';
import TicketMessage from './TicketMessage';
import { Spinner, Squares } from 'react-activity';

class TicketMessages extends Component {
    constructor(props) {
        super(props);
        this.scrollerRef = React.createRef()
    }
    render() {
        let { messages, loadMore, loading_messages, hasMore } = this.props
        return (
            <div className="ticket-messages d-flex flex-column-reverse" id='userarea-ticket-scroller' ref={this.scrollerRef}>
                <InfiniteScroll
                    pageStart={0}
                    loadMore={loadMore}
                    hasMore={hasMore && !loading_messages}
                    useWindow={false}
                    getScrollParent={() => document.getElementById('userarea-ticket-scroller')}
                    isReverse={true}
                >
                {loading_messages && <div className='w-100 mt-3 d-flex justify-content-center'><Spinner color="#6332df" size={28}/></div>}
                {messages.map((message, i) => <TicketMessage key={i} {...message} />)} 
                </InfiniteScroll>
            </div>
        );
    }
}

export default TicketMessages;