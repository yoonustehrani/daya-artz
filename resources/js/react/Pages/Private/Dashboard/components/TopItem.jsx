import React, { Component } from 'react';
import { Link } from 'react-router-dom';

class TopItem extends Component {
    render() {
        let { number, title, buttons, icon } = this.props
        return (
            <div className="dashboard-item-container col-12 col-md-4">
                <div className="dashboard-top-item">
                    <div>
                        <span className="top-item-icon"><i className={icon}></i></span>
                        <div className="top-item-info">
                            <span>{number}</span>
                            <h4>{title}</h4>
                            <div>
                                {buttons.map((button, i) => (
                                    <Link key={i} to={button.href} className="badge badge-pill">{button.title}</Link>
                                ))}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default TopItem;