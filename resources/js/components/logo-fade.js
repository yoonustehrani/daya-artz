if ($(".portfolio-section")) {
    // here we get send get req by ajax and get the items (paginated)
    let items = [
        {
            href: "#",
            img_src: `${APP_PATH}images/gallery/orange-studio-logo.jpg`,
            title: "استودیو ترنج",
            icon_class: "fa fa-brush",
            properties: [
                "صنایع دستی",
                "طراحی تخصصی",
                "عناصر مرتبط",
                "رنگ شناسی حرفه ای"
            ]
        },
        {
            href: "#",
            img_src: `${APP_PATH}images/gallery/reverse-logo.jpg`,
            title: "Reverse Band",
            icon_class: "fas fa-headphones",
            properties: [
                "موسیقی",
                "طراحی تخصصی",
                "عناصر مرتبط",
                "رنگ شناسی حرفه ای"
            ]
        },
        {
            href: "#",
            img_src: `${APP_PATH}images/gallery/elnovel-logo.jpg`,
            title: "الناول",
            icon_class: "fas fa-book-open",
            properties: [
                "داستان و ادبیات",
                "طراحی تخصصی",
                "عناصر مرتبط",
                "رنگ شناسی حرفه ای"
            ]
        },
        {
            href: "#",
            img_src: `${APP_PATH}images/gallery/vispubish-logo.jpg`,
            title: "ویسپوپیش",
            icon_class: "fas fa-pen",
            properties: [
                "پایگاه مقالات ادبی",
                "طراحی تخصصی",
                "عناصر مرتبط",
                "رنگ شناسی حرفه ای"
            ]
        },
        {
            href: "#",
            img_src: `${APP_PATH}images/gallery/sampi-logo.jpg`,
            title: "Sampi Tech Group",
            icon_class: "fas fa-code",
            properties: [
                "استارتاپ استودیو",
                "طراحی تخصصی",
                "عناصر مرتبط",
                "رنگ شناسی حرفه ای"
            ]
        },
        {
            href: "#",
            img_src: `${APP_PATH}images/gallery/tehran-tejarat-logo.jpg`,
            title: "تهران تجارت",
            icon_class: "fas fa-briefcase",
            properties: [
                "شرکت بازرگانی",
                "طراحی تخصصی",
                "عناصر مرتبط",
                "رنگ شناسی حرفه ای"
            ]
        },
        {
            href: "#",
            img_src: `${APP_PATH}images/gallery/reverse-logo.jpg`,
            title: "Reverse Band",
            icon_class: "fas fa-headphones",
            properties: [
                "موسیقی",
                "طراحی تخصصی",
                "عناصر مرتبط",
                "رنگ شناسی حرفه ای"
            ]
        },
        {
            href: "#",
            img_src: `${APP_PATH}images/gallery/orange-studio-logo.jpg`,
            title: "استودیو ترنج",
            icon_class: "fa fa-brush",
            properties: [
                "صنایع دستی",
                "طراحی تخصصی",
                "عناصر مرتبط",
                "رنگ شناسی حرفه ای"
            ]
        },
        {
            href: "#",
            img_src: `${APP_PATH}images/gallery/vispubish-logo.jpg`,
            title: "ویسپوپیش",
            icon_class: "fas fa-pen",
            properties: [
                "پایگاه مقالات ادبی",
                "طراحی تخصصی",
                "عناصر مرتبط",
                "رنگ شناسی حرفه ای"
            ]
        },
        {
            href: "#",
            img_src: `${APP_PATH}images/gallery/elnovel-logo.jpg`,
            title: "الناول",
            icon_class: "fas fa-book-open",
            properties: [
                "داستان و ادبیات",
                "طراحی تخصصی",
                "عناصر مرتبط",
                "رنگ شناسی حرفه ای"
            ]
        },
        {
            href: "#",
            img_src: `${APP_PATH}images/gallery/tehran-tejarat-logo.jpg`,
            title: "تهران تجارت",
            icon_class: "fas fa-briefcase",
            properties: [
                "شرکت بازرگانی",
                "طراحی تخصصی",
                "عناصر مرتبط",
                "رنگ شناسی حرفه ای"
            ]
        },
        {
            href: "#",
            img_src: `${APP_PATH}images/gallery/sampi-logo.jpg`,
            title: "Sampi Tech Group",
            icon_class: "fas fa-code",
            properties: [
                "استارتاپ استودیو",
                "طراحی تخصصی",
                "عناصر مرتبط",
                "رنگ شناسی حرفه ای"
            ]
        }
    ]

    $(".portfolio-section").each(function (index) {
        let item_index = 0
        let interval_time
        $(this).children().each(function (i) {
            interval_time = 5000
            setTimeout(() => {
                setInterval(() => {
                    $(this).children(".portfolio").toggleClass("fadeIn fadeOut")
                    setTimeout(() => {
                        $(this).find("img").attr('src', items[item_index].img_src)
                        $(this).find(".title").html(items[item_index].title)
                        $(this).find("div.portfolio-detail > ul").children("li").each(function (list_item) {
                            $(this).html(items[item_index].properties[list_item])
                            if (list_item === 0) {
                                $(this).html(`${items[item_index].properties[list_item]} <i class="${items[item_index].icon_class}"></i>`)
                            }
                        })
                        $(this).children(".portfolio").toggleClass("fadeIn fadeOut")
                        item_index + 1 === items.length ? item_index = 0 : item_index += 1  
                    }, 1000)
                }, interval_time)
            }, i*150);
        })
    })
}