import React, { Component } from 'react';
import { connect } from 'react-redux';
import { Redirect } from 'react-router';
import { changeUserEmail } from '../../redux/actions';

class EmailValidation extends Component {
    constructor(props) {
        super(props)
        this.state = {
            resendIn: 0,
            resend: true,
            left_attempts: 3,
            edit: false,
            email: props.user.email,
        }
        this.interval = null
    }
    componentDidMount() {
        this.setResendTime(60)
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
    handleEdit = (e) => {
        e.preventDefault()
        // send http request here
        this.props.editEmail(this.state.email).then(res => {
            console.log(res);
        })
    }
    handleResend = () => {
        let {handleResend} = this.props;
        handleResend('email').then(res => {
            console.log(res);
        })
    }
    render() {
        let { user } = this.props
        return user.email && user.email_verified_at || user.phone_number && ! user.phone_verified
        ? <Redirect to="/dashboard"/>
        : (
            <>
            {! this.state.edit
            ?   <div>
                    <h2>تایید آدرس ایمیل</h2>
                    <p>
                        لطفا برای فعالسازی حساب کاربری خود ایمیل ارسال شده به آدرس {user.email} را چک کنید
                        <br />
                        با کلیک کردن روی دکمه یا لینک قرار داده شده در داخل ایمیلی که از سمت ما برایتان ارسال شده می توانید حساب کاربری تان را فعال کنید
                    </p>
                    {this.state.left_attempts > 0 && 
                        <button 
                        disabled={this.state.resendIn > 0}
                        onClick={this.handleResend}
                        className="btn btn-lg">{this.state.resendIn > 0 ? this.state.resendIn : "ارسال مجدد ایمیل"}</button>
                    }
                    <p className="text-right mt-5 text-small">آدرس ایمیل {user.email} اشتباه است ؟ <a onClick={() => this.setState({edit: true})} href="#edit">ویرایش</a></p>
                </div>
            :   <div>
                    <h2>ویرایش ایمیل</h2>
                    <form onSubmit={this.handleEdit} className="form-group w-50">
                        <div className="input-group">
                            <div className="input-group-prepend">
                                <button className="btn btn-def m-0 w-auto btn-success" type="submit">ویرایش</button>
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
    user: state.auth.user
})

const mapDispatchToProps = dispatch => ({
    editEmail: email => dispatch(changeUserEmail(email))
})

export default connect(mapStateToProps, mapDispatchToProps)(EmailValidation);