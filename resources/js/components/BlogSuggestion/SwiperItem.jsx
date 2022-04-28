import React, { Component } from 'react';
import { useJalaliDate } from '../../userarea/hooks';
class SwiperItem extends Component {
    render() {
        let { title, description, reading_time, url, created_at, image } = this.props, {alt, file} = image??{}, { path, thumbnail_path } = file??{}
        return (
            <article className="blog-post col-12 col-md-4 col-lg-3 swiper-slide">
                <a href={url}>
                    <div className="img-container w-100">
                        <img src={path ? `${APP_PATH + path}` : ""} alt={alt} className="w-100 h-100" />
                        <span className="article-date">{useJalaliDate(created_at).format("jD jMMMM")} <br/> {useJalaliDate(created_at).format("jYYYY")}</span>
                    </div>
                    <div className="article-info">
                        {/* <p className="blog-post-source">نوشته شده توسط دایا آرتز</p> */}
                        <h3 className="title block mt-4">{title}</h3>
                        <p className="blog-post-description text-secondary">{description}</p>
                        <div className="article-time"><span>زمان مطالعه: {reading_time} <i className="far fa-clock"></i></span></div>
                    </div>
                </a>
            </article>
        );
    }
}

export default SwiperItem;