import React, { Component } from 'react'

export default class Login extends Component {
    constructor(props) {
        super(props);
        this.changeSectionRef = React.createRef()
        this.formRef = React.createRef()
    }
    
    state = {
        signup: {
            user_name: "",
            email: "",
            password: "",
            rep_password: ""
        },
        login: {
            user_name: "",
            password: ""
        },
        isLoggingIn: false
    }

    onChangeField = (field, type, e) => {
        e.persist()
        this.setState(prevState => ({
            [type]: Object.assign(prevState[type], {[field]: e.target.value})
        }))
    }

    changeSection = () => {
        this.setState(prevState => ({
            isLoggingIn: !prevState.isLoggingIn
        }), () => {
            this.changeSectionRef.current.classList.toggle("width-change")
            setTimeout(() => {
                this.changeSectionRef.current.classList.remove("width-change")
                $(".change-form").find("button")[0].classList.toggle("fadeIn")
            }, 1500);
            setTimeout(() => {
                $(".change-form").find("h2, p").each(function() {
                    this.classList.toggle("d-none")
                })
                $(".change-form").find("button")[0].classList.toggle("fadeIn")
                $(".change-form").find("button")[0].innerHTML = this.state.isLoggingIn ? "ثبت نام" : "ورود"
            }, 500)
        })
    }

    render() {
        let {signup, login, isLoggingIn} = this.state
        return (
            <div>
                <div className="auth-container">
                    <div className="login-bg">
                        <div ref={this.changeSectionRef} className={`change-form ${isLoggingIn ? "bg-p-100" : "right-60"}`}>
                            <div>
                                <h2 className="animated flash welcome">!خوش آمدید</h2>
                                <p className="animated flash enter">اگر در حال حاضر داخل دایا حساب دارید با زدن دکمه زیر وارد صفحه ورود شوید ...</p>
                                <h2 className="animated flash hey d-none">!سلام دوست عزیز</h2>
                                <p className="animated flash register d-none">اگه هنوز ثبت نام نکردی میتونی با زدن دکمه زیر ثبت نام در دایا رو آغاز کنی ...</p>
                                <button onClick={this.changeSection.bind(this)} className="btn btn-lg badge-pill animated">ورود</button>
                            </div>
                        </div>
                        <div ref={this.formRef} className={`login-form ${isLoggingIn ? "right-40" : ""}`}>
                            <h2>ثبت نام در دایا</h2>
                            <div className="login-icons">
                                <span><i className="fab fa-google"></i></span>
                                <span><i className="fab fa-linkedin-in"></i></span>
                            </div>
                            <p className="gray">بااستفاده از اکانت ایمیل شما:</p>
                            <div className="input-group">
                                <input type="text" value={signup.user_name} className="form-control" placeholder="نام کاربری" onChange={this.onChangeField.bind(this, "user_name", "signup")}/>
                                <div className="input-group-append"><span className="input-group-text"><i className="fas fa-user"></i></span></div>
                            </div>
                            <div className="input-group">
                                <input type="email" value={signup.email} className="form-control" placeholder="ایمیل" onChange={this.onChangeField.bind(this, "email", "signup")}/>
                                <div className="input-group-append"><span className="input-group-text"><i className="fas fa-at"></i></span></div>
                            </div>
                            <div className="input-group">
                                <input type="password" value={signup.password} className="form-control" placeholder="رمز عبور" onChange={this.onChangeField.bind(this, "passowrd", "signup")} />
                                <div className="input-group-append"><span className="input-group-text"><i className="fas fa-lock"></i></span></div>
                            </div>
                            <div className="input-group">
                                <input type="password" value={signup.rep_password} className="form-control" placeholder="تکرار رمز عبور" onChange={this.onChangeField.bind(this, "rep_passowrd", "signup")} />
                                <div className="input-group-append"><span className="input-group-text"><i className="fas fa-redo"></i></span></div>
                            </div>
                            <button className="btn btn-lg badge-pill ">ثبت نام</button>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}
