if ($(".section-guide-container").length > 0) {
    let open
    if ($(window).width() >= 786) {
        $(".section-guide-container").addClass("open")
        $(".far.fa-hand-point-left").toggleClass("d-none")
        open = true
    } else {
        $(".section-guide-container").addClass("close")
        $(".far.fa-question-circle").toggleClass("d-none")
        open = false
    }

    $("#guide-toggler").hover(function() {
        open ? $(this).find("i.fa-hand-point-left").toggleClass('d-none') : $(this).find("i.fa-question-circle").toggleClass("d-none")
    })

    $("#guide-toggler").blur(function() {
        open ? $(this).find("i.fa-hand-point-left").toggleClass('d-none') : $(this).find("i.fa-question-circle").toggleClass("d-none")
    })

    const toggle_guide = () => {
        open = !open
        $(".section-guide-container").toggleClass("rotateInDownLeft rotateOutUpLeft")
        setTimeout(() => {
            $(".section-guide-container").toggleClass("close open rotateInDownLeft rotateOutUpLeft")
        }, 500)
    }

    $("#guide-toggler").click(function() {
        toggle_guide()
        setTimeout(() => {
            $("i.fas.fa-question-circle, i.fas.fa-hand-point-left").toggleClass('d-none')
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
    let target_index
    $("#guide-list>li").click(function() {
        target_index = $(this).index()
        $("body").animate({
            scrollTop: $(`${section_ids[target_index]}`).offset().top + $("body").scrollTop()
        }, 500)
        toggle_guide()
        setTimeout(() => {
            $("i.far.fa-question-circle, i.far.fa-hand-point-left").toggleClass('d-none')
        }, 500)
    }) 
}