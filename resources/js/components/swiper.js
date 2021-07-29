// import needed moduled
import Swiper from 'swiper'
import 'swiper/swiper-bundle.css'
import SwiperCore, { Navigation } from 'swiper/core'

// initialize swiper
SwiperCore.use([Navigation])
const swiper = new Swiper('.swiper-container', {
    direction: 'horizontal',
    loop: true,
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