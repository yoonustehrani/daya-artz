import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class DayaLogo extends Component {
    render() {
        return (
            <Link to="/" className="daya-logo ltr">
                <img className="animated d-md-inline d-none" src={APP_PATH + "images/daya-white-logo.png"} alt="daya-logo" />
                <img className="animated d-md-none" src={APP_PATH + "images/daya-white-logo.png"} alt="daya-logo" />
                <span>DAYA-ARTZ</span>
            </Link>
        );
    }
}

export default DayaLogo;