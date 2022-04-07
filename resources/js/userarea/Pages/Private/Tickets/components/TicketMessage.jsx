import React, { Component } from 'react';
import { useJalaliDate } from '../../../../hooks';

function TicketMessage({ side, created_at, body }) {
    let date = useJalaliDate(created_at)
    return (
        <div className={side === "customer" ? "right-msg" : "left-msg"}>
            <div className="msg-meta">
                {/* <span>{user_name ?? "پشتیبانی دایا"}</span> */}
            </div>
            <div className="msg-content pb-1">
                <p>{body}</p>
                <div className="text-left ltr m-0">
                    <span>
                        <i className="mx-1 far fa-calendar"></i>
                        {date.format('jYYYY/jM/jD')}
                        <i className="mx-1 far fa-clock"></i>
                        {date.format('HH:mm:ss')}
                    </span>
                </div>
            </div>
        </div>
    )
}

export default TicketMessage;