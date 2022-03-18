import React, { Component } from 'react';

class TopBackground extends Component {
    render() {
        return (
            <div className="top-background d-flex justify-content-center">
                <a href={APP_PATH}>
                    <img className='h-25 mt-4' src={APP_PATH + 'images/logo-with-inner-shadow.png'} />
                </a>
                {/* <div className='absolute z-10'>
                    <i id="menu-open" className="float-right d-md-none fas fa-bars"></i>
                </div> */}
            </div>
        );
    }
}

export default TopBackground;