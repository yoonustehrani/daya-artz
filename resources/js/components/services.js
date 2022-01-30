$(".services-groups-container > .group-item").each((index, elem) => {
    $(elem).find(".group-name, .computer-container").mouseenter(() => {
        $(elem).addClass("hovered")
    })
    $(elem).find(".group-name, .computer-container").mouseleave(() => {
        $(elem).removeClass("hovered")
    })
    $(elem).find(".group-name, .computer-container").click(() => {
        var target_elem = $(".service-groups-container").children().eq(index), target_position = $(target_elem).offset().top + $("body").scrollTop()
        $(window).width >= 768 ? target_position - 100 : null
        $("body").animate({
            scrollTop: target_position
        }, 500)
    })
})