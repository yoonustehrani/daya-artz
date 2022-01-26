const PortfolioItem = function({title, url, image}) {
    return (
        <a href={url}>
            <div class="portfolio col-xl-2 col-lg-3 col-md-4 col-6 p-0 animated fadeIn">
                <div class="portfolio-avatar">
                    <img src={image.url} alt={image.alt} />
                </div>
                <div class="portfolio-detail">
                    <p class="title">{title}</p>
                    {/* <ul>
                        <li>صنایع دستی <i class="fas fa-brush"></i></li>
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