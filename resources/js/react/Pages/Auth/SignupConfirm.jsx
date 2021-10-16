import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class SignupConfirm extends Component {
    goToSignup = () => {
        let {history} = this.props
        history.push("/auth/signup")
    }

    checkCode = () => {

    }

    render() {
        let { changeLoginMethod, changeSection, onChangeField, handleLogin, fields_info, login_method } = this.props, { code } = fields_info

        return (
            <div>
                <h2>اتمام پروسه ثبت نام</h2>
                <p>با وارد کردن کد ارسال شده به ایمیل یا شماره تلفن خود، پروسه ثبت نام خود را نهایی کنید و از تمامی خدمات دایا بهره مند شوید.</p>
                <div className="input-group">
                    <input type="text" value={code} className="form-control" placeholder="کد ارسالی" onChange={onChangeField.bind(this, "signupConfirm", "code")}/>
                    <div className="input-group-append"><span className="input-group-text"><i className="fas fa-user"></i></span></div>
                </div>
                <button className="btn btn-lg badge-pill " onClick={this.checkCode.bind(this)}>نهایی سازی</button>
                <Link to="/auth/signup" className="change-form-mobile mt-2">برای ساخت حساب کلیک کنید!</Link>              
            </div>
        );
    }
}

export default SignupConfirm;