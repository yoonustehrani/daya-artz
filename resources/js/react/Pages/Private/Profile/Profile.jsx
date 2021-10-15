import React, { Component } from 'react';

class Profile extends Component {
    render() {
        let { children } = this.props
        return (
            <div>
                <p>Profile</p>  
            </div>
        );
    }
}

export default Profile;