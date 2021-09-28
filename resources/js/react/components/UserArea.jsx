import React, { Component } from 'react';
import Auth from '../Pages/Login';
// import UserAreaHandler from './UserAreaHandler';
import { BrowserRouter, Link, Route, Switch } from 'react-router-dom';
import PrivateRoute from '../router/PrivateRoute';
import Dashboard from '../Pages/Dashboard';
import { Provider } from 'react-redux';
import { createStore } from 'redux';
import reducers from '../redux/reducers';

class UserArea extends Component {
    store = createStore(reducers, window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__())

    render() {
        return (
            <Provider store={this.store}>
                <BrowserRouter basename="/userarea">
                    <Switch>
                        <PrivateRoute exact={true} path="/">
                            <Dashboard />
                        </PrivateRoute>
                        <Route exact path="/login" component={Auth}></Route>
                    </Switch>
                </BrowserRouter>
            </Provider>
        );
    }
}

export default UserArea;