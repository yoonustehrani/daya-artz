import React, { Component } from 'react';
import { connect } from 'react-redux';
import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';
// custom components
import AuthRoute from '../router/AuthRoute';
import Layout from '../Pages/Private/Layout';
import Spinner from "react-activity/dist/Spinner";

const mapStateToProps = (state) => ({
    loadingApp: state.auth.loading
})

class UserArea extends Component {
    render() {
        if (this.props.loadingApp)
            return <center className="centered-by-translate"><Spinner color="#8F60EC" size={72} speed={0.8} animating={true} /></center>
        return (
            <Router basename="/userarea">
                <Switch>
                    <Route path="/auth" component={AuthRoute}/>
                    <Layout />
                </Switch>
            </Router>
        );
    }
}

export default connect(
    mapStateToProps,
)(UserArea);