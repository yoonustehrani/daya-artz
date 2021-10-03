import React, { Component } from 'react'
import { Link, Redirect } from 'react-router-dom'
import HttpClient from '../../../services/HttpClient'
import { getCookie } from '../../../services/CookieService'
import Login from './Login'
import Signup from './Signup'
import { connect } from 'react-redux';
import { logUserIn } from '../../redux/actions';

const httpService = new HttpClient({
    baseURL: "http://localhost/api/v1/",
    headers: {
        'X-XSRF-TOKEN': getCookie('XSRF-TOKEN'),
        'Accept': 'application/json'
    }
})

class Auth extends Component {
    constructor(props) {
        super(props);
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
            state: "signup",
            login_method: "email",
            isLoggingIn: false
        }
        this.formatState = (state) => {
            if(!state.id) {
                return state.text
            }
            let baseUrl = `${APP_PATH}images/world-icons/`
            let $state = $(
            `<span class="span-option"><img src=${baseUrl + state.id.toLowerCase() + ".svg"} class="img-flag"/>${state.text}</span>`)
            return $state
        }
        this.select2_config = {
            templateResult: this.formatState,
            width: "100%",
            dir: "rtl"
        }
    }

    componentDidMount() {
        let { user } = this.props
        if (!user) {
            document.title = "Login"
        }
    }
    
    onChangeField = (fieldType, field, e) => {
        e.persist()
        this.setState(prevState => ({
            [fieldType]: {
                ...prevState[fieldType],
                [field]: e.target.value
            }
        }))
    }

    changeSection = () => {
        let { state } = this.state
        $(".change-form").each(function() {
            $(this).addClass("width-change")
            $(this).find("button").addClass(`${state === "signup" ? "bounceOutLeft" : "bounceOutRight"}`)
        })
        if (window.screen.width < 768) {
            setTimeout(() => {
                $(".login-form").addClass("zoomOut")
            }, 0)
        }

        setTimeout(() => {
            $(".change-form").each(function() {
                $(this).find("h2, p").each(function() {
                    $(this).toggleClass("d-none")
                })
                $(this).find("button")[0].innerHTML = state === "signup" ? "ثبت نام" : "ورود"
                $(this).find("button").toggleClass(`${state === "signup" ? "bounceOutLeft bounceInRight" : "bounceOutRight bounceInLeft"}`)
            })
            $(".daya-logo").each(function() {
                $(this).toggleClass("purple-cl")
                $(this).find("img").toggleClass("tada")
            })
            $(".change-form-content").each(function() {
                $(this).toggleClass("left-20 right-20")
                $(this).find("h2, p").each(function() {
                    $(this).toggleClass("d-none")
                })
            })
            if (window.screen.width < 768) {
                $(".login-form").toggleClass("zoomOut zoomIn")
            }
            this.setState(prevState => ({
                isLoggingIn: !prevState.isLoggingIn
            }))
        }, 500)

        setTimeout(() => {
            $(".change-form").each(function() {
                $(this).removeClass("width-change")
                $(this).find("button").removeClass("bounceInRight bounceInLeft bounceOutLeft bounceOutRight")
            })
            $(".daya-logo").find("img").toggleClass("tada")
            $(".login-form").removeClass("zoomIn")
        }, 1500);

        this.setState(prevState => ({
            state: prevState.state === "login" ? "signup" : "login"
        }))
    }

    handleLogin = () => {
        let { authLogin } = this.props;
        httpService.post('login', {email: 'yoonustehrani28@gmail.com', password: 'uss828487'}).then(res => {
            let user = res.data
            authLogin(user)
        })
    }

    changeLoginMethod = () => {
        this.setState(prevState => ({
            login_method: prevState.login_method === "email" ? "phone" : "email"
        }))
        setTimeout(() => {
            $(".input-group.animated").addClass("headShake")
            $(".gray.animated").each(function() {
                $(this).addClass("flipInY")
                $(this).find("i")[1].classList.toggle("fa-mobile")
                $(this).find("i")[1].classList.toggle("fa-at")
                setTimeout(() => {
                    $(this).removeClass("flipInY")
                }, 1000)
            })
        }, 0);
    }
    
    render() {
        let {signup, login, login_method, state, isLoggingIn} = this.state
        let { user, location } = this.props
        if (user) {
            let { from } = location.state || { from: { pathname: "/" } }
            return (
                <Redirect to={from}/>
            )
        }
        return (
            <div>
                <div className="auth-container">
                    <div className="login-bg">
                        <Link to="/" className="daya-logo ltr">
                            <img className="animated d-md-inline d-none" src={APP_PATH + "images/daya-white-logo.png"} alt="daya-logo" />
                            <img className="animated d-md-none" src={APP_PATH + "images/daya-white-logo.png"} alt="daya-logo" />
                            <span>DAYA-ARTZ</span>
                        </Link>
                        <div className={`change-form d-md-block d-none ${state === "login" ? "bg-p-100 right-60" : ""}`}>
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
                        <div className={`login-form animated ${state === 'login' ? "right-40" : ""}`}>
                            { !isLoggingIn && <Signup changeLoginMethod={this.changeLoginMethod} changeSection={this.changeSection} onChangeField={this.onChangeField} handleLogin={this.handleLogin} signup={signup} login_method={login_method} select2Config={this.select2_config} />}
                            { isLoggingIn && <Login changeLoginMethod={this.changeLoginMethod} changeSection={this.changeSection} onChangeField={this.onChangeField} handleLogin={this.handleLogin} login={login} login_method={login_method} select2Config={this.select2_config} />}
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

const mapStateToProps = (state) => ({
    user: state.auth.user,
})

const mapDispatchToProps = (dispatch) => ({
    authLogin: user => dispatch(logUserIn(user)),
})

export default connect(mapStateToProps, mapDispatchToProps)(Auth)