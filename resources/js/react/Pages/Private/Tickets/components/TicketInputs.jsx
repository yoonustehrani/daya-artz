import React, { Component } from 'react';
import { Spinner } from 'react-activity'

class TicketInputs extends Component {
    render() {
        let { messageText, setNewMessage, sendMessage, sending } = this.props
        return (
            <div className="ticket-inputs">
                <div className="ticket-text-input">
                    <div className="input-group">
                        <textarea className="form-control" placeholder="متن پیام :" value={messageText} onChange={setNewMessage.bind(this)}></textarea>
                    </div>
                    {sending ? <Spinner color="#6332df" size={20} /> :
                        <button className="badge badge-pill purple-btn" onClick={sendMessage.bind(this)}>ارسال</button>
                    }
                </div>
                <div className="ticket-file-inputs">
                    <div>
                        <h4>ارسال عکس</h4>
                        <span>[jpg, jpeg, png]</span>
                        <button className="badge badge-pill purple-btn">ارسال عکس</button>
                    </div>
                    <div>
                        <h4>ارسال فایل</h4>
                        <span>[tiff, psd, gif]</span>
                        <button className="badge badge-pill purple-btn">ارسال فایل</button>
                    </div>
                </div>
            </div>
        );
    }
}

export default TicketInputs;