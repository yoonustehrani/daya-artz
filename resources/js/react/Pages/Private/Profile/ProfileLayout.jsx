import React, { Component } from 'react';
import { Windmill } from 'react-activity'
import validator from "validator";
// helpers
import validate from '../Layout/components/Validator'
// redux
import { connect } from 'react-redux';
import { logUserIn } from '../../../redux/actions';

class ProfileLayout extends Component {
    constructor(props) {
        super(props);
        this.state = {
            user: this.props.user,
            sending_data: false,
            errors: [],
            showSuccess: false
        }
    }
    
    changeInfo = (path, value, only_number=false) => {
        if (!only_number || validator.isNumeric(value, {no_symbols: true}) || value === "") {
            let keys = path.split("."), { user } = this.state??{}
            const lastKey = keys.pop()
            const lastObj = keys.reduce((user, key) => 
                user[key] = user[key] || {}
            , user)
            lastObj[lastKey] = value;
            this.setState({
                user: user
            })
        }
    }

    updateInfo = () => {
        let { sendInfo, table, fields, title } = this.props, { user } = this.state, inputs = []
        fields.map((field, i) => {
            let keys = field.path.split("."), last_key = keys.pop(), lastObj = keys.reduce((user, key) => 
                (user[key] = user[key] || {})
            , {...user})
            validator.trim(lastObj[last_key]??"")
            field.type === "email" ? validator.normalizeEmail(lastObj[last_key]??"") : null
            this.setState({
                user: user
            })
            inputs.push({validate_types: field.validate_types, value: lastObj[last_key]??"", title: field.title, not_null: field.not_null??false})
        })

        let errors = validate(inputs)
        this.setState({errors: errors, showSuccess: false})
        if (!errors.length) {
            this.setState({sending_data: true}, () => {
                // here you can use your desired url or method to send your req using table variable
                this.setState({sending_data: false, showSuccess: true})
                setTimeout(() => {
                    this.setState({showSuccess: false})
                }, 5000)
            })
        }
    }

    render() {
        let { fields, title, table } = this.props, { user, sending_data, errors, showSuccess } = this.state
        return (
            <div>
                <div className="form-title">
                    <h4>{title}</h4>
                </div>
                {fields.map((field, i) => {
                    let keys = field.path.split("."), last_key = keys.pop(), lastObj = keys.reduce((user, key) => 
                        (user[key] = user[key] || {})
                    , {...user})
                    return (
                        <field.component key={i} onChangeHandler={this.changeInfo} value={lastObj[last_key]??""} {...field} />
                    )
                })}
                <div className="eggplant-btn col-12">
                    <button className={`btn btn-lg col-12 col-md-3 col-lg-2 ${sending_data ? "disabled" : ""}`} disabled={sending_data} onClick={this.updateInfo.bind(this, table)}>ثبت</button>
                    {sending_data && <Windmill size={30} color="#6332df" />}
                    <div className={`col-12 col-md-7 col-lg-4 alert animated fadeIn ${errors.length > 0 || showSuccess ? "" : "d-none"} ${errors.length > 0 ? "alert-danger" : ""} ${showSuccess ? "alert-success" : ""}`}>
                        <span className={!showSuccess ? "d-none" : undefined}>تغییرات شما با موفقیت ثبت شد</span>
                        {errors && errors.length > 0 && errors.map((err, i) => (
                            <span key={i}>{err}</span>
                        ))}
                    </div>
                </div>
            </div>
        );
    }
}

const mapDispatchToProps = (dispatch) => ({
    sendInfo: (info) => dispatch(logUserIn(info))
})

const mapStateToProps = (state) => ({
    user: state.auth.user
})

export default connect(mapStateToProps, mapDispatchToProps)(ProfileLayout);