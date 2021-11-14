import React, { Component } from 'react';
// components
import TextInput from './Components/TextInput';
import PhoneInput from './Components/PhoneInput';
import ProfileLayout from './ProfileLayout';

class RegisterInfo extends Component {
    fields = [
        {
            component: TextInput,
            title: "نام",
            path: "customer.firstname"
        },
        {
            component: TextInput,
            title: "نام خانوادگی",
            path: "customer.lastname"
        },
        // {
        //     component: TextInput,
        //     title: "ایمیل",
        //     path: "email",
        //     type: "email"
        // },
        // {
        //     component: PhoneInput,
        //     title: "شماره موبایل",
        //     path: "phone_number",
        //     phone_type: "cellphone",
        // },
        // {
        //     component: TextInput,
        //     title: "رمزعبور جدید",
        //     path: "",
        //     type: "password"
        // },
        // {
        //     component: TextInput,
        //     title: "تایید رمزعبور",
        //     path: "",
        //     type: "password"
        // },
        {
            component: PhoneInput,
            title: "شماره تلفن (جهت پاسخگویی)",
            path: "customer.phone_number",
            phone_type: "both"
        },
    ]   

    componentDidMount() {
        document.title = "مشخصات فردی"
    }
    
    render() {
        return (
            <ProfileLayout fields={this.fields} title="اطلاعات فردی" />
        );
    }
}

export default RegisterInfo;