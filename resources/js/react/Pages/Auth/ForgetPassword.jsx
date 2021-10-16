import React, { Component } from 'react';
import { state_select } from '../../../components/select2'
import { Link } from 'react-router-dom';

class ForgetPassword extends Component {
    componentDidMount() {
        $("#forget_pass_select").select2(state_select)
    }

    checkCode = () => {

    }
    
    render() {
        let { changeLoginMethod, changeSection, onChangeField, handleLogin, fields_info, login_method } = this.props, { phone_number, email } = fields_info
        return (
            <div>
                <h2>فراموشی رمز عبور</h2>
                <p className="mb-4">با وارد کردن آدرس ایمیل و یا شماره تلفن خود میتوانید حساب خود را بازیابی کنید!</p>
                <span className="gray mb-2 animated" onClick={changeLoginMethod.bind(this)}>
                    {login_method === "email" ? "با استفاده از شماره تلفن" : "با استفاده از اکانت ایمیل"}
                    <i className="fas fa-long-arrow-alt-left mr-1"></i>
                    <i className="fas fa-mobile mr-1"></i>
                </span>
                <div className="email-phone-container input-group">
                    <div className={`input-group animated ${login_method === "email" ? "" : "d-none"}`}>
                        <input type="email" value={email} className="form-control" placeholder="ایمیل" onChange={onChangeField.bind(this, "signupConfirm", "email")}/>
                        <div className="input-group-append"><span className="input-group-text"><i className="fas fa-at"></i></span></div>
                    </div>
                    <div className={`input-group animated ${login_method === "phone" ? "" : "d-none"}`}>
                        <div className="input-group-prepend">
                            <span className="country_codes_holder">
                                <select id="forget_pass_select">
                                    <option value="iran">+98</option>
                                    <option value="united-states">+1</option>
                                    <option value="united-kingdom">+356</option>
                                </select>
                            </span>
                        </div>
                        <input type="text" value={phone_number} className="form-control ltr" placeholder="شماره موبایل" onChange={onChangeField.bind(this, "signupConfirm", "phone_number")} />
                        <div className="input-group-append"><span className="input-group-text"><i className="fas fa-mobile"></i></span></div>
                    </div>
                </div>
                <button className="btn btn-lg badge-pill " onClick={this.checkCode.bind(this)}>ارسال کد</button>
                <Link to="/auth/login" className="change-form-mobile mt-2">برای ورود به دایا کلیک کنید!</Link>
            </div>
        );
    }
}

export default ForgetPassword;