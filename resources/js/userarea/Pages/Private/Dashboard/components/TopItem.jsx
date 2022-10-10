import React, { Component } from 'react';
import { Link } from 'react-router-dom';
import Loading from '../../Layout/components/Loading'

class TopItem extends Component {
    render() {
        let { number, title, buttons, icon } = this.props
        return (
            <div className="dashboard-item-container col-12 col-md-6 col-lg-4">
                <div className="dashboard-top-item">
                    <div className="shapes-back-img">
                        <span className="top-item-icon"><i className={icon}></i></span>
                        <div className="top-item-info">
                            <span>{number === false ? <Loading/> : number}</span>
                            <h4>{title}</h4>
                            <div>
                                {buttons.map((button, i) => (
                                    <Link key={i} to={button.href} className="badge badge-pill m-1">{button.title}</Link>
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