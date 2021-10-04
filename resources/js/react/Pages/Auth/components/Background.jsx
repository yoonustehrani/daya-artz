import React, { Component } from 'react';

class Background extends Component {
    componentDidMount() {
        let { path } = this.props, elem = $(".change-form").find("button")
        path === "/auth/login" ? $(elem).html("ثبت نام") : $(elem).html("ورود")
    }
    render() {
        let { state, changeSection, history } = this.props
        return (
            <div className={`change-form d-md-block d-none ${state === "login" ? "bg-p-100 right-60" : ""}`}>
                <div>
                    <button  onClick={changeSection.bind(this, history, )} className="btn btn-lg badge-pill animated"></button>
                </div>
            </div>
        );
    }
}

export default Background;