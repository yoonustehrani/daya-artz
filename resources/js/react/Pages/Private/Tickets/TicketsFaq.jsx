import React, { Component } from 'react';

class TicketsFaq extends Component {
    faqs = [
        {
            question: "پشتیبانی دایا چگونه انجام میشود؟",
            answer: " Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, harum. Odit id minima officia enim. Fugiat nisi velit quasi vitae totam, harum corporis pariatur ipsa sint, facilis quas? Non, itaque?"
        },
        {
            question: "پشتیبانی دایا چگونه انجام میشود؟",
            answer: " Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, harum. Odit id minima officia enim. Fugiat nisi velit quasi vitae totam, harum corporis pariatur ipsa sint, facilis quas? Non, itaque?"
        },
        {
            question: "پشتیبانی دایا چگونه انجام میشود؟",
            answer: " Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, harum. Odit id minima officia enim. Fugiat nisi velit quasi vitae totam, harum corporis pariatur ipsa sint, facilis quas? Non, itaque?"
        },
        {
            question: "پشتیبانی دایا چگونه انجام میشود؟",
            answer: " Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, harum. Odit id minima officia enim. Fugiat nisi velit quasi vitae totam, harum corporis pariatur ipsa sint, facilis quas? Non, itaque?"
        },
        {
            question: "پشتیبانی دایا چگونه انجام میشود؟",
            answer: " Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, harum. Odit id minima officia enim. Fugiat nisi velit quasi vitae totam, harum corporis pariatur ipsa sint, facilis quas? Non, itaque?"
        },
        {
            question: "پشتیبانی دایا چگونه انجام میشود؟",
            answer: " Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, harum. Odit id minima officia enim. Fugiat nisi velit quasi vitae totam, harum corporis pariatur ipsa sint, facilis quas? Non, itaque?"
        },
        {
            question: "پشتیبانی دایا چگونه انجام میشود؟",
            answer: " Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, harum. Odit id minima officia enim. Fugiat nisi velit quasi vitae totam, harum corporis pariatur ipsa sint, facilis quas? Non, itaque?"
        },
        {
            question: "پشتیبانی دایا چگونه انجام میشود؟",
            answer: " Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, harum. Odit id minima officia enim. Fugiat nisi velit quasi vitae totam, harum corporis pariatur ipsa sint, facilis quas? Non, itaque?"
        },
        {
            question: "پشتیبانی دایا چگونه انجام میشود؟",
            answer: " Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, harum. Odit id minima officia enim. Fugiat nisi velit quasi vitae totam, harum corporis pariatur ipsa sint, facilis quas? Non, itaque?"
        },
        {
            question: "پشتیبانی دایا چگونه انجام میشود؟",
            answer: " Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, harum. Odit id minima officia enim. Fugiat nisi velit quasi vitae totam, harum corporis pariatur ipsa sint, facilis quas? Non, itaque?"
        },
    ]

    openfaq = (e) => {
        $(e.target).parent("span").siblings("p").toggleClass("d-none")
        $(e.target).toggleClass("fa-plus fa-minus")
    }

    render() {
        return (
            <div className="ticekts-faq">
                {this.faqs.map((item, i) => (
                    <div key={i}>
                        <span><i onClick={this.openfaq.bind(this)} className="fas fa-plus"></i></span>
                        <h4>{item.question}</h4>
                        <p className="d-none animated fadeIn">{item.answer}</p>
                    </div>
                ))}
            </div>
        );
    }
}

export default TicketsFaq;