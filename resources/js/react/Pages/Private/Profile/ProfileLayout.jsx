import React, { Component } from 'react';
import { Windmill } from 'react-activity'
import validator from "validator";
// helpers
import validate from '../../../../helpers/Validator'
import { isObjEmpty, NestedObj } from '../../../../helpers';
// redux
import { connect } from 'react-redux';
import { updateCustomerInfo, updateCompanyInfo, updateUserInfo } from '../../../redux/actions'

class ProfileLayout extends Component {
    constructor(props) {
        super(props);
        this.state = {
            sending_data: false,
            showSuccess: false,
            showErr: false,
            errs: {},
            [props.controller]: {...props[props.controller]}??{},
        }
    }
    changeInfo = (path, target, validate_types, title, not_null, only_number=false) => {
        let { controller } = this.props, {errs} = this.state, targetObj = this.state[controller], {value} = target, errors = [], input_validate = [{validate_types: validate_types, value: value, title: title, not_null: not_null??false}]
        if (!only_number || validator.isNumeric(value, {no_symbols: true}) || value === "") {
            validate_types ? errors = validate(input_validate) : null
            $(target).parent(".input-group").siblings("span.text-danger").each((i, el) => $(el).remove())
            if (errors.length) {
                $(target).addClass("input-err")
                errors.map((err, i) => {
                    $(target).parent(".input-group").after(`<span class="text-danger d-block m-1">${err}</span>`)
                    this.setState(prevState => ({errs: {...prevState.errs, [`${controller}.${path}`]: err}}))
                })
            } else {
                $(target).removeClass("input-err")
                delete errs[`${controller}.${path}`]
                this.setState({errs: errs})
            }
            let newData = new NestedObj(targetObj, path, value)
            this.setState({[controller]: newData.make()})
        }
    }

    updateInfo = () => {
        let { controller, modifyUser, modifyCustomer, modifyCompany } = this.props, { user, company, customer, errs } = this.state
        if (isObjEmpty(errs)) {
            this.setState(
                {sending_data: true, showSuccess: false, showErr: false},
                async () => {
                    let response;
                    switch (controller) {
                        case "user":
                            response = await modifyUser(user)
                            break;
                        case "company":
                            response = await modifyCompany(company)
                            break;
                        case "customer":
                            response = await modifyCustomer(customer)
                            break;
                    }
                    this.setState(prevState => {
                        return ! response.error ? {sending_data: false, showSuccess: true} : {sending_data: false}
                    })
                    if (! response.error) {
                        setTimeout(() => {
                            this.setState({showSuccess: false})
                        }, 5000)
                    }
                }
            )
        } else {
            this.setState({showErr: true, showSuccess: false, showErr: false})
            setTimeout(() => {
                this.setState({showErr: false})
            }, 5000)
        }
    }

    render() {
        let { fields, title, controller } = this.props, { sending_data, showSuccess, showErr, errs } = this.state
        return (
            <div>
                <div className="form-title">
                    <h4>{title}</h4>
                </div>
                <div className='fields-container'>
                    {fields.map((field, i) => {
                        let value = new NestedObj(this.state[controller], field.path).get()
                        return (
                            <field.component key={i} onChangeHandler={this.changeInfo} value={value} {...field} />
                        )
                    })}
                </div>
                <div className="eggplant-btn col-12">
                    <button className={`btn btn-lg col-12 col-md-3 col-lg-2 ${sending_data ? "disabled" : ""}`} disabled={sending_data} onClick={this.updateInfo}>ثبت</button>
                    {sending_data && <Windmill size={30} color="#6332df" />}
                    <div className={`col-12 col-md-7 col-lg-4 alert animated fadeIn ${!showSuccess && !showErr ? "d-none" : showErr ? "alert-danger" : "alert-success"}`}>
                        <span className={showErr ? "d-none" : null}>تغییرات شما با موفقیت ثبت شد</span>
                        <span className={showSuccess ? "d-none" : null}>لطفا اطلاعات خود را به درستی وارد کنید</span>
                    </div>
                </div>
            </div>
        );
    }
}

const mapStateToProps = (state) => ({
    user: state.auth.user,
    company: state.user.company,
    customer: state.auth.user
})
const mapDispathToProps = (dispatch) => ({
    modifyUser: user => dispatch(updateUserInfo(user)),
    modifyCustomer: customer => dispatch(updateCustomerInfo(customer)),
    modifyCompany: company => dispatch(updateCompanyInfo(company))
})

export default connect(mapStateToProps, mapDispathToProps)(ProfileLayout);