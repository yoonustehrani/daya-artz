import React, { Component } from 'react';
import Activity from '../../Layout/components/Activity';

class MiddleItem extends Component {
    render() {
        let { title, number } = this.props
        return (
            <div className="dashboard-item-container col-12 col-md-6 col-lg-4">
                <div className="dashboard-middle-item">
                    <div className="shapes-back-img">
                        {typeof number !== 'number' && <div className='h-100 d-flex align-items-center'><Activity size="16"/></div>}
                        {number >= 0 && <p>{number}</p>}
                        <h4>{title}</h4>
                    </div>
                </div>
            </div>
        );
    }
}

export default MiddleItem;