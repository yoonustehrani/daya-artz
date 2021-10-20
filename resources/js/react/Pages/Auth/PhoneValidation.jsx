import React, { Component } from 'react';

class PhoneValidation extends Component {  
    render() {
        let { changeLoginMethod, changeSection, onChangeField, handleLogin, fields_info, login_method } = this.props, { code } = fields_info
        return (
            <div>
                <h2>تایید شماره تلفن</h2>
                <p>جهت تکمیل فرآیند ثبت نام لازم است کد احراز هویت ارسال شده به شماره تلفن خود را در کادر زیر وارد کنید</p>
                <div className="input-group">
                    <input type="text" value={code} className="form-control" placeholder="کد ارسالی" onChange={onChangeField.bind(this, "signupConfirm", "code")}/>
                    <div className="input-group-append"><span className="input-group-text"><i className="fas fa-user"></i></span></div>
                </div>
                
            </div>
        );
    }
}

export default PhoneValidation;