import React, { Component } from 'react';

class BrandInfo extends Component {
    render() {
        let { children } = this.props
        return (
            <div>
                BRAND INFO
                {children}
            </div>
        );
    }
}

export default BrandInfo;