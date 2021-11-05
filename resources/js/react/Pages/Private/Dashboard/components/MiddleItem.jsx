import React, { Component } from 'react';

class MiddleItem extends Component {
    render() {
        let { title, number } = this.props
        return (
            <div className="dashboard-item-container col-12 col-md-4">
                <div className="dashboard-middle-item">
                    <div className="shapes-back-img">
                        <span>{number}</span>
                        <h4>{title}</h4>
                    </div>
                </div>
            </div>
        );
    }
}

export default MiddleItem;