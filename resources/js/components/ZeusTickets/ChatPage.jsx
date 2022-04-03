import React, { Component } from 'react';
import LoaderComponent from '../../react/components/LoaderComponent';
import { useJalaliDate } from '../../react/hooks';
import TicketChat from './TicketChat';

class ChatPage extends Component {
    render() {
        let { loadMoreMessages, messagesPagination, ticketMessages, loadingMessages, tickets, loadingCurrentTicket, currentTicket, sendMsg, sendingMsg, scrollToEnd } = this.props,
        { id, title, status, tracking_code, unread_messages_count, messaging_is_allowed, notes, closed_at, created_at, updated_at, deleted_at, } = currentTicket??{}
        return (
            <div className='w-full lg:w-9/12 lg:pl-2 h-full p-left'>
            {loadingCurrentTicket ? <LoaderComponent size={30}/> : this.props.currentTicket ? <div className='bg-on-white'>
                <ul className="w-full p-0 flex flex-wrap list-none text-slate-900 font-bold">
                    <li className='mx-5 my-2'>کد پیگیری: <span className="font-normal ml-1 ">{tracking_code}</span></li>
                    <li className='mx-5 my-2'>عنوان درخواست: <span className="font-normal ml-1 ">{title}</span></li>
                    <li className='mx-5 my-2'>وضعیت: <span className="font-normal ml-1 ">{status}</span></li>
                    <li className='mx-5 my-2'>تعداد پیام خوانده نشده: <span className="font-normal ml-1 ">{unread_messages_count}</span></li>
                    <li className='mx-5 my-2'>امکان ارسال پیام: <span className="font-normal ml-1 ">{messaging_is_allowed ? "yes" : "no"}</span></li>
                    <li className='mx-5 my-2'>تاریخ ایجاد: <span className="font-normal ml-1 ">{useJalaliDate(created_at).format("jYYYY/jMM/jDD")}</span></li>
                    <li className='mx-5 my-2'>آخرین تغییر: <span className="font-normal ml-1 ">{useJalaliDate(updated_at).format("jYYYY/jMM/jDD")}</span></li>
                    <li className='mx-5 my-2'>توضیحات: <span className="font-normal ml-1 ">{notes??""}</span></li>
                </ul>
                <hr className='text-slate-900 w-full mx-auto border-2' />
              <TicketChat loadMoreMessages={loadMoreMessages} messages={ticketMessages} messagesPagination={messagesPagination} loadingMessages={loadingMessages} sendMsg={sendMsg} sendingMsg={sendingMsg} scrollToEnd={scrollToEnd} />
            </div>
            : tickets.length ? <p className='w-fit mx-auto mt-6'>لطفا یکی از تیکت ها را انتخاب کنید</p> : null
            }
            </div>
        )
    }
}

export default ChatPage;