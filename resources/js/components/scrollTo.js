// scroll to quick order in home page
let quickOrderForm = $("#quick-order-container"),
homePageBtn = $("#scroll-to-form-btn"),
targetPosition = quickOrderForm.offset().top + $("body").scrollTop() - 50,
onClickBtn = () => {
    $("body").animate({
        scrollTop: targetPosition
    }, 500)
}
homePageBtn.on("click", onClickBtn)
$(".main-services-container, .service-groups-container").find('.scroll-to-form').each((i, elem) => {
    $(elem).on("click", onClickBtn)
})