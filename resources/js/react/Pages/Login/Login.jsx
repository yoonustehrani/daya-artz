
import React, { Component } from 'react'
import AuthContext from '../../context/AutrhContext';
import { Link } from 'react-router-dom'
import axios from 'axios';
import HttpClient from '../../../services/HttpClient'
import { getCookie } from '../../../services/CookieService'

const httpService = new HttpClient({
    baseURL: "http://localhost/",
    headers: {
        'X-XSRF-TOKEN': getCookie('XSRF-TOKEN'),
        'Accept': 'application/json'
    }
})

class Login extends Component {
    state = {
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
        isLoggingIn: false,
        login_method: "email"
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
            let { isLoggingIn } = this.state
            $(".change-form").each(function() {
                $(this).addClass("width-change")
                $(this).find("button").addClass(`${isLoggingIn ? "bounceOutLeft" : "bounceOutRight"}`)
                if (window.innerWidth < 768) {
                    $(".input-group").each(function() {
                        !$(this).hasClass("d-none") && !$(this).parent(".email-phone-container")[0] ? $(this).addClass("zoomOut") : ""
                    })
                    $(".forgot-ps").addClass("flipOutX")
                }
            })

            setTimeout(() => {
                $(".change-form").each(function() {
                    $(this).find("h2, p").each(function() {
                        $(this).toggleClass("d-none")
                    })
                    $(this).find("button")[0].innerHTML = isLoggingIn ? "ثبت نام" : "ورود"
                    $(this).find("button").toggleClass(`${isLoggingIn ? "bounceOutLeft bounceInRight" : "bounceOutRight bounceInLeft"}`)
                })
                $(".login-form").each(function() {
                    $(this).find("h2")[0].innerHTML = isLoggingIn ? "ورود به دایا" : "ثبت نام در دایا"
                    $(this).find("button")[0].innerHTML = isLoggingIn ? "ورود" : "ثبت نام"
                    $(this).find(".input-group, .forgot-ps").each(function() {
                        !$(this).parent(".email-phone-container")[0] ? $(this).toggleClass("d-none") : ""
                    })
                    if (window.innerWidth < 768) {
                        $(".input-group").each(function() {
                            !$(this).hasClass("d-none") && !$(this).parent(".email-phone-container")[0] ? $(this).addClass("zoomIn") : ""
                        })
                        $(".forgot-ps").toggleClass("flipOutX flipInX")
                    }
                })
                $(".daya-logo").each(function() {
                    $(this).toggleClass("purple-cl")
                    $(this).find("img")[0].src = isLoggingIn ? `${APP_PATH}images/daya-white-logo.png` : `${APP_PATH}images/daya-logo-circular.png`
                    $(this).find("img").toggleClass("tada")
                })
                $(".change-form-content").each(function() {
                    $(this).toggleClass("left-20 right-20")
                    $(this).find("h2, p").each(function() {
                        $(this).toggleClass("d-none")
                    })
                })
            }, 500)

            setTimeout(() => {
                $(".change-form").each(function() {
                    $(this).removeClass("width-change")
                    $(this).find("button").removeClass("bounceInRight bounceInLeft bounceOutLeft bounceOutRight")
                })
                $(".daya-logo").find("img").toggleClass("tada")
                if (window.innerWidth < 768) {
                    $(".input-group").each(function() {
                        $(this).removeClass("zoomIn, zoomOut")
                    })
                    $(".forgot-ps").removeClass("flipInX")
                }
            }, 1500);
        })
    }

    handleLogin = () => {
        httpService.post('login', {email: 'yoonustehrani28@gmail.com', password: 'uss828487'}).then(res => {
            httpService.get('api/v1/user').then(res => {
                console.log(res.data);
            })
        })
    }

    changeLoginMethod = () => {
        this.setState(prevState => ({
            login_method: prevState.login_method === "email" ? "phone" : "email"
        }), () => {
            $(".input-group.animated").addClass("headShake")
            $(".gray.animated").each(function() {
                $(this).addClass("flipInY")
                $(this).find("i")[1].classList.toggle("fa-mobile")
                $(this).find("i")[1].classList.toggle("fa-at")
                setTimeout(() => {
                    $(this).removeClass("flipInY")
                }, 1000)
            })
        })
    }

    componentDidMount() {
        let formatState = (state) => {
            if(!state.id) {
                return state.text
            }
            let baseUrl = `${APP_PATH}images/world-icons/`
            let $state = $(
            `<span class="span-option"><img src=${baseUrl + state.id.toLowerCase() + ".svg"} class="img-flag"/>${state.text}</span>`)
            return $state
        }
        let select2_config = {
            templateResult: formatState,
            width: "100%",
            dir: "rtl"
        }
        $("#register-country-select").select2(select2_config)
        $("#login-country-select").select2(select2_config)
    }
    

    render() {
        let {signup, login, isLoggingIn, login_method} = this.state
        if (this.context.user) {
            this.props.history.goBack()
            return null
        }
        return (
            <div>
                <div className="auth-container">
                    <div className="login-bg">
                        <Link to="/" className="daya-logo ltr">
                            <img className="animated d-md-inline d-none" src={APP_PATH + "images/daya-logo-circular.png"} alt="daya-logo" />
                            <img className="animated d-md-none" src={APP_PATH + "images/daya-white-logo.png"} alt="daya-logo" />
                            <span>DAYA-ARTZ</span>
                        </Link>
                        <div className={`change-form d-md-block d-none ${isLoggingIn ? "bg-p-100 right-60" : ""}`}>
                            <div>
                                <button onClick={this.changeSection.bind(this)} className="btn btn-lg badge-pill animated">ورود</button>
                            </div>
                        </div>
                        <div className="change-form-content left-20 d-md-flex d-none">
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
                            <span className="gray animated mb-2" onClick={this.changeLoginMethod.bind(this)}>
                                {login_method === "email" ? "با استفاده از اکانت ایمیل شما:" : "با استفاده از شماره موبایل:"}
                                <i className="fas fa-long-arrow-alt-left mr-1"></i>
                                <i className="fas fa-mobile mr-1"></i>
                            </span>
                            <div className="input-group animated">
                                <input type="text" value={signup.user_name} className="form-control" placeholder="نام کاربری" onChange={this.onChangeField.bind(this, "user_name", "signup")}/>
                                <div className="input-group-append"><span className="input-group-text"><i className="fas fa-user"></i></span></div>
                            </div>
                            <div className="email-phone-container input-group animated">
                                <div className={`input-group animated ${login_method === "email" ? "" : "d-none"}`}>
                                    <input type="email" value={signup.email} className="form-control" placeholder="ایمیل" onChange={this.onChangeField.bind(this, "email", "signup")}/>
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
                                    <input type="text" value={signup.phone_number} className="form-control ltr" placeholder="شماره موبایل" onChange={this.onChangeField.bind(this, "phone_number", "signup")} />
                                    <div className="input-group-append"><span className="input-group-text"><i className="fas fa-mobile"></i></span></div>
                                </div>
                            </div>
                            <div className="input-group animated">
                                <input type="password" value={signup.password} className="form-control" placeholder="رمز عبور" onChange={this.onChangeField.bind(this, "passowrd", "signup")} />
                                <div className="input-group-append"><span className="input-group-text"><i className="fas fa-lock"></i></span></div>
                            </div>
                            <div className="input-group animated">
                                <input type="password" value={signup.rep_password} className="form-control" placeholder="تکرار رمز عبور" onChange={this.onChangeField.bind(this, "rep_passowrd", "signup")} />
                                <div className="input-group-append"><span className="input-group-text"><i className="fas fa-redo"></i></span></div>
                            </div>
                            <div className="email-phone-container input-group animated d-none">
                                <div className={`input-group animated ${login_method === "email" ? "" : "d-none"}`}>
                                    <input type="text" className="form-control" value={login.user_name} placeholder="ایمیل یا نام کاربری" onChange={this.onChangeField.bind(this, "user_name", "login")} />
                                    <div className="input-group-append"><span className="input-group-text"><i className="fas fa-user"></i></span></div>
                                </div>
                                <div className={`input-group animated ${login_method === "phone"  ? "" : "d-none"}`}>
                                    <div className="input-group-prepend">
                                        <span className="country_codes_holder">
                                            <select id="login-country-select">
                                                <option value="iran">+98</option>
                                                <option value="united-states">+1</option>
                                                <option value="united-kingdom">+356</option>
                                            </select>
                                        </span>
                                    </div>
                                    <input type="text" value={login.phone_number} className="form-control ltr" placeholder="شماره موبایل" onChange={this.onChangeField.bind(this, "phone_number", "login")} />
                                    <div className="input-group-append"><span className="input-group-text"><i className="fas fa-mobile"></i></span></div>
                                </div>
                            </div>
                            <div className="input-group d-none animated">
                                <input type="password" className="form-control" value={login.password} placeholder="رمز عبور" onChange={this.onChangeField.bind(this, "password", "login")} />
                                <div className="input-group-append"><span className="input-group-text"><i className="fas fa-lock"></i></span></div>
                            </div>
                            <a href="#" className="forgot-ps animated d-none">رمز عبور خودتون رو فراموش کردید؟</a>
                            <button className="btn btn-lg badge-pill " onClick={this.handleLogin}>ثبت نام</button>
                            <span className="change-form-mobile d-md-none mt-2" onClick={this.changeSection.bind(this)}>{isLoggingIn ? "حساب کاربری ندارید! کلیک کنید" : "حساب کاربری دایا دارید! برای ورود کلیک کنید"}</span>
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

Login.contextType = AuthContext

export default Login