import React, { Component } from 'react';
import { Redirect, Route } from 'react-router-dom'
import { connect } from 'react-redux'

class PrivateRoute extends Component {
    render() {
        let {path, children, user, exact, CallableComponent} = this.props
        return (
            <Route path={path} exact={exact} render={({location, match}) => (user
                ? location.pathname === "/" ? <Redirect to={{ pathname: "/dashboard", state: {from: location} }} /> : <>{CallableComponent && <CallableComponent {...match}/>}{children}</>
                : <Redirect to={{ pathname: "/auth/login", state: {from: location} }} />
            )}/>
        )
    }
}

const mapStateToProps = (state) => ({
    user: state.auth.user
})
export default connect(mapStateToProps)(PrivateRoute)
