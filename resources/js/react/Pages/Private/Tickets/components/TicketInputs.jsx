import React, { Component } from 'react';
import { Spinner } from 'react-activity'

class TicketInputs extends Component {
    render() {
        let { messageText, setNewMessage, sendMessage, sending, deleteFile, onFileSelect, files } = this.props
        return (
            <div className="ticket-inputs">
                <div className="ticket-text-input">
                    <div className="input-group">
                        <textarea disabled={sending} className="form-control" placeholder="متن پیام :" value={messageText} onChange={setNewMessage.bind(this)}></textarea>
                    </div>
                    {sending ? <Spinner color="#6332df" size={20} /> :
                        <button className="btn btn-light" type='button' onClick={sendMessage}>ارسال</button>
                    }
                </div>
                <div className="ticket-file-inputs">
                    <div className='files-preview'>
                        {files && files.length > 0 ? files.map((file, i) => (
                            <div className="selected-image" key={i}>
                                <img src={URL.createObjectURL(file)} />
                                <a className='badge badge-pill badge-dark' onClick={deleteFile.bind(this, i)}><i className='far fa-trash-alt'></i></a>
                            </div>
                        )) : "فایل های ضمیمه شما در این قسمت نمایش داده می شود"
                        }
                    </div>
                    <div className='choose-file'>
                        <h4>افزودن عکس</h4>
                        <span>[jpg, jpeg, png]</span>
                        <input className='d-none' type="file" name="image-input" id="image-input" onChange={onFileSelect} accept=".png,.jpg,.jpeg" multiple />
                        <label className="btn btn-light btn-sm" htmlFor='image-input'>انتخاب</label>
                    </div>
                </div>
            </div>
        );
    }
}

export default TicketInputs;