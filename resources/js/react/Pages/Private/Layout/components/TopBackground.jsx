import React, { Component } from 'react';

class TopBackground extends Component {
    render() {
        return (
            <div className="top-background d-flex justify-content-center">
                <a href={APP_PATH}>
                    <img className='h-100 mt-md-4' src={APP_PATH + 'images/logo-with-inner-shadow.png'} />
                </a>
            </div>
        );
    }
}

export default TopBackground;