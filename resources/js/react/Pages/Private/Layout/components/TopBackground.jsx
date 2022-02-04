import React, { Component } from 'react';

class TopBackground extends Component {
    render() {
        return (
            <div className="top-background d-flex justify-content-center">
                <img className='h-100 w-auto' src={APP_PATH + 'images/daya-white-logo.png'} />
                {/* <div className='absolute z-10'>
                    <i id="menu-open" className="float-right d-md-none fas fa-bars"></i>
                </div> */}
            </div>
        );
    }
}

export default TopBackground;