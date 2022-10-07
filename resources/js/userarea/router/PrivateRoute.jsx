import React, { Component } from 'react';
import { Redirect, Route } from 'react-router-dom'
import { connect } from 'react-redux'
import Title from '../Pages/Private/Layout/components/Title';

class PrivateRoute extends Component {
    render() {
        let {path, children, user, exact, CallableComponent, title } = this.props
        return (
            <Route path={path} exact={exact} render={({history, location, match}) => (user
                ? location.pathname === "/" ? <Redirect to={{ pathname: "/dashboard", state: {from: location} }} /> : <>{title && <Title text={title}/>}{CallableComponent && <CallableComponent history={history} location={location} {...match} {...this.props} />}{children}</>
                : <Redirect to={{ pathname: "/auth/login", state: {from: location} }} />
            )}/>
        )
    }
}

const mapStateToProps = (state) => ({
    user: state.auth.user
})

export default connect(mapStateToProps)(PrivateRoute)
