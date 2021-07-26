$(document).ready(function() {
    $("#menu-toggle").click(function() {
        $(".menu").toggleClass("open")
        $("body").toggleClass("over-h")
        $(".fa-bars, .fa-times").toggleClass("op-0")
    })
})