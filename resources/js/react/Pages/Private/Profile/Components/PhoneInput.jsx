import React, { Component } from 'react';
import { state_select } from '../../../../../components/select2'

class PhoneInput extends Component {
    componentDidMount() {
        $("#country-select").select2(state_select)
    }
    
    render() {
        let { value, title, type } = this.props
        return (
            <div className="field-item col-12 col-md-6">
            <span>{title}:</span>
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
                <input type="tel" value={value} className="form-control ltr" placeholder={type === "cellphone" ? "شماره موبایل" : "شماره تلفن"} />
            </div>
            </div>
        );
    }
}

export default PhoneInput;