import React, { Component } from 'react';
import { BrowserRouter as Router, Switch, Route } from 'react-router-dom';
// Redux
import { Provider } from 'react-redux';
import store from '../redux/store';
// custom components
import AuthRoute from '../router/AuthRoute';
import Layout from '../Pages/Private/Layout';

class UserArea extends Component {
    render() {
        if (this.props.loadingApp)
            return <center className="centered-by-translate"><Spinner color="#8F60EC" size={72} speed={0.8} animating={true} /></center>
        return (
            <Provider store={store}>
                <Router basename="/userarea">
                    <Switch>
                        <Route path="/auth" component={AuthRoute}/>
                        <Layout />
                    </Switch>
                </Router>
            </Provider>
        );
    }
}

export default connect(
    mapStateToProps,
)(UserArea);