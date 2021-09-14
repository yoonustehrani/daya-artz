import React, { Component } from 'react';
import withAuthRoute from '../components/withAuthRoute';
import { Route } from 'react-router';

class PrivateRoute extends Component {
    render() {
        return (
            <Route exact={!! this.props.exact} path={this.props.path} render={this.props.render}/>
        );
    }
}

export default withAuthRoute(PrivateRoute);