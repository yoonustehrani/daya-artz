import React, { Component } from 'react';

class welcome extends Component {
    componentDidMount() {
        let { path } = this.props, elements = $(".change-form-content").find("h2, p")
        elements.map((i, elem) => {
            if (path === "/auth/signup") {
                $(".change-form-content").addClass("left-20")
                i > 1 ? $(elem).addClass("d-none") : null
            } else if (path === "/auth/login") {
                $(".change-form-content").addClass("right-20")
                i < 2 ? $(elem).addClass("d-none") : null
            }
        })
    }
    
    render() {
        return (
            <div className="change-form-content d-md-flex d-none">
                <h2>!خوش آمدید</h2>
                <p>اگر در حال حاضر داخل دایا حساب دارید با زدن دکمه زیر وارد صفحه ورود شوید ...</p>
                <h2>!سلام دوست عزیز</h2>
                <p>اگه هنوز ثبت نام نکردی میتونی با زدن دکمه زیر ثبت نام در دایا رو آغاز کنی ...</p>
            </div>
        );
    }
}

export default welcome;