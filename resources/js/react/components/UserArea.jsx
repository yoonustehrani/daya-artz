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
        return (
            <Provider store={store}>
                <Router basename="/userarea">
                    <Switch>
                        <Route path="/auth" component={AuthRoute}/>
                        {/* <Route path="/auth">
                            {(props) => (<AuthRoute {...props} />)}
                        </Route> */}
                        <Layout />
                    </Switch>
                </Router>
            </Provider>
        );
    }
}

export default UserArea;