import React, { Component } from 'react';
import { state_select } from '../../../components/select2'

class Signup extends Component {
    
    componentDidMount() {
        $("#register-country-select").select2(state_select)
    }
    
    render() {
        let { changeLoginMethod, changeSection, onChangeField, handleRegister, fields_info, login_method, history } = this.props, { email, phone_number, password, password_confirmation } = fields_info
        return (
            <div>
                <h2>ثبت نام در دایا آرتز</h2>
                <div className="login-icons">
                    <span><i className="fab fa-google"></i></span>
                    <span><i className="fab fa-linkedin-in"></i></span>
                </div>
                <span className="gray mb-2 animated" onClick={changeLoginMethod.bind(this)}>
                    {login_method === "email" ? "با استفاده از شماره تلفن" : "با استفاده از اکانت ایمیل"}
                    <i className="fas fa-long-arrow-alt-left mr-1"></i>
                    <i className="fas fa-mobile mr-1"></i>
                </span>
                <form onSubmit={handleRegister} className="form-group default-style">
                    <div className="email-phone-container input-group">
                        <div className={`input-group animated ${login_method === "email" ? "" : "d-none"}`}>
                            <input type="email" value={email} className="form-control" placeholder="ایمیل" onChange={onChangeField.bind(this, "signup", "email")}/>
                            <div className="input-group-append"><span className="input-group-text"><i className="fas fa-at"></i></span></div>
                        </div>
                        <div className={`input-group animated ${login_method === "phone" ? "" : "d-none"}`}>
                            <div className="input-group-prepend">
                                <span className="country_codes_holder">
                                    <select id="register-country-select">
                                        <option value="iran">+98</option>
                                    </select>
                                </span>
                            </div>
                            <input type="text" value={phone_number} className="form-control ltr" placeholder="شماره موبایل" onChange={onChangeField.bind(this, "signup", "phone_number")} />
                            <div className="input-group-append"><span className="input-group-text"><i className="fas fa-mobile"></i></span></div>
                        </div>
                    </div>
                    <div className="input-group">
                        <input type="password" value={password} name="password" className="form-control" placeholder="رمز عبور" onChange={onChangeField.bind(this, "signup", "password")} />
                        <div className="input-group-append"><span className="input-group-text"><i className="fas fa-lock"></i></span></div>
                    </div>
                    <div className="input-group">
                        <input type="password" value={password_confirmation} name="password_confirmation" className="form-control" placeholder="تکرار رمز عبور" onChange={onChangeField.bind(this, "signup", "password_confirmation")} />
                        <div className="input-group-append"><span className="input-group-text"><i className="fas fa-redo"></i></span></div>
                    </div>
                    <button className="btn btn-lg badge-pill" type="submit">ثبت نام</button>
                </form>
                <span className="change-form-mobile d-md-none mt-2" onClick={changeSection.bind(this, history, false)}>برای ورود به دایا آرتز کلیک کنید!</span>
            </div>
        );
    }
}

export default Signup;