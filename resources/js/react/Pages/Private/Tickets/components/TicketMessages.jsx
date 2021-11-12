import React, { Component } from 'react';
import InfiniteScroll from 'react-infinite-scroller';
import TicketMessage from './TicketMessage';
import { Squares } from 'react-activity';

class TicketMessages extends Component {
    constructor(props) {
        super(props);
        this.scrollerRef = React.createRef()
    }
    
    render() {
        let { messages, loadMore, loading_messages,hasMore } = this.props
        return (
            <div className="ticket-messages" ref={(ref) => this.scrollerRef = ref}>
                <InfiniteScroll
                    pageStart={0}
                    loadMore={loadMore}
                    hasMore={hasMore && !loading_messages}
                    loader={<Squares color="#6332df" size={28} />}
                    useWindow={false}
                    getScrollParent={() => this.scrollerRef}
                    isReverse={true}
                >
                    {messages && messages.length > 0 && messages.map((message, i) => (
                        <TicketMessage key={i} {...message} />
                    ))}
                </InfiniteScroll>
            </div>
        );
    }
}

export default TicketMessages;