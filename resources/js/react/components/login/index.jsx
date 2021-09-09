import React, { Component } from 'react'

export default class Login extends Component {
    render() {
        return (
            <div>
                <div className="auth-container">
                    <div className="login-bg">
                        <div className="change-form col-12 col-md-5 float-left">
                            <h2>!خوش آمدید</h2>
                            <p>اگر در حال حاضر داخل دایا حساب دارید با زدن دکمه زیر وارد صفحه ورود شوید ...</p>
                            <button className="btn btn-lg badge-pill ">ورود</button>
                        </div>
                        <div className="login-form col-12 col-md-7">
                            <h2>ثبت نام در دایا</h2>
                            <div className="login-icons">
                                <span><i className="fab fa-google"></i></span>
                                <span><i className="fab fa-linkedin-in"></i></span>
                            </div>
                            <p className="gray">بااستفاده از اکانت ایمیل شما:</p>
                            <div className="form-group">
                                <input type="email" className="form-control badge-pill" placeholder="ایمیل یا نام کاربری" />
                            </div>
                            <div className="form-group">
                                <input type="password" className="form-control badge-pill" placeholder="رمز عبور" />
                            </div>
                            <button className="btn btn-lg badge-pill ">ثبت نام</button>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
