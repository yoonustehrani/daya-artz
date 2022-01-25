if ($(".section-guide-container").length > 0) {
    let open
    if ($(window).width() >= 768) {
        $(".section-guide-container").addClass("open")
        $(".section-guide-container .fas.fa-angle-left").toggleClass("d-none")
        open = true
    } else {
        $(".section-guide-container").addClass("close")
        $(".section-guide-container .far.fa-question-circle").toggleClass("d-none")
        open = false
    }

    $("#guide-toggler").hover(function() {
        open ? null : $(this).find("i.fa-question-circle").toggleClass("d-none")
    })

    $("#guide-toggler").blur(function() {
        open ? null : $(this).find("i.fa-question-circle").toggleClass("d-none")
    })

    const toggle_guide = () => {
        open = !open
        $(".section-guide-container").toggleClass("bounceInLeft bounceOutLeft")
        setTimeout(() => {
            $(".section-guide-container").toggleClass("close open bounceInLeft bounceOutLeft")
        }, 500)
    }

    $("#guide-toggler").click(function() {
        toggle_guide()
        setTimeout(() => {
            $("i.fas.fa-question-circle, i.fas.fa-angle-left").toggleClass('d-none')
        }, 500)
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
    })

    // this is for handling scroll clicks
    let target_index, target_position
    $("#guide-list>li").click(function() {
        target_index = $(this).index(), target_position = $(window).width() >= 768 ? $(`${section_ids[target_index]}`).offset().top + $("body").scrollTop() - 199 : $(`${section_ids[target_index]}`).offset().top + $("body").scrollTop()
        $("body").animate({
            scrollTop: target_position
        }, 500)
        toggle_guide()
        setTimeout(() => {
            $("i.far.fa-question-circle, i.fas.fa-angle-left").toggleClass('d-none')
        }, 500)
    }) 
}