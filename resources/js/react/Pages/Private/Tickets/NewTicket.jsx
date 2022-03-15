import React, { Component } from 'react';
import Swal from 'sweetalert2';
// import axios from 'axios';
import { normal } from '../../../../components/select2'

class NewTicket extends Component {
    state = {
        ticket_content: "",
        department: "",
        files: null
    }
    sendNewTicket = () => {
        let { ticket_content, department, files } = this.state
        // axios.post('', {message: ticket_content, department: department, files: files}).then(res => {
        //     let { data } = res.data
        // })
    }
    changeContent = (e) => {
        this.setState({
            ticket_content: e.target.value
        })
    }
    onFileSelect = (e) => {
        let newEntries = [], files_size = 0, acceptableType = true, { files } = this.state
        Array.prototype.push.apply(newEntries, e.target.files)
        console.log(newEntries);
        const regex = /image\/\bjpg\b|\bpng\b|\bjpeg\b/
        files ? newEntries = files.concat(newEntries) : null
        for (let i = 0; i < newEntries.length; i++) {
            let elem  = newEntries[i]
            files_size += elem.size
            acceptableType = regex.test(elem.type)
            if (!acceptableType) {
                Swal.fire({icon: "error", title: "فرمت فایل", text: "فقط فرمت های jpg, jpeg و png قابل قبول هستند.", showConfirmButton: true, confirmButtonText: "بستن", customClass: {container: "rtl"}})
                break
            }   
        }
        if (acceptableType) {
            if (newEntries.length > 3) {
                Swal.fire({icon: "error", title: "تعداد فایل", text: "حد اکثر تعداد فایل های انتخابی 3 عدد می باشد.", showConfirmButton: true, confirmButtonText: "بستن", customClass: {container: "rtl"} })
            } else if (files_size > 12582912/*12 megabyte*/) {``
                Swal.fire({icon: "error", title: "حجم فایل های انتخابی", text: "حد اکثر حجم فایل های انتخابی 12 مگابایت می باشد.", showConfirmButton: true, confirmButtonText: "بستن", customClass: {container: "rtl"} })
            } else {
                this.setState({
                    files: newEntries
                }, () => {
                    $('#image-input').val("")
                })
            }
        }
    }
    deleteFile = (index) => {
        let { files } = this.state
        files.splice(index, 1)
        this.setState({
            files: files
        })
    } 
    componentDidMount() {
        document.title = "ارسال تیکت جدید"
        $("#department-section").select2(normal("بخش مربوطه"))
        $("#department-section").on("select2:select", () => {
            this.setState({
                department: $("#department-section").val()
            })
        })
    }
    render() {
        let { files } = this.state
        return (
            <div className="new-ticket-container">
                <div className="input-group">
                    <select id="department-section">
                        <option value=""></option>
                        <option value="support">پشتیبانی</option>
                        <option value="sales">فروش</option>
                        <option value="finance">امور مالی</option>
                        <option value="management">مدیریت</option>
                    </select>
                </div>
                <div className="msg-text-section">
                    <div className="input-group">
                        <textarea className="form-control" onChange={this.changeContent.bind(this)} placeholder="متن پیام:"></textarea>
                    </div>
                    <button className="btn btn-lg btn-light">ارسال تیکت</button>
                </div>
                <div className="upload-boxes">
                    <div className='files-preview'>
                        {files && files.length > 0 ? files.map((file, i) => (
                            <div className="selected-image" key={i}>
                                <img src={URL.createObjectURL(file)} />
                                <a className='badge badge-pill badge-dark' onClick={this.deleteFile.bind(this, i)}><i className='far fa-trash-alt'></i></a>
                            </div>
                        )) : "فایل های ضمیمه شما در این قسمت نمایش داده می شود"
                        }
                    </div>
                    <div className='choose-file'>
                        <h4>افزودن عکس</h4>
                        <span>[jpg, jpeg, png]</span>
                        <input className='d-none' type="file" name="image-input" id="image-input" onChange={this.onFileSelect} accept=".png,.jpg,.jpeg" multiple />
                        <label className="btn btn-light btn-sm" htmlFor='image-input'>انتخاب</label>
                    </div>
                    {/* <div>
                        <h4>افزودن فایل</h4>
                        <span>[tiff, psd, gif]</span>
                        <input className='d-none' type="file" name="file-input" id="file-input" onChange={this.onFileSelect} />
                        <label className="btn btn-light btn-sm" htmlFor='file-input'>انتخاب</label>
                    </div> */}
                </div>
            </div>
        );
    }
}

export default NewTicket;