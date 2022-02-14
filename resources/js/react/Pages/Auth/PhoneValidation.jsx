import React, { Component } from 'react';
import { connect } from 'react-redux';
import { Redirect } from 'react-router';
import { changeUserPhoneNumber, resendBasedOnAuthMethod, verifyPhoneNumber } from '../../redux/actions';
import AlertService from '../../../services/AlertService';

class PhoneValidation extends Component {
    constructor(props) {
        super(props)
        this.state = {
            phone_number: props.user.phone_number,
            edit: false,
            editing: false,
            resendIn: props.resend.next_attempt_in_seconds,
            requesting: false
        }
        this.interval = null
        this.Alert = new AlertService()
    }
    componentDidMount() {
        document.title = 'تایید شماره تلفن'
    }
    componentWillUnmount() {
        clearInterval(this.interval)
    }
    setResendTime = () => {
        let {next_attempt_in_seconds} = this.props.resend
        clearInterval(this.interval)
        if (next_attempt_in_seconds > 0) {
            this.setState({resendIn: next_attempt_in_seconds}, () => {
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
    }
    handleResend = async () => {
        const result = await this.props.authResend('phone');
        this.setResendTime()
        let {okay} = result.payload
        if (okay) this.Alert.success({title: 'پیامک حاوی کد تایید ارسال شد', timer: 2000})
    }
    handleEdit = (e) => {
        e.preventDefault()
        this.setState({editing: true}, async () => {
            const response = await this.props.editPhone(this.state.phone_number)
            this.setState({edit: typeof response.error !== 'undefined', editing: false}, this.setResendTime)
        })
    }
    handleVerify = (e) => {
        e.preventDefault();
        let {code, authVerifyPhone} = this.props;
        if (code.length === 6) {
            this.setState({requesting: true}, async () => {
                const result = await authVerifyPhone(code)
                if (! result.payload.verified) {
                    this.Alert.error({title: 'کد وارد شده اشتباه است', timer: 2000})
                }
                this.setState({requesting: false})
            })
        }
    }
    render() {
        let {resendIn, edit, editing, requesting} = this.state
        let { onChangeField, code, user, resend } = this.props
        let {left_attempts} = resend
        return user.phone_number && user.phone_verified
        ? <Redirect to="/dashboard"/>
        : (
            <>
            {! edit 
            ?   <div>
                    <h2>تایید شماره تلفن</h2>
                    <p>جهت تکمیل فرآیند ثبت نام لازم است کد احراز هویت ارسال شده به شماره تلفن خود را در کادر زیر وارد کنید</p>
                    <form onSubmit={this.handleVerify} className="form-group">
                        <div className="input-group">
                            <input type="text" maxLength={6} value={code} className="form-control text-left ltr" placeholder="کد ارسالی" onChange={onChangeField.bind(this, "validation", "code")}/>
                            <div className="input-group-append">
                                <button disabled={requesting || code.length < 6} className="btn btn-def btn-primary m-0 w-auto" type="submit">تایید</button>
                                {left_attempts > 0 &&
                                    <button 
                                    type='button'
                                    disabled={resendIn > 0}
                                    onClick={this.handleResend}
                                    className="btn m-0 w-auto">{resendIn > 0 ? resendIn : "ارسال مجدد"}</button>
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
                                <button disabled={editing} className="btn btn-def m-0 w-auto btn-success" type="submit">ویرایش</button>
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

const mapStateToProps = state => ({
    user: state.auth.user,
    resend: state.auth.resend
})

const mapDispatchToProps = dispatch => ({
    editPhone: phone_number => dispatch(changeUserPhoneNumber(phone_number)),
    authResend: method => dispatch(resendBasedOnAuthMethod(method)),
    authVerifyPhone: code => dispatch(verifyPhoneNumber(code))
})

export default connect(mapStateToProps, mapDispatchToProps)(PhoneValidation);