import React, { Component } from 'react';
import moment from 'moment-jalaali';
require('moment/locale/fa')
moment.loadPersian({
    usePersianDigits: true,
    dialect: "persian-modern"
})

class SwiperItem extends Component {
    render() {
        let { title, description, reading_time, url, image_url, image_alt, created_at } = this.props
        return (
            <article className="blog-post col-12 col-md-4 col-lg-3 swiper-slide">
                <a href={url}>
                    <div className="img-container w-100">
                        <img src={APP_PATH + image_url} alt={image_alt} className="w-100 h-100" />
                        <span className="article-date">{moment(created_at).format('jDD jMMMM')} <br/> {moment(created_at).format("jYYYY")}</span>
                    </div>
                    <div className="article-info">
                        <p className="blog-post-source">نوشته شده توسط دابا آرتز</p>
                        <h3 className="title block">{title}</h3>
                        <p className="blog-post-description text-secondary">{description}</p>
                        <div className="article-time"><span>زمان مطالعه: {reading_time} <i className="far fa-clock"></i></span></div>
                    </div>
                </a>
            </article>
        );
    }
}

export default SwiperItem;