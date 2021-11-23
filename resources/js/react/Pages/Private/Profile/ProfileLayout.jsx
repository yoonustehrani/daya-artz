import React, { Component } from 'react';
import { Windmill } from 'react-activity'
import validator from "validator";
// helpers
import validate from '../Layout/components/Validator'
// redux
import { connect } from 'react-redux';
import { updateUserInfo } from '../../../redux/actions'

class ProfileLayout extends Component {
    constructor(props) {
        super(props);
        this.state = {
            sending_data: false,
            errors: [],
            showSuccess: false,
            data: {}
        }
    }
    
    changeInfo = (path, name, value, only_number=false) => {
        if (!only_number || validator.isNumeric(value, {no_symbols: true}) || value === "") {
            let newData = Object.assign({}, this.state.data)
            newData[name] = value
            this.setState({ data: newData })
        }
    }

    updateInfo = () => {
        let { controller, fields, title, namespace } = this.props, { data } = this.state, inputs = []
        fields.map((field, i) => {
            let defaultValue = namespace && field.path ? (this.props[namespace][field.path]) : ""
            // let keys = field.path.split("."), last_key = keys.pop(), lastObj = keys.reduce((user, key) => 
            //     (user[key] = user[key] || {})
            // , {...user})
            // validator.trim(lastObj[last_key]??"")
            // field.type === "email" ? validator.normalizeEmail(lastObj[last_key]??"") : null
            inputs.push({validate_types: field.validate_types, value: data[field.name] ?? defaultValue, title: field.title, not_null: field.not_null??false})
        })

        let errors = []
        // let errors = validate(inputs)
        // this.setState({errors: errors, showSuccess: false})

        if (!errors.length) {
            this.setState({sending_data: true}, () => {
                // here you can use your desired url or method to send your req using controller variable
                let { changeUserInfo } = this.props
                switch (controller) {
                    case "user":
                        changeUserInfo(data).then(res => {
                            this.setState({sending_data: false, showSuccess: res.error ?? false})
                        })
                        break;
                
                    default:
                        break;
                }
                setTimeout(() => {
                    this.setState({showSuccess: false})
                }, 5000)
            })
        }
    }

    componentDidMount() {
        let { controller, fields, title, namespace } = this.props
        let newData = {};
        fields.map((field, i) => {
            let defaultValue = this.props[namespace][field.path]
            if (defaultValue) {
                newData[field.name] = defaultValue
            }
        })
        this.setState({
            data: newData
        })
    }

    render() {
        let { fields, title, namespace } = this.props, { user, sending_data, errors, showSuccess } = this.state
        return (
            <div>
                <div className="form-title">
                    <h4>{title}</h4>
                </div>
                {fields.map((field, i) => {
                    let defaultValue = namespace && field.path ? (this.props[namespace][field.path]) : "";
                    return (
                        <field.component key={i} onChangeHandler={this.changeInfo} value={this.state.data[field.name] ?? defaultValue} {...field} />
                    )
                })}
                <div className="eggplant-btn col-12">
                    <button className={`btn btn-lg col-12 col-md-3 col-lg-2 ${sending_data ? "disabled" : ""}`} disabled={sending_data} onClick={this.updateInfo}>ثبت</button>
                    {sending_data && <Windmill size={30} color="#6332df" />}
                    {/* <div className={`col-12 col-md-7 col-lg-4 alert animated fadeIn ${errors.length > 0 || showSuccess ? "" : "d-none"} ${errors.length > 0 ? "alert-danger" : ""} ${showSuccess ? "alert-success" : ""}`}>
                        <span className={!showSuccess ? "d-none" : undefined}>تغییرات شما با موفقیت ثبت شد</span>
                        {errors && errors.length > 0 && errors.map((err, i) => (
                            <span key={i}>{err}</span>
                        ))}
                    </div> */}
                </div>
            </div>
        );
    }
}

const mapStateToProps = (state) => ({
    user: state.auth.user
})
const mapDispathToProps = (dispatch) => ({
    changeUserInfo: user => dispatch(updateUserInfo(user))
})

export default connect(mapStateToProps, mapDispathToProps)(ProfileLayout);
