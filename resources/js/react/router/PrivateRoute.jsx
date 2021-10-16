import React, { Component } from 'react';
import { Redirect, Route } from 'react-router-dom'
import { connect } from 'react-redux'


class PrivateRoute extends Component {
    render() {
        let {path, children, user, exact} = this.props
        return (
            <Route path={path} exact={exact} render={({location}) => (user
                ? location.pathname === "/" ? <Redirect to={{ pathname: "/dashboard", state: {from: location} }} /> : children
                : <Redirect to={{ pathname: "/auth", state: {from: location} }} />
            )
            }
            />
        )
    }
}

const mapStateToProps = (state) => ({
    user: state.auth.user
})
export default connect(mapStateToProps)(PrivateRoute)
