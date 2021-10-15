import React, { Component } from 'react';
// custom components
import Sidebar from './components/Sidebar';
import TopBackground from './components/TopBackground';
import Footer from './components/Footer';
import PrivateRoutes from '../../../router/PrivateRoutes';
import PrivateRoute from '../../../router/PrivateRoute';

class Layout extends Component {
    render() {
        return (
            <PrivateRoute exact={false} path="/">
                <div className="user-area-layout-container">
                    <TopBackground />
                    <div className="user-area-panel">
                        <div className="main-content-container">
                            <PrivateRoutes />
                        </div>   
                        <Sidebar /> 
                    </div>
                    <Footer />
                </div> 
            </PrivateRoute> 
        );
    }
}

export default Layout;