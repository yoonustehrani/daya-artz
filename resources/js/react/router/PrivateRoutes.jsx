import React, { Component } from 'react';
// custom components
import PrivateRoute from "./PrivateRoute";
import Dashboard from '../Pages/Dashboard'

class PrivateRoutes extends Component {
    render() {
        return (
            <div>
                <PrivateRoute exact={true} path="/">
                    <Dashboard />
                </PrivateRoute>    

            </div>
        );
    }
}

export default PrivateRoutes;