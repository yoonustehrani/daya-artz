import React, { Component } from 'react';
// components
import TextInput from './Components/TextInput';
import Select from './Components/Select';
import PhoneInput from './Components/PhoneInput';
import ColorPicker from './Components/ColorPicker';
import Textarea from './Components/Textarea';
import Radio from './Components/Radio';
import ProfileLayout from './ProfileLayout';

class BrandInfo extends Component {
    title = "مشخصات کسب و کار"
    fields = [
        {
            component: TextInput,
            title: "عنوان برند",
            path: "title",
            validate_types: ["short_text", "alpha-numeric-fa"]
        },
        {
            component: TextInput,
            title: "عنوان انگلیسی برند",
            path: "title_en",
            validate_types: ["short_text", "alpha-numeric-en"]
        },
        {
            component: TextInput,
            title: "تگ لاین یا شعار",
            path: "details.tagline",
            validate_types: ["short_text"]
        },
        {
            component: PhoneInput,
            title: "شماره تلفن",
            phone_type: "telephone",
            path: "phone_number",
            validate_types: ["phone_number"]
        },
        {
            component: TextInput,
            title: "آدرس وب سایت",
            path: "website",
            validate_types: ["url"]
        },
        {
            component: TextInput,
            title: "آدرس",
            path: "address",
            validate_types: ["long_text"]
        },
        {
            component: Textarea,
            title: "معرفی کسب و کار",
            placeHolder: "فعالیت سازمان خود را به ما معرفی کنید",
            path: "intro",
            validate_types: ["paragraph"]
        },
        {
            component: Textarea,
            title: "توصیف عقاید و چهارچوب های سازمانی",
            placeHolder: "",
            path: "details.policy",
            validate_types: ["paragraph"]
        },
        // {
        //     component: Select,
        //     title: "نوع کسب و کار",
        //     placeholder: "نوع کسب و کار خود را از میان گزینه های موجود انتخاب کنید",
        //     options: [
        //         {value: "service", text: "خدمات"},
        //         {value: "sales", text: "فروش"},
        //         // {value: "other", text: "..."}
        //     ],
        //     path: "business_type"
        // },
        {
            component: Radio,
            title: "شیوه بازاریابی",
            name: "market_type",
            options: [
                {id: "classic", text: "کلاسیک"},
                {id: "modern", text: "مدرن"}
            ],
            default_value: "modern",
            path: "market_type"
        },
        {
            component: ColorPicker,
            title: "رنگ سازمانی",
            path: "details.color",
            validate_types: ["color"]
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
                controller="company"
            />
        );
    }
}

export default (BrandInfo);