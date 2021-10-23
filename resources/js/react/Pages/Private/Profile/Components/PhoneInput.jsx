import React, { Component } from 'react';
import { state_select } from '../../../../../components/select2'

class PhoneInput extends Component {
    state = {
        type: ""
    }
    
    changephoneType = () => {
        this.setState(prevState => ({
            type: prevState.type === "cellphone" ? "telephone" : "cellphone"
        }))
        setTimeout(() => {
            $(".input-group.animated").addClass("headShake")
            $(".gray.animated").each(function() {
                $(this).addClass("flipInY")
                $(this).find("i")[1].classList.toggle("fa-mobile")
                $(this).find("i")[1].classList.toggle("fa-at")
                setTimeout(() => {
                    $(this).removeClass("flipInY")
                }, 1000)
            })
        }, 0);
    }
    
    componentDidMount() {
        $("#country-select").select2(state_select)
        this.setState({
           type: this.props.type !== "both" ? this.props.type : "cellphone" 
        })
    }
    
    render() {
        let { value, title, path, onChangeHandler, type } = this.props 
        return (
            <div className="field-item col-12 col-md-6">
            <span>{title}:</span>
            {
                this.props.type === "both" && 
                <span className="gray mb-2 animated" onClick={this.changephoneType.bind(this)}>
                    {type === "cellphone" ? "با استفاده از شماره موبایل" : "با استفاده از شماره تلفن ثابت"}
                    <i className="fas fa-long-arrow-alt-left mr-1"></i>
                    <i className="fas fa-mobile mr-1"></i>
                </span>
            }
            <div className="input-group ltr">
                <div className={`input-group-prepend ${type = "telephone" && "state-code"}`}>
                    {type === "cellphone"
                        ? (
                            <span className="country_codes_holder">
                                <select id="country-select">
                                    <option value="iran">+98</option>
                                    <option value="united-states">+1</option>
                                    <option value="united-kingdom">+356</option>
                                </select>
                            </span>)
                        : (<input type="tel" className="form-control ltr" placeholder="کد استان" />)    
                    }
                </div>
                <input type="tel" value={value} className="form-control ltr" placeholder={type === "cellphone" ? "شماره موبایل" : "شماره تلفن"} onChange={(e) => onChangeHandler(path, e.target.value)} />
            </div>
            </div>
        );
    }
}

export default PhoneInput;