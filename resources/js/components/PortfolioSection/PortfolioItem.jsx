const PortfolioItem = function({title, url, image}) {
    return (
        <a href={url}>
            <div className="portfolio col-xl-2 col-lg-3 col-md-4 col-6 p-0 animated fadeIn">
                <div className="portfolio-avatar">
                    {image && <img src={APP_PATH + image.path} alt={image.name} />}
                </div>
                <div className="portfolio-detail">
                    <p className="title">{title}</p>
                    {/* <ul>
                        <li>صنایع دستی <i className="fas fa-brush"></i></li>
                        <li>طراحی تخصصی</li>
                        <li>عناصر مرتبط</li>
                        <li>رنگ شناسی حرفه ای</li>
                    </ul> */}
                </div>
            </div>
        </a>
    )
}

export default PortfolioItem;