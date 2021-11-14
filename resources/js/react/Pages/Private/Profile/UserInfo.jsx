import React, { Component } from 'react';
// components
import TextInput from './Components/TextInput';
import PhoneInput from './Components/PhoneInput';
import ProfileLayout from './ProfileLayout';

class UserInfo extends Component {
    fields = [
        {
            component: TextInput,
            title: "ایمیل",
            path: "email",
            type: "email"
        },
        {
            component: PhoneInput,
            title: "شماره موبایل",
            path: "phone_number",
            phone_type: "cellphone",
        },
        {
            component: TextInput,
            title: "رمزعبور جدید",
            path: "",
            type: "password"
        },
        {
            component: TextInput,
            title: "تایید رمزعبور",
            path: "",
            type: "password"
        },
    ]   

    componentDidMount() {
        document.title = "مشخصات کاربری"
    }
    
    render() {
        return (
            <ProfileLayout fields={this.fields} title="اطلاعات کاربری" />
        );
    }
}

export default UserInfo;