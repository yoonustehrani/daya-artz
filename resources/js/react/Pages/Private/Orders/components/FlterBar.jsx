import React, { Component } from 'react';

class FilterBar extends Component {
    componentDidMount() {
        let { onFilterClick } = this.props
        $(".filter-items>li").each((index, elem) => {
            $(elem).on("click", () => {
                $('.filter-items>li.active').removeClass("active")
                $(elem).addClass("active")
                onFilterClick(elem.id)
            })
        })
    }
    
    render() {
        return (
            <nav className="orders-filter">
                <h4>فیلتر کردن سفارشات:</h4>
                <ul className="filter-items clickable">
                    <li id="all" className="active">همه سفارشات <span className='bg-dark-blue'></span></li>
                    <li id="just-recieved">سفارشات در انتظار <span className="bg-horny-eggplant"></span></li>
                    <li id="in-progress">سفارشات در حال انجام <span className='bg-peach'></span></li>
                    <li id="finished">سفارشات انجام شده <span className="bg-green"></span></li>
                </ul>
            </nav>
        );
    }
}

export default FilterBar;