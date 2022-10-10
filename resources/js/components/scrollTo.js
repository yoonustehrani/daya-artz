// scroll to quick order in home page
let quickOrderForm = $("#quick-order-container")
if (quickOrderForm.length > 0) {
    onClickBtn = () => {
        targetPosition = $(quickOrderForm).offset().top + $("body").scrollTop() - 100
        // $(window).width() >= 768 ? targetPosition -= 100 : targetPosition -= 20
        $("body").animate({
            scrollTop: targetPosition
        }, 500)
    }
    let scrollToBtns = $(".scroll-to-form")
    $(scrollToBtns).each((index, elem) => {
        $(elem).on("click", onClickBtn)
    })
}

// scroll to blog section
$(".post-main-text a[href^='#h_']").each(function(index, elem) {
    $(elem).on("click", (e) => {
        e.preventDefault()
        let targetElem = $($(elem).attr("href"))
        targetPosition = targetElem.offset().top + $("body").scrollTop() - 100
        // $(window).width() >= 768 ? targetPosition -= 100 : targetPosition -= 20
        $("body").animate({
            scrollTop: targetPosition
        }, 500)
    })
})