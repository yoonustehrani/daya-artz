$(function() {
    $("img[data-src]").each(function(index, elem) {
        $(elem).attr("src", $(elem).attr("data-src"))
    })
})