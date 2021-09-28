import React, { Component } from 'react';

class Signup extends Component {

    componentDidMount() {
        $("#register-country-select").select2(this.props.select2Config)
    }
    
    render() {
        let { changeLoginMethod, changeSection, onChangeField, handleLogin, signup, login_method, user_name, email, phone_number, password, rep_password } = this.props
        return (
            <div>
                <h2>ثبت نام در دایا</h2>
                <div className="login-icons">
                    <span><i className="fab fa-google"></i></span>
                    <span><i className="fab fa-linkedin-in"></i></span>
                </div>
                <span className="gray mb-2 animated" onClick={changeLoginMethod.bind(this)}>
                    {login_method === "email" ? "با استفاده از اکانت ایمیل شما:" : "با استفاده از شماره موبایل:"}
                    <i className="fas fa-long-arrow-alt-left mr-1"></i>
                    <i className="fas fa-mobile mr-1"></i>
                </span>
                <div className="input-group">
                    <input type="text" value={user_name} className="form-control" placeholder="نام کاربری" onChange={onChangeField.bind(this, "signup", "user_name")}/>
                    <div className="input-group-append"><span className="input-group-text"><i className="fas fa-user"></i></span></div>
                </div>
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
                                    <option value="united-states">+1</option>
                                    <option value="united-kingdom">+356</option>
                                </select>
                            </span>
                        </div>
                        <input type="text" value={phone_number} className="form-control ltr" placeholder="شماره موبایل" onChange={onChangeField.bind(this, "signup", "phone_number")} />
                        <div className="input-group-append"><span className="input-group-text"><i className="fas fa-mobile"></i></span></div>
                    </div>
                </div>
                <div className="input-group">
                    <input type="password" value={password} className="form-control" placeholder="رمز عبور" onChange={onChangeField.bind(this, "signup", "passowrd")} />
                    <div className="input-group-append"><span className="input-group-text"><i className="fas fa-lock"></i></span></div>
                </div>
                <div className="input-group">
                    <input type="password" value={rep_password} className="form-control" placeholder="تکرار رمز عبور" onChange={onChangeField.bind(this, "signup", "rep_passowrd")} />
                    <div className="input-group-append"><span className="input-group-text"><i className="fas fa-redo"></i></span></div>
                </div> 
                <button className="btn btn-lg badge-pill " onClick={handleLogin}>ثبت نام</button>
                <span className="change-form-mobile d-md-none mt-2" onClick={changeSection.bind(this)}>برای ورود به دایا کلیک کنید!</span>
            </div>
        );
    }
}

export default Signup;