import React, { Component } from 'react';
import { Link } from 'react-router-dom'

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
                                <li key={i}><Link to={item.href}>{item.title}</Link></li>
                            ))}
                        </ul>
                    ) : (<div className="text-center mt-2 float-left w-100"><p className="text-center text-secondary">موردی برای نمایش وجود ندارد</p></div>)
                }
            </div>
        );
    }
}

export default BottomItem;