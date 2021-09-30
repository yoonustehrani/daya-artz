import React, { Component } from 'react';
// import UserAreaHandler from './UserAreaHandler';
import { BrowserRouter as Router, Link, Route, Switch } from 'react-router-dom';
import PrivateRoute from '../router/PrivateRoute';
import Dashboard from '../Pages/Dashboard';
import Auth from '../Pages/Auth';
import { Provider } from 'react-redux';
import { createStore } from 'redux';
import reducers from '../redux/reducers';

class UserArea extends Component {
    store = createStore(reducers, window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__())

    render() {
        return (
            <Provider store={this.store}>
                <Router basename="/userarea">
                    <Switch>
                        <PrivateRoute exact={true} path="/">
                            <Dashboard />
                        </PrivateRoute>
                        <Route exact path="/login" component={Auth}></Route>
                    </Switch>
                </Router>
            </Provider>
        );
    }
}

export default UserArea;