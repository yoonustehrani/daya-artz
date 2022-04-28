import React, { Component } from 'react';
import { state_select } from '../../../../../components/select2'

class PhoneInput extends Component {
    constructor(props) {
        super(props);
        this.country_code_ref = React.createRef()
        this.state_code_ref = React.createRef()
        this.state = {
            type: ""
        }   
    }
    
    changephoneType = () => {
        this.setState(prevState => ({
            type: prevState.type === "cellphone" ? "telephone" : "cellphone"
        }))
        setTimeout(() => {
            $(".gray.animated").each(function() {
                $(this).addClass("flipInX")
                $(this).find("i")[1].classList.toggle("fa-phone")
                $(this).find("i")[1].classList.toggle("fa-mobile")
                setTimeout(() => {
                    $(this).removeClass("flipInX")
                }, 1000)
            })
            $(this.country_code_ref.current).select2(state_select)
        }, 0);
    }
    
    componentDidMount() {
        this.setState({
           type: this.props.phone_type !== "both" ? this.props.phone_type : "cellphone" 
        }, () => {
            $(this.country_code_ref.current).select2(state_select)
        })
    }
    
    render() {
        let { value, title, path, onChangeHandler, phone_type, validate_types=null, not_null } = this.props, { type } = this.state
        return (
            <div className="field-item col-12 col-md-6">
                <span><i className='text-danger'>{not_null && "*"}</i>{title}:</span>
                {
                    phone_type === "both" && 
                    <span className="gray animated mt-2 mb-2" onClick={this.changephoneType.bind(this)}>
                        {type === "cellphone" ? "با استفاده از شماره تلفن ثابت" : "با استفاده از شماره موبایل"}
                        <i className="fas fa-long-arrow-alt-left mr-1"></i>
                        <i className="fas fa-phone mr-1"></i>
                    </span>
                }
                <div className="input-group ltr animated">
                    {/* <div className={`input-group-prepend ${type === "telephone" && "state-code"}`}>
                        {type === "cellphone" ? (
                                <span className="country_codes_holder">
                                    <select ref={this.country_code_ref}>
                                        <option value="iran">+98</option>
                                    </select>
                                </span>)
                            : (
                                <input type="tel" ref={this.state_code_ref} className="form-control ltr" placeholder="کد استان" />
                            )    
                        }
                    </div> */}
                    {type === "cellphone" && <div className='input-group-prepend'><span className='input-group-text ltr'>+98</span></div>}
                    <input type="tel" value={value ?? ""} className="form-control ltr" placeholder={type === "cellphone" ? "شماره موبایل" : "شماره تلفن همراه با پیش شماره استان"} onChange={(e) => onChangeHandler(path, e.target, validate_types, title, not_null, true)} />
                </div>
            </div>
        );
    }
}

export default PhoneInput;