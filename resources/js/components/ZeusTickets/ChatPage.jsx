import React, { Component } from 'react';
import TicketChat from './TicketChat';

class ChatPage extends Component {
    render() {
        let { user, code, title, department, status } = this.props?.currentTicket, { loadMoreMessages, getMoreMessages, hasMore, loadingMessages } = this.props
        return (
            <div className='w-full lg:w-9/12 h-full'>
            {this.props.currentTicket
            ? <><ul className="w-full p-0 flex flex-wrap justify-evenly list-none text-slate-600 font-bold">
                <li>کد درخواست: <span className="font-normal">{code}</span></li>
                <li>عنوان درخواست: <span className="font-normal">{title}</span></li>
                <li>درخواست دهنده: <span className="font-normal">{user?.name}</span></li>
                <li>بخش: <span className="font-normal">{department}</span></li>
                <li>وضعیت: <span className="font-normal">{status}</span></li>
              </ul>
              <TicketChat getMoreMessages={getMoreMessages} hasMore={hasMore} loadingMessages={loadingMessages} />
              </>
            : <p>please select a ticket</p>
            }
            </div>
        )
    }
}

export default ChatPage;