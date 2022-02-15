import React, { Component } from 'react';

class welcome extends Component {
    componentDidMount() {
        let { state } = this.props, elements = $(".change-form-content").find("h2, p")
        elements.map((i, elem) => {
            if ((state === "signup" || state === "email") || state === "phone" && i > 1) {
                $(".change-form-content").addClass("left-20")
                $(elem).addClass("d-none")
            } else if ((state === "login" || state === "forgetPassword") && i < 2) {
                $(".change-form-content").addClass("right-20")
                $(elem).addClass("d-none")
            }
        })
    }
    
    render() {
        return (
            <div className="change-form-content d-md-flex d-none">
                <h2>!خوش آمدید</h2>
                <p>در صورت داشتن حساب کاربری دایا آرتز کلیک کنید...</p>
                <h2>!سلام دوست عزیز</h2>
                <p>اگه هنوز ثبت نام نکردی با زدن دکمه زیر ثبت نامت رو آغاز کن...</p>
            </div>
        );
    }
}

export default welcome;