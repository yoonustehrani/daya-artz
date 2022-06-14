const { Component } = require("react");
import { useHistory } from "react-router-dom";
import validator from "validator";
import AlertService from "../../../services/AlertService";
import { useHttpService } from "../../../userarea/hooks";

class Form extends Component {
    constructor(props) {
        super(props)
        this.http = useHttpService("")
        this.Alert = new AlertService({customClass: {container: "rtl"}, timer: 3000, showConfirmButton: false})
        this.state = {
            data: {
                position: '',
                fullname: '',
                phone_number: '',
                description: ''
            },
            form: {
                positions: [
                    {name: 'owner', title: 'صاحب کسب و کار', icon: 'fas fa-user-tie'},
                    {name: 'manager', title: 'مدیر / مسئول شرکت', icon: 'fas fa-briefcase'},
                    {name: 'idea', title: 'صاحب ایده کسب و کار', icon: 'fas fa-lightbulb'}
                ],
            },
            placeholder: `هدف فعلی تبلیغاتی/برندینگ که دغدغه شما یا سازمان تان است را شرح دهید.
- برای مثال:‌ من قصد افزایش فروش رستوران خود را با ارتقا سطح برند خود دارم`
        }
        this.inactiveClassNames = 'border-gray-500 ring-transparent'
        this.activeClassNames = 'border-purple-500 ring-purple-400'
    }

    handleItemSelect = name => {
        this.setState(prevState => ({
            data: {...prevState, position: name}
        }))
    }

    validateFields = () => {
        let { position, fullname, phone_number, description } = this.state.data,
        hasErr = false,
        inputs = [
            {id: 'position', value: position, key: "مسئولیت"},
            {id: 'name', value: fullname, key: "نام و نام خانوادگی"},
            {id: 'phone', value: phone_number, key: "شماره تماس"},
            {id: 'description', value: description, key: "هدف تبلیغاتی"}
        ]
        inputs.map((input) => {
            let { id, value, key } = input, errs = []
            switch (id) {
                case 'position':
                    (!validator.isAlpha(value, 'en-US') || !validator.isLength(value, {min: 3, max: 40})) && errs.push(`فیلد ${key} به درستی انتخاب نشده`)
                    break;
                case 'name':
                    !validator.isAlpha(value, 'fa-IR') && errs.push(`لطفا فیلد ${key} را با حروف فارسی تکمیل نمایید`)
                    !validator.isLength(value, {min: 5, max: 60}) && errs.push(`طول فیلد ${key} حداقل 5 و حد اکثر 60 کاراکتر میباشد`)
                    break;
                case 'phone':
                    !validator.isMobilePhone(value) && errs.push(`فیلد ${key} نا معتبر میباشد`)
                    break;
                case 'description':
                    !validator.isLength(value, {min: 4, max: 1000}) && errs.push(`طول فیلد ${key} حداقل 4 و حداکثر 1000 کاراکتر میباشد`)
                    break;
                default:
                    break;
            }
            if (errs.length > 0) {
                !hasErr ? hasErr = true : null
                document.getElementById(id).insertAdjacentHTML('beforeend', "<ul class='bg-red-300 p-2 pr-6 rounded-md text-sm text-slate-50 mt-1 list-disc col-span-full err-container'></ul>")
                errs.map(err => {document.querySelector(`#${id} > ul`).insertAdjacentHTML('beforeend', `<li>${err}</li>`)})
            }
        })
        return hasErr
    }

    trimValues = () => {
        let { data } = this.state
        Object.keys(data).map(key => {
            data[key] = data[key].trim()
        })
        this.setState({data: data})
    }

    handleSendForm = () => {
        let errContainers = document.getElementsByClassName("err-container")
        errContainers.length > 0 && Array.from(errContainers).map(item => item.remove())
        this.trimValues()
        let hasErr = this.validateFields()
        if (!hasErr) {
            this.http.post("")
        }
    }

    render() {
        return (
            <div className="grid grid-cols-2 gap-8 h-full w-full xl:w-3/4 my-2 md:my-4 bg-white shadow-lg rounded-md p-6">
                <div id="position" className="col-span-2 grid grid-cols-2 sm:grid-cols-3 gap-8 h-fit">
                    <p className="col-span-full font-semibold text-lg">- مسئولیت شما در کسب و کارتان کدام یک از موارد زیر است؟</p>
                    {this.state.form.positions.map(position => (
                        <div key={position.name} onClick={() => this.handleItemSelect(position.name)} className={`${position.name === this.state.data.position ? this.activeClassNames : this.inactiveClassNames} flex flex-col items-center justify-center aspect-square border-2 rounded-md p-0 md:p-3 relative ring-4 duration-300 hover:border-purple-500 hover:ring-purple-400 cursor-pointer`}>
                            {position.name === this.state.data.position && (
                                <span className="absolute text-md z-10 top-2 left-2 w-8 h-8 bg-purple-300 grid place-items-center rounded-full">
                                    <i className="fas fa-check"></i>
                                </span>
                            )}
                            <span className="text-4xl"><i className={position.icon}></i></span>
                            <span className="mt-4 text-lg text-gray-600 text-center">{position.title}</span>
                        </div>
                    ))}
                </div>
                <div id="name" className="col-span-full lg:col-span-1">
                    <p className="font-semibold text-lg">- نام و  نام خانوادگی</p>
                    <input type="text" className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-purple-500 ring-4 ring-transparent focus:ring-purple-200 duration-300" />
                </div>
                <div id="phone" className="col-span-full lg:col-span-1">
                    <p className="font-semibold text-lg">- شماره تماس</p>
                    <input type="text" className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-purple-500 ring-4 ring-transparent focus:ring-purple-200 duration-300" style={{ direction: 'ltr' }} />
                </div>
                <div id="description" className="col-span-full">
                    <p className="font-semibold text-lg">- هدف تبلیغاتی یا برند سازی شما</p>
                    <textarea className="w-full p-3 mt-3 rounded-md border-2 border-gray-400 outline-none focus:border-purple-500 ring-4 ring-transparent focus:ring-purple-200 duration-300" cols="30" rows="10" placeholder={this.state.placeholder}></textarea>
                </div>
                <div className="col-span-full text-center">
                    <button onClick={this.handleSendForm} className="w-fit py-2 px-6 text-base shadow-lg bg-slate-500 text-slate-50 hover:bg-purple-500 duration-200 cursor-pointer">ارسال اطلاعات</button>
                </div>
            </div>
        )
    }
}

export default Form;