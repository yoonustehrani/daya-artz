
import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import axios from 'axios';
import HttpClient from '../../../services/HttpClient'
import { getCookie } from '../../../services/CookieService'
import Login from './login'
import Signup from './signup'
import { connect } from 'react-redux';
import { shiftAuthState, shiftAuthInput, handleLogin, changeLoginMethod, changeInput } from '../../redux/actions';

const httpService = new HttpClient({
    baseURL: "http://localhost/",
    headers: {
        'X-XSRF-TOKEN': getCookie('XSRF-TOKEN'),
        'Accept': 'application/json'
    }
})

class Auth extends Component {
    formatState = (state) => {
        if(!state.id) {
            return state.text
        }
        let baseUrl = `${APP_PATH}images/world-icons/`
        let $state = $(
        `<span class="span-option"><img src=${baseUrl + state.id.toLowerCase() + ".svg"} class="img-flag"/>${state.text}</span>`)
        return $state
    }
    select2_config = {
        templateResult: this.formatState,
        width: "100%",
        dir: "rtl"
    }

    componentDidMount() {
        let { user } = this.props
        if (!user) {
            document.title = "Login"
        }
    }
    
    onChangeField = (fieldType, field, e) => {
        let { changeInput } = this.props
        e.persist()
        changeInput(fieldType, field, e.target.value)
    }

    changeSection = () => {
        let { shiftAuthInput, shiftAuthState, state } = this.props

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
            shiftAuthInput()
        }, 500)

        setTimeout(() => {
            $(".change-form").each(function() {
                $(this).removeClass("width-change")
                $(this).find("button").removeClass("bounceInRight bounceInLeft bounceOutLeft bounceOutRight")
            })
            $(".daya-logo").find("img").toggleClass("tada")
            $(".login-form").removeClass("zoomIn")
        }, 1500);

        shiftAuthState(state === "login" ? "signup" : "login")
    }

    handleLogin = () => {
        let { handleLogin } = this.props
        httpService.post('login', {email: 'yoonustehrani28@gmail.com', password: 'uss828487'}).then(res => {
            httpService.get('api/v1/user').then(res => {
                console.log(res.data);
                // handleLogin(res.data.user)
            })
        })
    }

    changeLoginMethod = () => {
        let { changeLoginMethod } = this.props
        changeLoginMethod()
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
        let {signup, login, login_method, state, isLoggingIn, user, s_user_name, s_phone_number, s_email, s_password, s_rep_password, l_user_name, l_phone_number, l_password} = this.props
        if (user) {
            this.props.history.goBack()
            return null
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
                            { !isLoggingIn && <Signup user_name={s_user_name} phone_number={s_phone_number} email={s_email} password={s_password} rep_password={s_rep_password} changeLoginMethod={this.changeLoginMethod} changeSection={this.changeSection} onChangeField={this.onChangeField} handleLogin={this.handleLogin} signup={signup} login_method={login_method} select2Config={this.select2_config} />}
                            { isLoggingIn && <Login user_name={l_user_name} phone_number={l_phone_number} password={l_password} changeLoginMethod={this.changeLoginMethod} changeSection={this.changeSection} onChangeField={this.onChangeField} handleLogin={this.handleLogin} login={login} login_method={login_method} select2Config={this.select2_config} />}
                        </div>
                    </div>
                </div>
            </div>
        )
    }
}

const mapStateToProps = (state) => ({
    state: state.loginReducer.auth.state,
    signup: state.loginReducer.auth.signup,
    login: state.loginReducer.auth.login, 
    login_method: state.loginReducer.auth.login_method, 
    isLoggingIn: state.loginReducer.auth.isLoggingIn, 
    user: state.loginReducer.auth.user,
    s_user_name: state.loginReducer.auth.signup.user_name,
    s_email: state.loginReducer.auth.signup.email,
    s_phone_number: state.loginReducer.auth.signup.s_phone_number,
    s_password: state.loginReducer.auth.signup.password,
    s_rep_password: state.loginReducer.auth.signup.rep_password,
    s_user_name: state.loginReducer.auth.signup.user_name,
    l_user_name: state.loginReducer.auth.signup.user_name,
    l_phone_number: state.loginReducer.auth.signup.s_phone_number,
    l_password: state.loginReducer.auth.signup.password,
})

const mapDispatchToProps = (dispatch) => ({
    handleLogin: loginInfo => dispatch(handleLogin(loginInfo)),
    shiftAuthState: state => dispatch(shiftAuthState(state)),
    shiftAuthInput: () => dispatch(shiftAuthInput()),
    changeLoginMethod: () => dispatch(changeLoginMethod()),
    changeInput: (fieldType, field, value) => dispatch(changeInput(fieldType, field, value))
})

export default connect(mapStateToProps, mapDispatchToProps)(Auth)