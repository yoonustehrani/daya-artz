import React, { Component } from 'react';
import { Route, Switch } from 'react-router-dom'
import axios from 'axios';
import HttpClient from '../../services/HttpClient'
import { getCookie } from '../../services/CookieService'
// Redux
import { connect } from 'react-redux';
import { handleLogin } from '../redux/actions';
// custom components
import Login from '../Pages/Auth/Login';
import Signup from '../Pages/Auth/Signup';
import Background from '../Pages/Auth/components/Background';
import DayaLogo from '../Pages/Auth/components/DayaLogo';
import Welcome from '../Pages/Auth/components/Welcome';

const httpService = new HttpClient({
    baseURL: "http://localhost/",
    headers: {
        'X-XSRF-TOKEN': getCookie('XSRF-TOKEN'),
        'Accept': 'application/json'
    }
})

class AuthRoute extends Component {
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
            state: this.props.location.pathname === "/auth/login" ? "login" : 'signup',
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
        let { handleLogin, history, location } = this.props, { from } = location.state || { from: { pathname: "/" } };
        // httpService.post('login', {email: 'yoonustehrani28@gmail.com', password: 'uss828487'}).then(res => {
        //     httpService.get('api/v1/user').then(res => {
        //         console.log(res.data);
        //     })
        // })
        handleLogin({name: "amir"})
        history.replace(from)
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
        let { user, location } = this.props
        if (!user) {
            document.title = "Login"
            this.setState(prevState => ({
                state: location.pathname === "/auth/login" ? "login" : "signup"
            }))
        }
    }

    render() {
        let {signup, login, login_method, state, user} = this.state
        if (user) {
            this.props.history.goBack()
            return null
        }
        return (
            <Route path="/auth" children={(props) => (
                <div className="auth-container">
                    <div className="login-bg">
                        <DayaLogo />
                        <Background state={state} path={props.location.pathname} changeSection={this.changeSection} />
                        <Welcome path={props.location.pathname} />
                        <div className={`login-form animated ${state === 'login' ? "right-40" : ""}`}>
                            <Switch>
                                <Route exact path={`${props.match.path}/signup`} children={({history, location, match}) => (
                                    <Signup history={history} location={location} match={match} changeLoginMethod={this.changeLoginMethod} changeSection={this.changeSection} onChangeField={this.onChangeField} handleLogin={this.handleLogin} signup={signup} login_method={login_method} select2Config={this.select2_config} />
                                )} />

                                <Route exact path={`${props.match.path}/login`} children={({history, location, match}) => (
                                    <Login history={history} location={location} match={match} changeLoginMethod={this.changeLoginMethod} changeSection={this.changeSection} onChangeField={this.onChangeField} handleLogin={this.handleLogin} login={login} login_method={login_method} select2Config={this.select2_config} />
                                )} />
                            </Switch>
                        </div>
                    </div>
                </div>
            )} />
        );
    }
}

const mapStateToProps = (state) => ({
    user: state.auth.user,
})

const mapDispatchToProps = (dispatch) => ({
    handleLogin: loginInfo => dispatch(handleLogin(loginInfo)),
})

export default connect(mapStateToProps, mapDispatchToProps)(AuthRoute)