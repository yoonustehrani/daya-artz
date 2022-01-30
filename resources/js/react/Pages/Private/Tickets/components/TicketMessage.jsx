import React, { Component } from 'react';
import { useJalaliDate } from '../../../../hooks';

function TicketMessage({ side, created_at, body }) {
    return (
        <div className={side === "customer" ? "right-msg" : "left-msg"}>
            <div className="msg-meta">
                {/* <span>{user_name ?? "پشتیبانی دایا"}</span> */}
            </div>
            <div className="msg-content">
                <p>{body}</p>
                <p className="text-left ltr">{useJalaliDate(created_at).format('jYYYY/jM/jD HH:mm:ss')}</p>
            </div>
        </div>
    )
}

export default TicketMessage;