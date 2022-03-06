// components
import TextInput from './Components/TextInput';
// import PhoneInput from './Components/PhoneInput';
import ProfileLayout from './ProfileLayout';
import { useEffect } from 'react';

function RegisterInfo() {
    let title = "مشخصات فردی"
    let fields = [
        {
            component: TextInput,
            title: "نام",
            path: "firstname",
            validate_types: ["short_text", "alpha-fa"],
        },
        {
            component: TextInput,
            title: "نام خانوادگی",
            path: "lastname",
            validate_types: ["short_text", "alpha-fa"],
            not_null: true
        },
        // {
        //     component: PhoneInput,
        //     title: "شماره تلفن (جهت پاسخگویی)",
        //     path: "phone_number",
        //     phone_type: "both",
        //     validate_types: ["phone_number"]
        // },
    ]
    useEffect(() => {
        document.title = title
    }, [title])
    return (
        <ProfileLayout 
            fields={fields} 
            title={title} 
            controller = "customer" 
        />
    );
}

export default (RegisterInfo);