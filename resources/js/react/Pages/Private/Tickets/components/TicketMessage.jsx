import React, { Component } from 'react';

class TicketMessage extends Component {
    render() {
        let { type, date, time, content, user_name } = this.props
        return (
            <div className={type === "user" ? "right-msg" : "left-msg"}>
                <div className="msg-meta">
                    <span>{user_name ?? "پشتیبانی دایا"}</span>
                    <span>{date}</span>
                    <span>{time}</span>
                </div>
                <div className="msg-content">
                    <p>{content}</p>
                </div>
            </div>
        )
    }
}

export default TicketMessage;