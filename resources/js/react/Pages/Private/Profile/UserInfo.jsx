import React, { Component } from 'react';
// components
import TextInput from './Components/TextInput';
import PhoneInput from './Components/PhoneInput';
import ProfileLayout from './ProfileLayout';

class UserInfo extends Component {
    title = "اطلاعات کاربری"
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
            path: null,
            type: "password",
            name: "password"
        },
        {
            component: TextInput,
            title: "تایید رمزعبور",
            path: null,
            type: "password",
            name: "password_confirmation"
        },
    ]
    namespace = "user"
    componentDidMount() {
        document.title = this.title
    }
    
    render() {
        return (
            <ProfileLayout 
                fields = {this.fields} 
                title = {this.title} 
                controller = "user"
                namespace = {this.namespace}
            />
        );
    }
}

export default (UserInfo);