import React, { Component } from 'react';
import { Redirect } from 'react-router';

class PhoneValidation extends Component {
    constructor(props) {
        super(props)
        this.state = {
            resendIn: 0,
            resend: true,
            left_attempts: 3,
            edit: false,
            phone_number: props.user.phone_number
        }
        this.interval = null
    }
    componentDidMount() {
        this.setResendTime(35)
    }
    componentWillUnmount() {
        clearInterval(this.interval)
    }
    setResendTime = (time) => {
        clearInterval(this.interval)
        this.setState({resendIn: time}, () => {
            this.interval = setInterval(() => {
                if (this.state.resendIn <= 0) {
                    clearInterval(this.interval)
                } else {
                    this.setState(prevState => ({
                        resendIn: prevState.resendIn - 1
                    }))
                }
            }, 1000);
        })
    }
    handleResend = () => {
        let {handleResend} = this.props;
        handleResend('phone').then(res => {
            let {okay, left_attempts, next_attempt_in_seconds} = res.data;
            this.setResendTime(next_attempt_in_seconds)
            this.setState({
                left_attempts: left_attempts
            })
        }).catch(err => console.log(err))
    }
    handleEdit = (e) => {
        e.preventDefault()
        // send http request here
        this.props.handleEdit("phone", {phone_number: this.state.phone_number}).then(res => {
            if (res.data.okay) {
                this.setState({edit: false})
                this.props.changePhoneNumber(this.state.phone_number)
                
            }
        }).catch(err => console.log(err))
        // then set the edit state false
    }
    render() {
        let { onChangeField, code, checkCode, user, changePhoneNumber } = this.props
        return user.phone_number && user.phone_verified
        ? <Redirect to="/dashboard"/>
        : (
            <>
            {! this.state.edit 
            ?   <div>
                    <h2>تایید شماره تلفن</h2>
                    <p>جهت تکمیل فرآیند ثبت نام لازم است کد احراز هویت ارسال شده به شماره تلفن خود را در کادر زیر وارد کنید</p>
                    <form onSubmit={checkCode} className="form-group">
                        <div className="input-group">
                            <input type="text" maxLength={6} value={code} className="form-control text-left ltr" placeholder="کد ارسالی" onChange={onChangeField.bind(this, "validation", "code")}/>
                            <div className="input-group-append">
                                <button disabled={code.length < 6} className="btn btn-def btn-primary m-0 w-auto" type="submit">تایید</button>
                                {this.state.left_attempts > 0 && 
                                    <button 
                                    disabled={this.state.resendIn > 0}
                                    onClick={this.handleResend}
                                    className="btn m-0 w-auto">{this.state.resendIn > 0 ? this.state.resendIn : "ارسال مجدد"}</button>
                                }
                            </div>
                        </div>
                    </form>
                    <p>شماره تلفن {user.phone_number} اشتباه است ؟ <a onClick={() => this.setState({edit: true})} href="#edit">ویرایش</a></p>
                </div>
            :   <div>
                    <h2>ویرایش تلفن همراه</h2>
                    <form onSubmit={this.handleEdit} className="form-group">
                        <div className="input-group">
                            <div className="input-group-prepend">
                                <button className="btn btn-def m-0 w-auto btn-success" type="submit">ویرایش</button>
                            </div>
                            <input type="text" className="form-control text-left ltr" value={this.state.phone_number} onChange={(e) => this.setState({phone_number: e.target.value})}/>
                        </div>
                    </form>
                    <button className="btn btn-def btn-outline-secondary" type="button" onClick={() => this.setState({edit: false})}>بازگشت</button>
                </div>
            }
            </>
        );
    }
}

export default PhoneValidation;