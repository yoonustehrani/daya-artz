import React, { Component } from 'react';
import { Redirect } from 'react-router';

class PhoneValidation extends Component {  
    render() {
        let { onChangeField, code, checkCode, user } = this.props
        return user.phone_number && user.phone_verified
        ? <Redirect to="/dashboard"/>
        : (
            <div>
                <h2>تایید شماره تلفن</h2>
                <p>جهت تکمیل فرآیند ثبت نام لازم است کد احراز هویت ارسال شده به شماره تلفن خود را در کادر زیر وارد کنید</p>
                <form onSubmit={checkCode}>
                    <div className="input-group">
                        <input type="text" maxLength={6} value={code} className="form-control text-left ltr" placeholder="کد ارسالی" onChange={onChangeField.bind(this, "validation", "code")}/>
                    </div>
                    <button disabled={code.length < 6} className="btn btn-lg badge-pill" type="submit">ارسال</button>
                </form>
            </div>
        );
    }
}

export default PhoneValidation;