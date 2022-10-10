import React, { Component } from 'react';
// import axios from 'axios';
import { department_select } from '../../../../components/select2'
import AlertService from '../../../../services/AlertService';
import { useHttpService } from '../../../hooks';
import Activity from '../Layout/components/Activity';

class NewTicket extends Component {
    state = {
        departments: [],
        loading: true,
        files: [],
        department: "",
        title: "",
        ticket_content: ""
    }
    sendNewTicket = async () => {
        let { title, department, ticket_content, files } = this.state
        let data = new FormData()
        Object.entries({title, department, ticket_content}).map(([key, value]) => {
            data.append(key, value)
        })
        files.map(file => {
            data.append('files[]', file)
        })
        const response = await this.http.post('', data, { headers: { "Content-Type": "multipart/form-data" } })
        if(response.okay) {
            this.props.history.push(`/tickets/${response.ticket.id}`)
        }
    }
    onFileSelect = (e) => {
        let newEntries = [], files_size = 0, acceptableType = true, { files } = this.state
        Array.prototype.push.apply(newEntries, e.target.files)
        const regex = /image\/\bjpg\b|\bpng\b|\bjpeg\b/
        files ? newEntries = files.concat(newEntries) : null
        for (let i = 0; i < newEntries.length; i++) {
            let elem  = newEntries[i]
            files_size += elem.size
            acceptableType = regex.test(elem.type)
            if (!acceptableType) {
                this.Alert.error({title: "فرمت فایل", text: "فقط فرمت های jpg, jpeg و png قابل قبول هستند."})
                break
            }   
        }
        if (acceptableType) {
            if (newEntries.length > 3) {
                this.Alert.error({title: "تعداد فایل", text: "حد اکثر تعداد فایل های انتخابی 3 عدد می باشد." })
            } else if (files_size > 12582912/*12 megabyte*/) {
                this.Alert.error({title: "حجم فایل های انتخابی", text: "حد اکثر حجم فایل های انتخابی 12 مگابایت می باشد." })
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
    changeDepartment = department => {
        this.setState({department})
    }
    loadDepartments = async () => {
        const response = await this.http.get('/departments')
        if (response[0]) {
            this.setState({
                loading: false,
                departments: response
            }, () => {
                $("#department-section").select2(department_select)
                $("#department-section").on("select2:select", () => {
                    this.changeDepartment($("#department-section").val())
                })
            })
        }
    }
    componentDidMount() {
        document.title = "ارسال تیکت جدید"
        this.http = useHttpService('/userarea/tickets')
        this.Alert = new AlertService({
            showConfirmButton: true, confirmButtonText: "بستن", customClass: {container: "rtl"}
        })
        this.loadDepartments()
    }
    render() {
        let { files, departments, loading } = this.state
        return (
            <div className="new-ticket-container">
                {loading ? <Activity/> : (
                    <>
                    <div className="input-group">
                        <select id="department-section">
                            <option></option>
                            {departments.length > 0 && departments.map(dep => (
                                <option key={dep.id} value={dep.id} title={dep.about}>{dep.name}</option>
                            ))}
                        </select>
                    </div>
                    <div className="input-group my-2">
                        <input className="form-control" onChange={e => this.setState({title: e.target.value})} placeholder="عنوان تیکت" />
                    </div>
                    <div className="msg-text-section">
                        <div className="input-group">
                            <textarea className="form-control" onChange={e => this.setState({ticket_content: e.target.value})} placeholder="متن تیکت"></textarea>
                        </div>
                        <button className="btn btn-lg btn-light" onClick={this.sendNewTicket}>ارسال تیکت</button>
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
                    </>
                )}
            </div>
        );
    }
}

export default NewTicket;