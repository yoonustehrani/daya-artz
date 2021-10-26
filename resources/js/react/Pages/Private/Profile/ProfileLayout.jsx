import React, { Component } from 'react';
import axios from 'axios';
// redux
import { connect } from 'react-redux';
import { logUserIn } from '../../../redux/actions'

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
        axios.post('', user).then(res => {
            let user = res.data
            updateInfo(user)
        })
    }

    render() {
        let { fields, title } = this.props, { user } = this.state
        return (
            <div>
                <h4 className="form-title">{title}</h4>
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
    updateInfo: Info => dispatch(logUserIn(Info))
})

export default connect(mapStateToProps, mapDispathToProps)(ProfileLayout);