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
            type: "email",
            name: "email",
            validate_types: ["email"]
        },
        {
            component: PhoneInput,
            title: "شماره موبایل",
            path: "phone_number",
            phone_type: "cellphone",
            name: "phone_number",
            validate_types: ["phone_number"]
        },
        {
            component: TextInput,
            title: "رمزعبور جدید",
            path: "password",
            type: "password",
        },
        {
            component: TextInput,
            title: "تایید رمزعبور",
            path: "password_confirmation",
            type: "password",
        },
    ]
    
    render() {
        return (
            <ProfileLayout 
                fields = {this.fields} 
                controller = "user"
            />
        );
    }
}

export default (UserInfo);