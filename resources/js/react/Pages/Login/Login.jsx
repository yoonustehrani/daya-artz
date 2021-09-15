
import React, { Component } from 'react'
import AuthContext from '../../context/AutrhContext';
import { Link } from 'react-router-dom'
import axios from 'axios';

class Login extends Component {
    constructor(props) {
        super(props);
        this.changeSectionRef = React.createRef()
        this.formRef = React.createRef()
        this.state = {
            signup: {
                user_name: "",
                email: "",
                phone_number: "",
                password: "",
                rep_password: ""
            },
            login: {
                user_name: "",
                phone_number: "",
                password: ""
            },
            isLoggingIn: false
        }
    }

    componentDidMount() {
        if (! this.context.user) {
            document.title = "Login"
        }
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
            $(".change-form").addClass("width-change")
            $(".change-form").find("button").addClass(`${this.state.isLoggingIn ? "bounceOutLeft" : "bounceOutRight"}`)
            setTimeout(() => {
                $(".change-form").removeClass("width-change")
                $(".daya-logo").find("img")[0].classList.toggle("tada")
                $(".change-form").find("button").removeClass("bounceInRight bounceInLeft bounceOutLeft bounceOutRight")
            }, 1500);

            setTimeout(() => {
                $(".change-form").find("h2, p").each(function() {
                    this.classList.toggle("d-none")
                })
                $(".change-form").find("button")[0].innerHTML = this.state.isLoggingIn ? "ثبت نام" : "ورود"
                $(".login-form").find("h2")[0].innerHTML = this.state.isLoggingIn ? "ورود به دایا" : "ثبت نام در دایا"
                $(".login-form").find("button")[0].innerHTML = this.state.isLoggingIn ? "ورود" : "ثبت نام"
                $(".change-form").find("button").toggleClass(`${this.state.isLoggingIn ? "bounceOutLeft bounceInRight" : "bounceOutRight bounceInLeft"}`)
                $(".login-form").find(".input-group, .forgot-ps").each(function() {
                    this.classList.toggle("d-none")
                })
                $(".daya-logo")[0].classList.toggle("purple-cl")
                $(".daya-logo").find("img")[0].src = this.state.isLoggingIn ? `${APP_PATH}images/daya-white-logo.png` : `${APP_PATH}images/daya-logo-circular.png`
                $(".daya-logo").find("img")[0].classList.toggle("tada")
                $(".change-form-content").toggleClass("left-20 right-20")
                $(".change-form-content").find("h2, p").each(function() {
                    $(this).toggleClass("d-none")
                })
            }, 500)
        })
    }

    handleLogin = () => {  
        if (this.state.isLoggingIn) {
            let { user_name, password } = this.state.login
            axios.post('http://localhost/api/v2/login', {email: user_name, password: password}).then(res => {
                let {user, token} = res.data
                localStorage.setItem('userAccessToken', `${token.type} ${token.accessToken}`)
                // Logout the user
                this.context.setLogoutTime(token.expires_in)
            })
        }
    }

    render() {
        let {signup, login, isLoggingIn} = this.state
        if (this.context.user) {
            this.props.history.goBack()
            return null
        }
        return (
            <div>
                <div className="auth-container">
                    <div className="login-bg">
                        <Link to="/" className="daya-logo ltr">
                            <img className="animated" src={APP_PATH + "images/daya-logo-circular.png"} alt="daya-logo" />
                            <span>DAYA-ARTZ</span>
                        </Link>
                        <div ref={this.changeSectionRef} className={`change-form ${isLoggingIn ? "bg-p-100 right-60" : ""}`}>
                            <div>
                                <button onClick={this.changeSection.bind(this)} className="btn btn-lg badge-pill animated">ورود</button>
                            </div>
                        </div>
                        <div className="change-form-content left-20">
                            <h2 className="">!خوش آمدید</h2>
                            <p className="">اگر در حال حاضر داخل دایا حساب دارید با زدن دکمه زیر وارد صفحه ورود شوید ...</p>
                            <h2 className="d-none">!سلام دوست عزیز</h2>
                            <p className="d-none">اگه هنوز ثبت نام نکردی میتونی با زدن دکمه زیر ثبت نام در دایا رو آغاز کنی ...</p>
                        </div>
                        <div className={`login-form ${isLoggingIn ? "right-40" : ""}`}>
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
                            <div className="input-group d-none">
                                <input type="text" className="form-control" value={login.user_name} placeholder="ایمیل یا نام کاربری" onChange={this.onChangeField.bind(this, "user_name", "login")} />
                                <div className="input-group-append"><span className="input-group-text"><i className="fas fa-user"></i></span></div>
                            </div>
                            <div className="input-group d-none">
                                <input type="password" className="form-control" value={login.password} placeholder="رمز عبور" onChange={this.onChangeField.bind(this, "password", "login")} />
                                <div className="input-group-append"><span className="input-group-text"><i className="fas fa-lock"></i></span></div>
                            </div>
                            <a href="#" className="forgot-ps d-none">رمز عبور خودتون رو فراموش کردید؟</a>
                            <button className="btn btn-lg badge-pill " onClick={this.handleLogin}>ثبت نام</button>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

Login.contextType = AuthContext

export default Login