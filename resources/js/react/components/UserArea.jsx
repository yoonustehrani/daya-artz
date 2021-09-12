import React, { Component } from 'react';
import AuthContext from '../context/AutrhContext';
import Login from '../Pages/Login';
import UserAreaHandler from './UserAreaHandler';

class UserArea extends Component {
    constructor(props) {
        super(props)
        this.state = {
            user: {
                email: "yoonustehrani@example.com",
                name: "Yoonus"
            }
        }
    }
    render() {
        return (
            <AuthContext.Provider value={this.state.user}>
                {this.state.user 
                ? <UserAreaHandler />
                : <Login />
                }
            </AuthContext.Provider>
        );
    }
}

export default UserArea;