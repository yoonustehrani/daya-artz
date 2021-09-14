import React, { Component } from 'react';
import AuthContext from '../context/AutrhContext';
import Login from '../Pages/Login';
// import UserAreaHandler from './UserAreaHandler';
import { BrowserRouter, Link, Route, Switch } from 'react-router-dom';
import PrivateRoute from '../router/PrivateRoute';
import Dashboard from '../Pages/Dashboard';

class UserArea extends Component {
    constructor(props) {
        super(props)
        this.state = {
            auth: {
                user: null
            }
        }
    }
    render() {
        return (
            <AuthContext.Provider value={this.state.auth}>
                <BrowserRouter basename="/userarea">
                    <Switch>
                        <Route exact path="/">
                        <ul>
                            <li><Link to="/dashboard">Dashboard</Link></li>
                        </ul>
                        </Route>
                        <PrivateRoute exact={true} path="/dashboard">
                            <Dashboard />
                        </PrivateRoute>
                        <Route exact path="/login" component={Login}></Route>
                    </Switch>
                </BrowserRouter>
            </AuthContext.Provider>
        );
    }
}

export default UserArea;