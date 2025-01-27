import React, { Component } from 'react';
import { Windmill } from 'react-activity';
import { Link } from 'react-router-dom';
import { state_select } from '../../../components/select2'

class Login extends Component {
    componentDidMount() {
        $("#login-country-select").select2(state_select)
    }
    
    render() {
        let { changeLoginMethod, changeSection, onChangeField, fields_info, login_method, handleLogin, history, sending_data } = this.props, { email, phone_number, password } = fields_info
        return (
            <div>
                <h2>ورود به دایا آرتز</h2>
                {/* <div className="login-icons">
                    <span><i className="fab fa-google"></i></span>
                    <span><i className="fab fa-linkedin-in"></i></span>
                </div> */}
                <span className="gray mb-2 animated" onClick={changeLoginMethod.bind(this)}>
                    {login_method === "email" ? "با استفاده از شماره تلفن" : "با استفاده از اکانت ایمیل"}
                    <i className="fas fa-long-arrow-alt-left mr-1"></i>
                    <i className="fas fa-mobile mr-1"></i>
                </span>
                <form onSubmit={handleLogin} className="form-group default-style">
                    <div className="email-phone-container input-group">
                        <div className={`input-group animated ${login_method === "email" ? "" : "d-none"}`}>
                            <input type="text" className="form-control" value={email} placeholder="ایمیل یا نام کاربری" onChange={onChangeField.bind(this, "login", "email")} />
                            <div className="input-group-append"><span className="input-group-text"><i className="fas fa-user"></i></span></div>
                        </div>
                        <div className={`input-group animated ${login_method === "phone"  ? "" : "d-none"}`}>
                            <div className="input-group-prepend">
                                {/* <span className="country_codes_holder">
                                    <select id="login-country-select">
                                        <option value="iran">+98</option>
                                    </select>
                                </span> */}
                                <span className="input-group-text ltr">+98</span>
                            </div>
                            <input type="text" value={phone_number} className="form-control ltr" placeholder="شماره موبایل" onChange={onChangeField.bind(this, "login", "phone_number")} />
                            <div className="input-group-append"><span className="input-group-text"><i className="fas fa-mobile"></i></span></div>
                        </div>
                    </div>
                    <div className="input-group">
                        <input type="password" className="form-control" value={password} placeholder="رمز عبور" onChange={onChangeField.bind(this, "login", "password")} />
                        <div className="input-group-append"><span className="input-group-text"><i className="fas fa-lock"></i></span></div>
                    </div>
                    {sending_data && <span className='auth-windmill'><Windmill size={30} color="#6332df" /></span>}
                    <button className="btn btn-lg badge-pill" type="submit">ورود</button>
                    <br />
                    <Link to="/auth/forgetPassword" className="forgot-ps">رمز عبور خودتون رو فراموش کردید؟</Link>
                </form>
                <span className="change-form-mobile d-md-none mt-2" onClick={changeSection.bind(this, history, false)}>برای ساخت حساب کلیک کنید!</span>              
            </div>
        );
    }
}

export default Login;