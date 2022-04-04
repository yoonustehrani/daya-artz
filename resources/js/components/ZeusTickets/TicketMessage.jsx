import React, { Component } from 'react';
import { useJalaliDate } from '../../react/hooks';

class TicketMessage extends Component {
    render() {
        let { id, side, body, created_at } = this.props
        return (
            <div className={`${side === "customer" ? "float-left" : "float-right"} p-3 text-slate-900 bg-indigo-100 w-2/3 my-4`}>
                <p>{body}</p>
                <div className="text-right m-0">
                    <span>
                        {side !== "customer" && <i className='fas fa-user-tie mx-1'></i>}
                        <i className="mx-1 far fa-calendar"></i>
                        {useJalaliDate(created_at).format('jYYYY/jM/jD')}
                        <i className="mx-1 ml-3 far fa-clock"></i>
                        {useJalaliDate(created_at).format('HH:mm:ss')}
                    </span>
                </div>
            </div>
        );
    }
}

export default TicketMessage;