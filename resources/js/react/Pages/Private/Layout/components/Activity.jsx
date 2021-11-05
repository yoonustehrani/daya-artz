import React, { Component } from 'react';
import { Spinner } from 'react-activity'

class Activity extends Component {
    render() {
        return (
            <div className="activity-container"><Spinner color="#6332df" size={34} /></div>
        );
    }
}

export default Activity;