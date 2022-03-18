import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import NoItem from '../../Layout/components/NoItem';

class BottomItem extends Component {
    render() {
        let { title, items } = this.props
        return (
            <div className="dashboard-item-container col-12 col-md-4">
                <div className="dashboard-bottom-item">
                    <div className="top-header">
                        <div className="shapes-back-img">
                            <h4>{title}</h4>
                        </div>
                    </div>
                </div>
                {
                    items && items.length > 0
                    ? ( <ul className="bottom-items">
                            {items.map((item,i) => (
                                <li key={i}><Link to={item.href ?? '#'}>{item.text}</Link></li>
                            ))}
                        </ul>
                    ) : <NoItem/>
                }
            </div>
        );
    }
}

export default BottomItem;