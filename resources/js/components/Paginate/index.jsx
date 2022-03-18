import React from 'react';

function Paginate({ current_page, next_page_url, prev_page_url, next_page_handler, prev_page_handler }) {
    return (
        <nav className="pagination-nav">
            <a className={`pagination-btn ${ !prev_page_url ? "disabled" : "" }`} onClick={() => prev_page_handler()}>
                <i className="fad fa-chevron-double-left mr-1"></i>
                <span>قبلی</span>
            </a>
            <span className="page-index">{current_page}</span>
            <a className={`pagination-btn ${ !next_page_url ? "disabled" : "" }`} onClick={() => next_page_handler()}>
                <span>بعدی</span>
                <i className="fad fa-chevron-double-right ml-1"></i>
            </a>
        </nav>
    );
}

export default Paginate;