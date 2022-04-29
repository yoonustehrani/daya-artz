import { render } from "react-dom";
import QuickOrder from "./QuickOrder";
import PortfolioSection from "./PortfolioSection";
import BlogSwiper from './BlogSuggestion'
import ServiceSearch from "./ServiceSearch";
import './menu'
import './logo-fade'
import './item-info'
import './accordion'
import './animation'
import './section-guide'
import 'select2/dist/js/select2.min.js'
import './services'
import './scrollTo'
import './portfolioImages'
import './loadEnamad'
import './lazyLoad'
import './lity'

// quick order
const quickOrderElement = document.getElementById("react-quick-order")
if (quickOrderElement) {
    render(<QuickOrder reCAPTCHA_Key={quickOrderElement.getAttribute('data-recaptcha')} targetApi={quickOrderElement.getAttribute('data-post-api')} searchApi={quickOrderElement.getAttribute("data-search")} dataInitial={quickOrderElement.getAttribute("data-initial")}/>, quickOrderElement)
}

// portfolio section
const portfolioSectionElement = document.querySelector("div[react-portfolio-section]");
if (portfolioSectionElement) {
    render(<PortfolioSection targetApi={portfolioSectionElement.getAttribute('data-target-api')}/>, portfolioSectionElement)
}

// blog suggestion
const blogSuggestionElement = document.getElementById("blog-suggestion-react")
if (blogSuggestionElement) {
    render(<BlogSwiper apiTargetLatest={blogSuggestionElement.getAttribute("api-target-latest")} apiTargetRandom={blogSuggestionElement.getAttribute("api-target-random")}/>, blogSuggestionElement)
}

// service search
const serviceSearchElement = document.getElementById("react-service-search")
if (serviceSearchElement) {
    render(<ServiceSearch searchApi={serviceSearchElement.getAttribute("data-search")}/>, serviceSearchElement)
}