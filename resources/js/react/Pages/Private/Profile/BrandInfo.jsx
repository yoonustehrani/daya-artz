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
    fields = [
        {
            component: TextInput,
            title: "عنوان برند",
            path: "company.title"
        },
        {
            component: TextInput,
            title: "عنوان انگلیسی برند",
            path: "company.title_en"
        },
        {
            component: TextInput,
            title: "تگ لاین یا شعار",
            path: "company.details.tagline"
        },
        {
            component: PhoneInput,
            title: "شماره تلفن",
            phone_type: "telephone",
            path: "company.phone_number"
        },
        {
            component: TextInput,
            title: "آدرس وب سایت",
            path: "company.website"
        },
        {
            component: TextInput,
            title: "آدرس",
            path: "company.address"
        },
        {
            component: Textarea,
            title: "معرفی کسب و کار",
            placeHolder: "فعالیت سازمان خود را به ما معرفی کنید",
            path: "company.intro"
        },
        {
            component: Textarea,
            title: "توصیف عقاید و چهارچوب های سازمانی",
            placeHolder: "",
            path: "company.details.policy"
        },
        {
            component: Select,
            title: "نوع کسب و کار",
            placeholder: "نوع کسب و کار خود را از میان گزینه های موجود انتخاب کنید",
            options: [
                {value: "service", text: "خدمات"},
                {value: "sales", text: "فروش"},
                {value: "other", text: "..."}
            ],
            path: "company.business_type"
        },
        {
            component: Radio,
            title: "شیوه بازار یابی",
            name: "market_type",
            options: [
                {id: "classic", text: "کلاسیک"},
                {id: "modern", text: "مدرن"}
            ],
            path: "company.marketType"
        },
        {
            component: ColorPicker,
            title: "رنگ سازمانی",
            path: "company.details.color"
        },
<<<<<<< HEAD
    ]  
    
    componentDidMount() {
        document.title = "مشخصات کسب و کار"
    }
    
=======
    ]
    componentDidMount() {
        document.title = "مشخصات کسب و کار"
    }
>>>>>>> 769b8ced2520e658c2840ca0f01ec678fcb86ca8
    render() {
        return (
            <ProfileLayout fields={this.fields} title="مشخصات کسب و کار" />
        );
    }
}

export default BrandInfo