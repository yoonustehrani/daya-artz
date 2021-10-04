import React, { Component } from 'react';
import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';
// Redux
import { Provider } from 'react-redux';
import store from '../redux/store';
// custom components
import PrivateRoutes from '../router/PrivateRoutes';
import AuthRoute from '../router/AuthRoute';

class UserArea extends Component {
    render() {
        return (
            <Provider store={store}>
                <Router basename="/userarea">
                    <Switch>
                        <AuthRoute />
                        <PrivateRoutes />
                    </Switch>
                </Router>
            </Provider>
        );
    }
}

export default UserArea;