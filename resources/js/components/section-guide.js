if ($(".section-guide-container").length > 0) {
    let open
    if ($(window).width() >= 768) {
        $(".section-guide-container").removeClass("closed")
        open = true
    }

    const toggle_guide = () => {
        open = !open
        $(".section-guide-container").toggleClass("closed")
    }

    $("#guide-toggler").click(function() {
        toggle_guide()
    })

    // the code below is for checking which element is in viewport
    const section_ids = ["#logo-info", "#order-detail", "#customer-detail", "#about-logo", "#start-order", "#daya-guide", "#daya-samples"]
    $("body").on('scroll', function() {
        let sections_info = [], current_section_index
        section_ids.map((id, index) => {
            let elem = $(id)
            sections_info.push({
                offset_top: elem[0] ? elem.offset().top : null, 
                height: elem[0] ? elem.innerHeight() : null
            })
        })
        sections_info.map((section, i) => {
            if (section.offset_top < 200 && -1 * section.offset_top < section.height) {
                current_section_index = i
                $("li.current").removeClass("current")
                $("#guide-list").children()[i].classList.add("current")
                return
            }
        })
        $(".section-guide-container").toggleClass("closed", true)
    })

    // this is for handling scroll clicks
    let target_index, target_position
    $("#guide-list>li").click(function() {
        target_index = $(this).index(), target_position = $(`${section_ids[target_index]}`).offset().top + $("body").scrollTop()
        $(window).width() >= 768 ? target_position - 199 : null
        $("body").animate({
            scrollTop: target_position
        }, 500)
        toggle_guide()
    }) 
}