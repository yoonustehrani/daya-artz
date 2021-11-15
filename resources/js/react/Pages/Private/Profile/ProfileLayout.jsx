import React, { Component } from 'react';
// redux
import { connect } from 'react-redux';
import { updateUserInfo } from '../../../redux/actions'

class ProfileLayout extends Component {
    constructor(props) {
        super(props);
        this.state = {
            user: this.props.user
        }
    }
    changeInfo = (path, value) => {
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

    updateInfo = () => {
        let { updateInfo } = this.props, { user } = this.state
        
    }

    render() {
        let { fields, title } = this.props, { user } = this.state
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
                    <button className="btn btn-lg col-12 col-md-2" onClick={this.updateInfo.bind(this)}>ثبت</button>
                </div>
            </div>
        );
    }
}

const mapStateToProps = (state) => ({
    user: state.auth.user
})

const mapDispathToProps = (dispatch) => ({
    updateInfo: user => dispatch(updateUserInfo(user))
})

export default connect(mapStateToProps, mapDispathToProps)(ProfileLayout);