import React, { Component } from 'react';
import { connect } from 'react-redux';
import { Redirect } from 'react-router';
import AlertService from '../../../services/AlertService';
import { changeUserEmail, resendBasedOnAuthMethod } from '../../redux/actions';
import { Windmill } from 'react-activity';

class EmailValidation extends Component {
    constructor(props) {
        super(props)
        this.state = {
            email: props.user.email,
            edit: false,
            editing: false,
            resendIn: props.resend.next_attempt_in_seconds
        }
        this.interval = null
        this.Alert = new AlertService()
    }
    componentDidMount() {
        document.title = 'تایید ایمیل'
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
    handleEdit = (e) => {
        e.preventDefault()
        this.setState({editing: true}, async () => {
            const response = await this.props.editEmail(this.state.email)
            this.setState({edit: typeof response.error !== 'undefined', editing: false}, this.setResendTime)
        })
    }
    handleResend = async () => {
        const result = await this.props.authResend('email');
        this.setResendTime()
        let {okay} = result.payload
        if (okay) this.Alert.success({title: 'ایمیل حاوی لینک تایید حساب ارسال شد', timer: 2000})
    }
    render() {
        let { user, resend, sending_data, history, changeSection } = this.props
        let { edit, resendIn, editing } = this.state
        let {left_attempts} = resend
        return user.email && user.email_verified_at || user.phone_number && ! user.phone_verified
        ? <Redirect to="/dashboard"/>
        : (
            <>
            {! edit
            ?   <div>
                    <h2>تایید آدرس ایمیل</h2>
                    <p>
                        لطفا برای فعالسازی حساب کاربری خود ایمیل ارسال شده به آدرس {user.email} را چک کنید
                        <br />
                        با کلیک کردن روی دکمه یا لینک قرار داده شده در داخل ایمیلی که از سمت ما برایتان ارسال شده می توانید حساب کاربری تان را فعال کنید
                    </p>
                    {left_attempts > 0 && 
                        <button 
                        disabled={resendIn > 0}
                        onClick={this.handleResend}
                        className="btn btn-lg">{resendIn > 0 ? resendIn : "ارسال مجدد ایمیل"}</button>
                    }
                    <p className="text-right mt-5 text-small">آدرس ایمیل {user.email} اشتباه است ؟ <span className='span-hover' onClick={() => this.setState({edit: true})}>ویرایش</span></p>
                    <span className="change-form-mobile d-md-none mt-2" onClick={changeSection.bind(this, history, "login")}>خروج از حساب کاربری</span>              
                </div>
            :   <div>
                    <h2>ویرایش ایمیل</h2>
                    <form onSubmit={this.handleEdit} className="form-group w-50">
                        <div className="input-group">
                            <div className="input-group-prepend">
                                {sending_data && <span className='auth-windmill'><Windmill size={30} color="#6332df" /></span>}
                                <button disabled={editing} className="btn btn-def m-0 w-auto btn-success" type="submit">ویرایش</button>
                            </div>
                            <input type="text" className="form-control text-left ltr" value={this.state.email} onChange={(e) => this.setState({email: e.target.value})}/>
                        </div>
                    </form>
                    <button className="btn btn-def btn-outline-secondary" type="button" onClick={() => this.setState({edit: false})}>بازگشت</button>
                </div>
            }
            </>
        )
    }
}

const mapStateToProps = state => ({
    user: state.auth.user,
    resend: state.auth.resend
})

const mapDispatchToProps = dispatch => ({
    editEmail: email => dispatch(changeUserEmail(email)),
    authResend: method => dispatch(resendBasedOnAuthMethod(method))
})

export default connect(mapStateToProps, mapDispatchToProps)(EmailValidation);