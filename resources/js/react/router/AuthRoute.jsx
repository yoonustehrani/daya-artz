import React, { Component } from 'react';
import { Route, Switch, Redirect } from 'react-router-dom'
import axios from 'axios';
import HttpClient from '../../services/HttpClient'
import { getCookie } from '../../services/CookieService'
// Redux
import { connect } from 'react-redux';
import { logUserIn, verifyUserPhone } from '../redux/actions';
// Routes
import Login from '../Pages/Auth/Login';
import Signup from '../Pages/Auth/Signup';
import ForgetPassword from '../Pages/Auth/ForgetPassword';
// custom components
import Background from '../Pages/Auth/components/Background';
import DayaLogo from '../Pages/Auth/components/DayaLogo';
import Welcome from '../Pages/Auth/components/Welcome';
import GuestMiddleware from '../components/GuestMiddleware';
import PrivateRoute from './PrivateRoute';
import EmailValidation from '../Pages/Auth/EmailValidation';
import PhoneValidation from '../Pages/Auth/PhoneValidation';

const httpService = new HttpClient({
    baseURL: "http://localhost/api/v1/auth",
    headers: {
        'X-XSRF-TOKEN': getCookie('XSRF-TOKEN'),
        'Accept': 'application/json'
    }
})
const route_regex = /[^/]*$/

class AuthRoute extends Component {
    constructor(props) {
        super(props);
        this.state = {
            signup: {
                email: "",
                phone_number: "",
                password: "",
                password_confirmation: ""
            },
            login: {
                user_name: "",
                phone_number: "",
                password: ""
            },
            forgetPassword: {
                phone_number: "",
                email: ""
            },
            validation : {
                code: ""
            },
            state: route_regex.exec(this.props.location.pathname)[0] === "auth" ? "login" : route_regex.exec(this.props.location.pathname)[0],
            login_method: "email",
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

    changeSection = (history, newState) => {
        let { state } = this.state, replaca = newState ? newState : state === "signup" || state === "signupConfirm" ? "login" : "signup" 
        setTimeout(() => {
            $(".change-form").each(function() {
                $(this).addClass("width-change")
                $(this).find("button").addClass(`${state === "signup" || state === "signupConfirm" ? "bounceOutLeft" : "bounceOutRight"}`)
            })
            if (window.screen.width < 768) {
                $(".login-form").addClass("zoomOut")
            }
        }, 0)

        setTimeout(() => {
            $(".change-form").each(function() {
                $(this).find("h2, p").each(function() {
                    $(this).toggleClass("d-none")
                })
                if(state === "signup" || state === "signupConfirm") {
                    $(this).find("button")[0].innerHTML = "ثبت نام"
                    $(this).find("button").toggleClass("bounceOutLeft bounceInRight")
                } else {
                    $(this).find("button")[0].innerHTML = "ورود"
                    $(this).find("button").toggleClass("bounceOutRight bounceInLeft")
                }
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
            history.push(`/auth/${replaca}`)
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
            state: replaca
        }))
    }

    handleLogin = (e) => {
        e.preventDefault();
        let { authLogin } = this.props;
        let {email, phone_number, password} = this.state.login;
        let payload = this.state.login_method == "email" ? {email, password} : {phone_number, password};
        httpService.post('/login', payload).then(res => {
            let {user} = res.data
            authLogin(user)
        })
    }

    handleRegister = (e) => {
        e.preventDefault();
        let {email, phone_number, password, password_confirmation} = this.state.signup
        let payload = this.state.login_method == "email" ? {email, password, password_confirmation} : {phone_number, password, password_confirmation};
        httpService.post('/register', payload).then(res => {
            let {user, okay} = res.data
            if (okay) {
                this.props.authLogin(user)
            }
        })
    }

    handleEdit = (type, payload) => httpService.put(`/verification/${type == 'phone' ? 'phone' : 'email'}/edit`, payload)

    handleResend = (type) => httpService.post(`/verification/${type == 'phone' ? 'phone' : 'email'}/resend`)
    checkCodeForPhoneValidation = (e) => {
        e.preventDefault();
        let {code} = this.state.validation;
        if (code.length === 6) {
            httpService.post('/verification/phone/verify', {code}).then(res => {
                let {okay, verified} = res.data;
                if (verified) {
                    this.props.verifyPhone()
                }
            }).catch(err => {
                console.log(err);
            })
        }
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

    componentDidMount() {
        let { user } = this.props
        if (!user) {
            document.title =  "authentication"
        }
        // for handling back or forward browser button
        this.props.history.block((location, action) => {
            if (action === "POP") {
                let current_loc = route_regex.exec(location.pathname)[0], { state } = this.state, { history } = this.props
                if(((state === "login" || state === "forgetPassword") && (current_loc === "signup" || current_loc === "signupConfirm")) || ((state === "signup" || state === "signupConfirm") && (current_loc === "login" || current_loc === "forgetPassword"))) {
                    this.changeSection(history, current_loc)
                } else {
                    return true
                }
                return false
            }  
            return true
        })

    }

    render() {
        let {signup, login, forgetPassword, validation, login_method, state} = this.state, { history, location, match, user } = this.props
        return (
            location.pathname !== "/auth"
            ? (
                <>
                <GuestMiddleware exception={['/auth/verification/email/', '/auth/verification/phone/']} location={location}/>
                <div className="auth-container">
                    <div className="login-bg">
                        <DayaLogo state={state} />
                        <Background state={state} history={history} changeSection={this.changeSection} />
                        <Welcome state={state} />
                        <div className={`login-form animated ${state === 'login' || state === "forgetPassword" ? "right-40" : ""}`}>
                            <Switch>
                                <Route exact path={`/auth/signup`} children={(props) => (
                                    <Signup {...props} changeLoginMethod={this.changeLoginMethod} changeSection={this.changeSection} onChangeField={this.onChangeField} handleRegister={this.handleRegister} fields_info={signup} login_method={login_method} />
                                )} />

                                <Route exact path={`/auth/login`} children={(props) => (
                                    <Login {...props} changeLoginMethod={this.changeLoginMethod} changeSection={this.changeSection} onChangeField={this.onChangeField} handleLogin={this.handleLogin} fields_info={login} login_method={login_method} />
                                )} />

                                <Route exact path={`/auth/forgetPassword`} children={(props) => (
                                    <ForgetPassword {...props} changeLoginMethod={this.changeLoginMethod} changeSection={this.changeSection} onChangeField={this.onChangeField} handleLogin={this.handleLogin} fields_info={forgetPassword} login_method={login_method} />
                                )} />
                                <PrivateRoute exact={true} path="/auth/verification/email">
                                    <EmailValidation handleResend={this.handleResend} handleEdit={this.handleEdit}/>
                                </PrivateRoute>
                                <PrivateRoute exact={true} path="/auth/verification/phone">
                                    <PhoneValidation handleResend={this.handleResend} code={validation.code} onChangeField={this.onChangeField} checkCode={this.checkCodeForPhoneValidation} handleEdit={this.handleEdit}/>
                                </PrivateRoute>
                            </Switch>
                        </div>
                    </div>
                </div>
                </>
            )
            : <Redirect to={{ pathname: "/auth/login", state: {from: location} }} />
        );
    }
}

const mapStateToProps = (state) => ({
    user: state.auth.user,
})

const mapDispatchToProps = (dispatch) => ({
    authLogin: user => dispatch(logUserIn(user)),
    verifyPhone: () => dispatch(verifyUserPhone()),
})

export default connect(mapStateToProps, mapDispatchToProps)(AuthRoute)