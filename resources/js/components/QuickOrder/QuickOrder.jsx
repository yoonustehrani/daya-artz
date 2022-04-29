import React, { Component } from 'react';
import axios from 'axios';
import { Spinner } from 'react-activity'

class QuickOrder extends Component {
    constructor(props) {
        super(props)
        this.state = {
            services: [],
            order: {
                order_items: [],
                phone_number: "",
                fullname: "",
                description: ""
            },
            searchResults: [],
            searching: false,
            searchValue: "",
            rules: {
                phone_number: ['required','regex:/09[0-9]{9}/', 'numeric'],
                fullname: ['required', 'string', 'min:3', 'max:40'],
                description: ['max:2000'],
                order_items: ['min:1']
            },
            error: false,
            errors: {},
            loading: false,
            active: true,
            message: null,
            loadingInitials: true,
            displayCombo: false
        }
    }
    handleToggle = (searching=false, e) => {
        let targetInput = $(e.target).closest("label.combo-item").find("input"),
        { id, checked, title, icon } = searching ? {id: $(targetInput).attr("comboid"), title: $(targetInput).attr("title"), icon: $(targetInput).attr("icon"), checked: $(targetInput).attr("checked")} : e.target,
        { services } = this.state        
        if (id) {
            this.setState(prev => ({
                order: {
                    ...prev.order,
                    order_items: ! prev.order.order_items.includes(id)
                    ? [...prev.order.order_items, id]
                    : prev.order.order_items.filter(x => x !== id)
                }
            }), () => {
                if (searching) {
                    !services.some(service => service.id === id) && this.setState(prev => ({services: [...prev.services, {id: id, title: title, icon_class: icon }]}))
                    this.setState({displayCombo: false})
                }
            })
        }
    }
    handleChange = (key, e) => {
        let { value } = e.target
        this.setState(prev => {
            let newOrder = prev.order
            newOrder[key] = value
            return {
                order: newOrder
            }
        })
    }
    handleRecaptcha = (clb) => {
        let {reCAPTCHA_Key} = this.props
        grecaptcha.ready(async function() {
            try {
                const token = await grecaptcha.execute(reCAPTCHA_Key, {action: 'quick_order'})
                clb(token)
            } catch (err) {
                console.log(err)
            }
        });
    }
    handleFormSubmit = async (recaptch_token) => {
        let { fullname, phone_number, description, order_items } = this.state.order
        let data = {fullname, phone_number, description, order_items, recaptch_token};
        try {
            const response = await axios.post(this.props.targetApi, data);
            let {okay, message} = response.data;
            if (okay) {
                this.setState({
                    message,
                    order: {
                        order_items: [],
                        phone_number: "",
                        fullname: "",
                        description: ""
                    },
                    loading: false,
                    active: false
                })
            }
        } catch (error) {
            if (error.response) {
                // The request was made and the server responded with a status code
                // that falls out of the range of 2xx
                let {data, status} = error.response
                let newState;
                switch (status) {
                    case 422:
                        newState = {error: "خطا", errors: data.errors}
                        break;
                    case 403:
                        newState = {error: data.message}
                        break;
                    default:
                        newState = {error: "خطا"}
                        break;
                }
                newState['loading'] = false;
                this.setState(newState);
            } else if (error.request) {
                // The request was made but no response was received
                this.setState({
                    error: "پاسخی از سمت سرور دریافت نشد لطفا مجددا تلاش کنید.",
                    loading: false
                })
            } else {
                // Something happened in setting up the request that triggered an Error
                this.setState({
                    error: "مشکلی در ارسال اطلاعات به سمت سرور وجود دارد.",
                    loading: false
                })
            }
        }
        this.scrollToTop()
    }
    handleSubmit = (e) => {
        e.preventDefault()
        this.setState({
            loading: true,
            error: false,
            errors: {}, 
        }, this.handleRecaptcha.bind(this, this.handleFormSubmit))
    }
    handleSearch = (e) => {
        let { value } = e.target, { searchApi } = this.props
        this.setState({searching: true, searchValue: value}, () => {
            if (value.length < 2) {
                this.setState({searchResults: [], searching: false})
            } else {
                axios.get(`${searchApi}?q=${value.trim()}`).then(res => {
                    let { data } = res
                    this.setState({searchResults: data, searching: false})
                })
            }
        })
    }
    onDisplayCombo = (displayCombo, e) => {
        this.setState({displayCombo: displayCombo})
    }
    scrollToTop = () => {
        let targetElem = $("#react-quick-order"),
        target_position = targetElem.offset().top + $("body").scrollTop() - 100
        $("body").animate({
            scrollTop: target_position
        }, 500)
    }
    componentDidMount() {
        let { dataInitial } = this.props
        axios.get(dataInitial).then(res => {
            let { data } = res
            this.setState({services: data, loadingInitials: false})
        })
    }
    
