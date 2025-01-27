import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class DayaLogo extends Component {
    componentDidMount() {
        let { state } = this.props
        state === "login" || state === "forgetPassword" ? $(".daya-logo").addClass("purple-cl") : null
    }
    
    render() {
        return (
            <a href='/' className="daya-logo ltr">
                <img className="animated d-md-inline d-none" src={APP_PATH + "images/daya-white-logo.png"} alt="daya-logo" />
                <img className="animated d-md-none" src={APP_PATH + "images/daya-white-logo.png"} alt="daya-logo" />
                <span>DAYAARTZ</span>
            </a>
        );
    }
}

export default DayaLogo;