import React, { Component } from 'react';
import SwiperItem from './SwiperItem';
import Swiper from 'swiper'
import 'swiper/swiper-bundle.css'
import SwiperCore, { Navigation } from 'swiper/core'
import LoaderComponents from '../../react/components/LoaderComponent'
import axios from 'axios';

class BlogSwiper extends Component {
    constructor(props) {
        super(props);
        this.state = {
            swiperItems: [],
            loading: true
        }
    }
    
    componentDidMount() {
        let { apiTargetLatest, apiTargetRandom } = this.props, { swiperItems, loading } = this.state
        axios.get(apiTargetLatest).then((res) => {
            let { data } = res
            this.setState({
                swiperItems: data,
                loading: false
            }, () => {
                // initialize swiper
                SwiperCore.use([Navigation])
                const swiper = new Swiper('.swiper-container', {
                    direction: 'horizontal',
                    loop: false,
                    autoHeight: true,
                    slidesPerView: 1,
                    spaceBetween: 0,
                    centeredSlides: true,
                    centeredSlidesBounds: true,
                    centerInsufficientSlides: true,
                    breakpoints: {
                        768: {
                            slidesPerView: 3
                        },
                        992: {
                            slidesPerView: 4
                        }
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                })
            })
        })
    }
    
    render() {
        let { swiperItems, loading } = this.state
        return (
            <div className="section w-100 mt-5">
                <div className="title-section col-12 mb-3">
                    <div className="title-container">
                        <h2 className="title-text">دایا بلاگ</h2>
                        <span className="title-underline"></span>
                    </div>
                </div>
                { 
                    loading ? <div className="loader-container"><LoaderComponents /></div>
                    : swiperItems.length > 0 ? 
                    <div className="blog-posts-container swiper-container w-100">
                        <div className="swiper-wrapper">
                            {  swiperItems.map((item, i) => (
                                <SwiperItem key={i} {...item} />
                            ))  }
                        </div>
                        <div className="swiper-button-prev"></div>
                        <div className="swiper-button-next"></div>
                    </div>
                    : <p className='w-100 text-center float-left mt-1'>موردی برای نمایش وجود ندارد</p>
                }
            </div>
        );
    }
}

export default BlogSwiper;