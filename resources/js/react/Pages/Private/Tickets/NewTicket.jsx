import React, { Component } from 'react';
// import axios from 'axios';
import { normal } from '../../../../components/select2'

class NewTicket extends Component {
    state = {
        ticket_content: "",
        department: ""
    }

    sendNewTicket = () => {
        let { ticket_content, department } = this.state
        // axios.post('', {message: ticket_content, department: department}).then(res => {
        //     let { data } = res.data
        // })
    }

    changeContent = (e) => {
        this.setState({
            ticket_content: e.target.value
        })
    }

    componentDidMount() {
        document.title = "ارسال تیکت جدید"
        $("#department-section").select2(normal("بخش مربوطه: "))
        $("#department-section").on("select2:select", () => {
            this.setState({
                department: $("#department-section").val()
            })
        })
    }
    
    render() {
        return (
            <div className="new-ticket-container">
                <div className="input-group">
                    <select id="department-section">
                        <option value=""></option>
                        <option value="support">پشتیبانی</option>
                        <option value="sales">فروش</option>
                        <option value="technical">فنی</option>
                        <option value="design">طراحی</option>
                    </select>
                </div>
                <div className="msg-text-section">
                    <div className="input-group">
                        <textarea className="form-control" onChange={this.changeContent.bind(this)} placeholder="متن پیام:"></textarea>
                    </div>
                    <button className="badge badge-pill purple-btn">ارسال تیکت</button>
                </div>
                <div className="upload-boxes">
                    <div className="flex-center">
                        here will be the dropzone
                    </div>
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

export default NewTicket;