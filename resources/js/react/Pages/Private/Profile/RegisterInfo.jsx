import React, { Component } from 'react';
// components
import TextInput from './Components/TextInput';
import PhoneInput from './Components/PhoneInput';
import ProfileLayout from './ProfileLayout';

class RegisterInfo extends Component {
    title = "مشخصات فردی"
    fields = [
        {
            component: TextInput,
            title: "نام",
            path: "customer.firstname",
            validate_types: ["short_text", "alpha-fa"],
        },
        {
            component: TextInput,
            title: "نام خانوادگی",
            path: "customer.lastname",
            validate_types: ["short_text", "alpha-fa"]
        },
        {
            component: PhoneInput,
            title: "شماره تلفن (جهت پاسخگویی)",
            path: "customer.phone_number",
            phone_type: "both",
            validate_types: ["phone_number"]
        },
    ]   

    componentDidMount() {
        document.title = this.title
    }
    
    render() {
        return (
            <ProfileLayout 
                fields = {this.fields} 
                title = {this.title} 
                controller = "customer" 
            />
        );
    }
}

export default (RegisterInfo);