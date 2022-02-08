import React, { Component } from 'react';

class Paginate extends Component {
    render() {
        let { current_page, next_page_url, prev_page_url, next_page_handler, prev_page_handler } = this.props
        return (
            <nav className="pagination-nav">
                <a className={`pagination-btn ${ current_page_index <= 1 ? "disabled" : "" }`} onClick={() => prev_page_handler()}>
                    <i className="fad fa-chevron-double-left mr-1"></i>
                    <span>قبلی</span>
                </a>
                <span className="page-index">{current_page}</span>
                <a className={`pagination-btn ${ current_page_index>=last_page_index ? "disabled" : "" }`} onClick={() => next_page_handler()}>
                    <span>بعدی</span>
                    <i className="fad fa-chevron-double-right ml-1"></i>
                </a>
            </nav>
        );
    }
}

export default Paginate;