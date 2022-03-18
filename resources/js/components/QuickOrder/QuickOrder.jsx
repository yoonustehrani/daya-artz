import React, { Component } from 'react';
import axios from 'axios';
import { Spinner } from 'react-activity'

class QuickOrder extends Component {
    constructor(props) {
        super(props)
        this.state = {
            services: [
                {
                    title: "لوگو",
                    name: "logo",
                    icon: "images/brand.svg",
                },
                {
                    title: "کاتالوگ",
                    name: "catalog",
                    icon: "images/big-brochure.svg",
                },
                {
                    title: "کارت ویزیت",
                    name: "visit-card",
                    icon: "images/credit-card.svg",
                },
                {
                    title: "سربرگ",
                    name: "letterhead",
                    icon: "images/paper.svg",
                },
                {
                    title: "ست اداری",
                    name: "official set",
                    icon: "images/office-tools.svg",
                },
            ],
            order: {
                order_items: [],
                phone_number: "",
                fullname: "",
                description: ""
            },
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
            message: null
        }
    }
    handleToggle = (e) => {
        let { name, checked } = e.target;
        this.setState(prev => ({
            order: {
                ...prev.order,
                order_items: checked && ! prev.order.order_items.includes(name)
                ? [...prev.order.order_items, name]
                : prev.order.order_items.filter(x => x !== name)
            }
        }))
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
    }
    handleSubmit = (e) => {
        e.preventDefault()
        this.setState({
            loading: true,
            error: false,
            errors: {}, 
        }, this.handleRecaptcha.bind(this, this.handleFormSubmit))
    }
    render() {
        let { services, order, error, errors, message, active, loading } = this.state
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
                        {services.map((service, i) => (
                            <div key={i} className="checkbox">
                                <label className="checkbox-wrapper">
                                    <input type="checkbox" className="checkbox-input" disabled={! active} checked={order.order_items.includes(service.name)} name={service.name} onChange={this.handleToggle}/>
                                    <span className="checkbox-tile">
                                        <span className="checkbox-icon">
                                            <img src={APP_PATH + service.icon}/>
                                        </span>
                                        <span className="checkbox-label">{service.title}</span>
                                    </span>
                                </label>
                            </div>
                        ))}
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