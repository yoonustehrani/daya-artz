import React, { Component } from 'react';
import axios from 'axios';
// redux
import { connect } from 'react-redux';
import { logUserIn } from '../../../redux/actions'
// components
import TextInput from './Components/TextInput';
import Select from './Components/Select';
import PhoneInput from './Components/PhoneInput';
import ColorPicker from './Components/ColorPicker';
import Textarea from './Components/Textarea';
import Radio from './Components/Radio';

class BrandInfo extends Component {
    constructor(props) {
        super(props);
        this.state = {
            user: this.props.user
        }
        let { company } = this.state.user
        this.fields = [
            {
                component: TextInput,
                title: "عنوان برند",
                value: company?.title 
            },
            {
                component: TextInput,
                title: "عنوان انگلیسی برند",
                value: company?.title_en
            },
            {
                component: TextInput,
                title: "تگ لاین یا شعار",
                value: company?.details.tagline
            },
            {
                component: PhoneInput,
                title: "شماره تلفن",
                type: "telephone",
                value: company?.phone_number
            },
            {
                component: TextInput,
                title: "آدرس وب سایت",
                value: company?.website
            },
            {
                component: TextInput,
                title: "آدرس",
                value: company?.address
            },
            {
                component: Select,
                title: "نوع کسب و کار",
                options: [
                    {value: "service", text: "خدمات"},
                    {value: "sales", text: "فروش"},
                    {value: "other", text: "..."}
                ],
                value: company?.business_type
            },
            {
                component: Radio,
                title: "شیوه بازار یابی",
                name: "market_type",
                options: [
                    {id: "classic", text: "کلاسیک"},
                    {id: "modern", text: "مدرن"}
                ],
                value: company?.marketType
            },
            {
                component: Textarea,
                title: "معرفی کسب و کار",
                placeHolder: "فعالیت سازمان خود را به ما معرفی کنید",
                value: company?.intro
            },
            {
                component: Textarea,
                title: "توصیف عقاید و چهارچوب های سازمانی",
                placeHolder: "",
                value: company?.details.policy
            },
            {
                component: ColorPicker,
                title: "رنگ سازمانی",
                value: company?.details.color
            },
        ]    
    }

    // changeInfo = () => {
    //     this.setState(prevState => ({
    //         user: {
    //             company: {},
    //             ...prevState.user
    //         }
    //     }))
    // }

    updateInfo = () => {
        let { updateCompanyInfo } = this.props
        axios.post('', data).then(res => {
            let user = res.data
            updateCompanyInfo(user)
        })
    }

    render() {
        let { user } = this.props
        console.log(user);
        return (
            <div>
                {this.fields.map((field, i) => (
                    <field.component key={i} {...field} />
                ))}
                <div className="eggplant-btn col-12 col-md-2">
                    <button className="btn btn-lg" onClick={this.updateInfo.bind(this)}>ثبت</button>
                </div>
            </div>
        );
    }
}

const mapStateToProps = (state) => ({
    user: state.auth.user
})

const mapDispathToProps = (dispatch) => ({
    updateCompanyInfo: Info => dispatch(logUserIn(Info))
})

export default connect(mapStateToProps)(BrandInfo);