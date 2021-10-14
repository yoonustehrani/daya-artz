import React, { Children, Component } from 'react';
import { Switch } from 'react-router-dom';

class Profile extends Component {
    render() {
        let { children } = this.props
        return (
            <div>
                <p>Profile</p>   
                {children}          
            </div>
        );
    }
}

export default Profile;