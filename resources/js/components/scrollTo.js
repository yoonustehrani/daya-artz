// scroll to quick order in home page
let quickOrderForm = $("#quick-order-container"),
scrollToBtn = $("#scroll-to-form-btn"),
targetPosition = quickOrderForm.offset().top + $("body").scrollTop() - 50
scrollToBtn.on("click", () => {
    $("body").animate({
        scrollTop: targetPosition
    }, 500)
})