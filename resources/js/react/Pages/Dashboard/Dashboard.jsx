import React, { Component } from 'react';
import AuthContext from '../../context/AutrhContext';

class Dashboard extends Component {
    componentDidMount() {
        document.title = "Dashboard"
    }
    render() {
        return (
            <div>
                <AuthContext.Consumer>
                    {(user) => (
                        <p>Welcome {user.name} !</p>
                    )}
                </AuthContext.Consumer>
            </div>
        );
    }
}

export default Dashboard;