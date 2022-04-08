import React, { Component } from 'react';

class Background extends Component {
    componentDidMount() {
        let { state } = this.props, elem = $(".change-form").find("button")
        state === "login" || state === "forgetPassword" ? $(elem).html("ثبت نام") : state === "signup" ? $(elem).html("ورود") : $(elem).html("خروج")
    }

    render() {
        let { state, changeSection, history } = this.props
        return (
            <div className={`change-form d-md-block d-none ${state === "login" || state === 'forgetPassword' ? "bg-p-100 right-60" : ""}`}>
                <div>
                    <button onClick={changeSection.bind(this, history, false)} className="btn btn-lg badge-pill animated"></button>
                </div>
            </div>
        );
    }
}

export default Background;