import React, { Component } from 'react';
import AuthContext from '../context/AutrhContext';
import Login from '../Pages/Login';

class UserArea extends Component {
    constructor(props) {
        super(props)
        this.state = {
            user: null
        }
    }
    render() {
        return (
            <AuthContext.Provider value={this.state.user}>
                {this.state.user 
                ? <div>Hello</div>
                : <Login />
                }
            </AuthContext.Provider>
        );
    }
}

export default UserArea;