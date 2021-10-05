import React, { Component } from 'react';
import { connect } from 'react-redux';
import { BrowserRouter as Router, Link, Route, Switch } from 'react-router-dom';
import PrivateRoute from '../router/PrivateRoute';
import Dashboard from '../Pages/Dashboard';
import Auth from '../Pages/Auth';
import Spinner from 'react-activity/dist/Spinner'

function mapStateToProps(state) {
    return {
        loadingApp: state.auth.loading
    };
}

class UserArea extends Component {
    render() {
        if (this.props.loadingApp)
            return <center className="centered-by-translate"><Spinner color="#8F60EC" size={72} speed={0.8} animating={true} /></center>
        return (
            <Router basename="/userarea">
                <Switch>
                    <PrivateRoute exact={true} path="/">
                        <Dashboard />
                    </PrivateRoute>
                    <PrivateRoute path="/sampi">
                        <center><h3>Hello Person !</h3></center>
                    </PrivateRoute>
                    <Route exact path="/login" component={Auth}></Route>
                </Switch>
            </Router>
        );
    }
}

export default connect(
    mapStateToProps,
)(UserArea);