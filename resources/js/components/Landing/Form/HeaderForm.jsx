import React, { Component } from 'react';
import { useHttpService } from '../../../userarea/hooks';
import validator from 'validator';
import AlertService from '../../../services/AlertService';
import Log from 'laravel-mix/src/Log';

class HeaderForm extends Component {
    constructor(props) {
        super(props);
        this.http = useHttpService("")
        this.Alert = new AlertService({customClass: {container: "rtl"}, timer: 3000, showConfirmButton: false})
        this.state = {
            data: {
                phone: "",
                time: ""
            },
            disabled: false
        }
    }

    changeValue = (value, key, onlyNumbers=false) => {
        if (!onlyNumbers || validator.isNumeric(value) || value.length === 0) {
            this.setState(prevState => ({data: {...prevState.data, [key]: value}}))
        }
    }

    validateFields = () => {
        let { time, phone } = this.state.data,
        hasErr = false,
        inputs = [
            {id: 'phone', value: phone, key: "شماره تلفن"},
            {id: 'time', value: time, key: "بازه زمانی"},
        ]
        inputs.map((input) => {
            let { id, value, key } = input, errs = []
            switch (id) {
                case 'time':
                    (!validator.isAlphanumeric(value, 'en-US', {ignore: "-"}) || !validator.isLength(value, {min: 1, max: 40})) && errs.push(`فیلد ${key} به درستی انتخاب نشده`)
                    break;
                case 'phone':
                    !validator.isMobilePhone(value) && errs.push(`فیلد ${key} نا معتبر میباشد`)
                    break;
                default:
                    break;
            }
            if (errs.length > 0) {
                !hasErr ? hasErr = true : null
                !document.querySelector("#err-container>ul") && document.getElementById("err-container").insertAdjacentHTML('beforeend', "<ul class='bg-slate-700/30 p-2 pr-6 rounded-md text-sm text-red-200 mt-1 list-disc col-span-full err-container'></ul>")
                errs.map(err => {document.querySelector("#err-container>ul").insertAdjacentHTML('beforeend', `<li>${err}</li>`)})
            }
        })
        return hasErr
    }

    trimValues = () => {
        let { data } = this.state, newData = data
        Object.keys(newData).map(key => {
            newData[key] = newData[key].trim()
        })
        this.setState({data: newData})
    }

    handleSendForm = (e) => {
        e.preventDefault()
        let errContainer = document.getElementById("err-container")
        errContainer.childNodes.length > 0 && errContainer.removeChild(errContainer.children[0])
        this.trimValues()
        let hasErr = this.validateFields()
        if (!hasErr) {
            this.setState({disabled: true}, this.handleFormRequest)
        }
    }

    handleFormRequest = async () => {
        let { time, phone } = this.state.data
        const res = await this.http.post(this.props.headerFormUrl, {
            calltime: time,
            phone_number: phone
        })
        if (res.okay) {
            this.Alert.success({title: "ارسال شد", text: res.message, heightAuto: false, customClass: {container: "iran-sans"}})
        } else {
            this.setState({disabled: false})
        }
    } 
    
    render() {
        let { phone, time } = this.state.data
        return (
            <form className="block w-full md:w-fit p-4" onSubmit={this.handleSendForm.bind(this)}>
                <div className="flex flex-col md:flex-row items-center justify-center gap-4">
                    <div className="p-3 font-semibold">
                        <div>
                            <label className="text-with-shadow ml-2 cursor-pointer" htmlFor="time-morning">تماس از ساعت 8 الی 14</label>
                            <input disabled={this.state.disabled} className='cursor-pointer' type="radio" name="time-to-call" id="time-morning" value="8to14" onChange={(e) => this.changeValue(e.target.value, 'time')} checked={time === "8to14"} />
                        </div>
                        <div>
                            <label className="text-with-shadow ml-2 cursor-pointer" htmlFor="time-evening">تماس از ساعت 17 الی 21</label>
                            <input disabled={this.state.disabled} className='cursor-pointer' type="radio" name="time-to-call" id="time-evening" value="17to22" onChange={(e) => this.changeValue(e.target.value, 'time')} checked={time === "17to22"} />
                        </div>
                    </div>
                    <div className="p-3">
                        <input disabled={this.state.disabled}
                        className="text-left placeholder:text-right [direction:ltr] text-xl form-input bg-black/50 px-4 py-3 rounded-md border-transparent shadow-sm focus:outline-none focus:border-gray-600 focus:ring focus:ring-white focus:ring-opacity-10" 
                        type="text" name="phone_number" placeholder="شماره موبایل" value={phone} onChange={(e) => this.changeValue(e.target.value, 'phone', true)} />
                    </div>
                </div>
                <div className="w-full flex items-center justify-between flex-row-reverse flex-wrap px-3">
                    <button className="w-full md:w-fit float-left text-gray-800 text-xl bg-gray-300/80 py-1 px-6 rounded-md shadow-md" type="submit">ارسال</button>
                    <div id='err-container' className='w-full md:w-fit'></div>
                </div>
            </form>
        );
    }
}

export default HeaderForm;