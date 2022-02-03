// import React from "react";
import { render } from "react-dom";
import QuickOrder from "./QuickOrder";
import './menu'
import BlogSwiper from './BlogSuggestion'
import './logo-fade'
import './item-info'
import './accordion'
import './animation'
import './section-guide'
import 'select2/dist/js/select2.min.js'
import './services'
import PortfolioSection from "./PortfolioSection";

// quick order
const quickOrderElement = document.getElementById("react-quick-order")
if (quickOrderElement) {
    render(<QuickOrder reCAPTCHA_Key={quickOrderElement.getAttribute('data-recaptcha')} targetApi={quickOrderElement.getAttribute('data-post-api')}/>, quickOrderElement)
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