$(".tab").on("click", function() {
    let item_index = $(this).index()
    $(".tab.active").removeClass("active")
    $(".tab-content.active").removeClass("active")
    $(this).addClass("active")
    $(".tab-content").each(function(i) {
        if (item_index === i) {
            $(this).addClass("active")
        }
    })
})