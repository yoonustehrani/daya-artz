import React, { Component } from 'react';
import { connect } from 'react-redux';
import { BrowserRouter as Router, Link, Route, Switch } from 'react-router-dom';
import PrivateRoute from '../router/PrivateRoute';
import Dashboard from '../Pages/Dashboard';
import Auth from '../Pages/Auth';

function mapStateToProps(state) {
    return {
        loadingApp: state.auth.loading
    };
}

class UserArea extends Component {
    render() {
        let { loadingApp } = this.props;
        if (loadingApp) {
            return (
                <center><h1 style={{ direction: 'ltr', marginTop: '50px' }}>App is Loading ...</h1></center>
            )
        }
        return (
            <Router basename="/userarea">
                <Switch>
                    <Route path="/test" children={({history, location, match}) => {
                        console.log(history);
                        console.log(location);
                        console.log(match);
                        return <h1 style={{ float: 'left', padding: '5px' }}>test</h1>
                    }}/>
                    <PrivateRoute exact={true} path="/">
                        <Dashboard />
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