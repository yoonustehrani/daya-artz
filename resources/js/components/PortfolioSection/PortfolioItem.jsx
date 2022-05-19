const PortfolioItem = function({title, url, image}) {
    return (
        <a href={url} className="portfolio col-xl-2 col-lg-3 col-md-4 col-6 p-0 animated fadeIn">
            <div className="portfolio-avatar">
                {image && image.file && <img data-src={APP_PATH + image.file.path} className="lazyload" alt={image.alt} />}
            </div>
            <div className="portfolio-detail">
                <p className="title">{title}</p>
            </div>
        </a>
    )
}

export default PortfolioItem;