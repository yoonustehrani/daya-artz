import React, { Component } from 'react';
import { Redirect } from 'react-router';

class EmailValidation extends Component {
    render() {
        let {email, email_verified_at} = this.props.user
        return email && email_verified_at 
        ? <Redirect to="/dashboard"/>
        : (
            <div>
                <h2>تایید آدرس ایمیل</h2>
                <p>
                    لطفا برای فعالسازی حساب کاربری خود ایمیل ارسال شده به آدرس {this.props.user.email} را چک کنید
                    <br />
                    با کلیک کردن روی دکمه یا لینک قرار داده شده در داخل ایمیلی که از سمت ما برایتان ارسال شده می توانید حساب کاربری تان را فعال کنید
                </p>
            </div>
        )
    }
}

export default EmailValidation;