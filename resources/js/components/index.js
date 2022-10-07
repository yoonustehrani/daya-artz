import { lazy, Suspense } from "react";
import { render } from "react-dom";
import Loading from './Loading';
import './menu';
import './logo-fade';
import './item-info';
import './accordion';
import './animation';
import './section-guide';
import 'select2/dist/js/select2.min.js';
import './services';
import './scrollTo';
import './portfolioImages';
import './loadEnamad';
// import './lazyLoad';
import './lity';

const QuickOrder = lazy(() => import('./QuickOrder'));
const PortfolioSection = lazy(() => import('./PortfolioSection'));
const BlogSwiper = lazy(() => import('./BlogSuggestion'));
const ServiceSearch = lazy(() => import('./ServiceSearch'));

// quick order
const quickOrderElement = document.getElementById("react-quick-order")
if (quickOrderElement) {
    render(
        <Suspense fallback={<Loading />}>
            <QuickOrder reCAPTCHA_Key={quickOrderElement.getAttribute('data-recaptcha')} targetApi={quickOrderElement.getAttribute('data-post-api')} searchApi={quickOrderElement.getAttribute("data-search")} dataInitial={quickOrderElement.getAttribute("data-initial")}/>
        </Suspense>,
        quickOrderElement
    )
}

// portfolio section
const portfolioSectionElement = document.querySelector("div[react-portfolio-section]");
if (portfolioSectionElement) {
    render(
        <Suspense fallback={<Loading />}>
            <PortfolioSection targetApi={portfolioSectionElement.getAttribute('data-target-api')}/>
        </Suspense>,
        portfolioSectionElement
    )
}

// blog suggestion
const blogSuggestionElement = document.getElementById("blog-suggestion-react")
if (blogSuggestionElement) {
    render(
        <Suspense fallback={<Loading />}>
            <BlogSwiper apiTargetLatest={blogSuggestionElement.getAttribute("api-target-latest")} apiTargetRandom={blogSuggestionElement.getAttribute("api-target-random")}/>
        </Suspense>,
        blogSuggestionElement
    )
}

// service search
const serviceSearchElement = document.getElementById("react-service-search")
if (serviceSearchElement) {
    render(
        <Suspense fallback={<Loading />}>
            <ServiceSearch searchApi={serviceSearchElement.getAttribute("data-search")}/>
        </Suspense>,
        serviceSearchElement
    )
}