    render() {
        let { services, order, error, errors, message, active, loading, searchResults, searching, searchValue, loadingInitials, displayCombo } = this.state
        let {fullname, phone_number, description} = order
        let messages = [];
        if (Object.keys(errors).length) {
            Object.keys(errors).map(err => {
                errors[err].map(message => {
                    messages.push(message)
                })
            })
        }
        return (
            <>
                {error && 
                    <div className="alert alert-danger text-right rtl text-red-600 bg-red-300 p-5">
                        <span className='p-0 m-0'><i className="fas fa-exclamation-circle"></i> {error}</span>
                        <ul className='m-0 mr-4 p-0 px-2'>
                        {messages.map((m, i) => (
                            <li key={i}>{m}</li>
                        ))}
                        </ul>
                    </div>
                }
                {message &&
                    <div className="alert alert-success text-right rtl text-green-600 bg-green-200 p-5">
                        <span><i className="fas fa-check-circle"></i> {message}</span>
                    </div>
                }
                <form action="#" onSubmit={this.handleSubmit}>
                    <div className="input-group float-right mb-3">
                        <input type="text" name="fast-order-name" disabled={! active} className="form-control" placeholder="نام و نام خانوادگی" value={fullname} onChange={this.handleChange.bind(this, 'fullname')}/>
                        <div className="input-group-append">
                            <span className="input-group-text"><i className="fas fa-user"></i></span>
                        </div>
                    </div>
                    <div className="input-group float-right mb-3">
                        <input type="text" name="fast-order-number" disabled={! active} className="form-control ltr text-left" placeholder="شماره تلفن" value={phone_number} onChange={this.handleChange.bind(this, 'phone_number')}/>
                        <div className="input-group-append">
                            <span className="input-group-text"><i className="fas fa-mobile-alt"></i></span>
                        </div>
                    </div>
                    <div className="order-types mb-3 w-100">
                        {loadingInitials ? <div className="flex-center w-100"><Spinner size={30} color="#C5AEF6" /></div>
                         : services && services.length > 0 && services.map((service, i) => (
                            <div key={i} className="checkbox">
                                <label className="checkbox-wrapper" htmlFor={service.id}>
                                    <input type="checkbox" className="checkbox-input" disabled={! active} checked={order.order_items.includes(`${service.id}`)} id={service.id} onChange={this.handleToggle.bind(this, false)}/>
                                    <span className="checkbox-tile">
                                        <span className="checkbox-icon">
                                            <i className={service.icon_class}></i>
                                        </span>
                                        <span className="checkbox-label">{service.title}</span>
                                    </span>
                                </label>
                            </div>
                        ))}
                    </div>
                    <div className="input-group float-right mb-3">
                        <input type="text" id='combo-input' className='form-control' placeholder='جستجوی خدمات دیگر' value={searchValue} onChange={this.handleSearch} onFocus={this.onDisplayCombo.bind(this, true)} onBlur={this.onDisplayCombo.bind(this, false)} />
                        <div className="input-group-append">
                            <span className="input-group-text"><i className="far fa-search"></i></span>
                        </div>
                        <div className={`combo-box ${displayCombo ? "d-block" : "d-none"}`}>
                            {searching ? <div className='py-2 flex-center'><Spinner size={20} color="#C5AEF6"/></div>
                             : searchResults && searchResults.length > 0 ? searchResults.map((item, i) => {
                                let { icon_class, title, group, id } = item, checked = order.order_items.includes(id.toString())
                                return (
                                    <label className='combo-item' key={i} onMouseDown={this.handleToggle.bind(this, true)}>
                                        <input type="checkbox" className='d-none' disabled={! active} checked={checked} comboid={item.id} title={item.title} icon={item.icon_class} onChange={() => {}} />
                                        <div className='combo-left'>
                                            {checked && <i className='fas fa-check-circle'></i>}
                                            <p className="combo-group">{group}</p>
                                        </div>
                                        <div className='combo-right'>
                                            <p className='combo-title'>{title}</p>
                                            <span className='combo-icon'><i className={icon_class}></i></span>
                                        </div>
                                    </label>
                                )
                             })
                             : searchResults.length === 0 && searchValue.length > 0 && <p className='combo-no-item'>نتیجه ای یافت نشد</p>
                            }
                        </div>
                    </div>
                    <div className="form-group">
                        <textarea name="fast-order-description" cols="30" rows="10" disabled={! active} value={description} onChange={this.handleChange.bind(this, 'description')} className="form-control" placeholder="توضیحات"></textarea>
                    </div>
                    {loading && <div className='btn'><Spinner /></div>}
                    {! loading && <button disabled={! active} type="submit" style={{ cursor: active ? 'pointer' : 'not-allowed' }} className="btn rounded-lg text-xl text-slate-50 duration-300">ثبت سفارش</button>}
                </form>
            </>
        );
    }
}

export default QuickOrder;