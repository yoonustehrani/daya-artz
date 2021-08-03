$(document).ready(function() {
    function toggle_menu() {
        $(".menu-container").toggleClass("open")
        $("body").toggleClass("over-h")
        $(".fa-bars").toggleClass("op-0")
    }
    $("#menu-open, #menu-close").click(function() {
        toggle_menu()
    })
    $("body").on("click", function(e) {
        if ($(".menu-container").hasClass("open") && e.target.id !== "m-menu" && e.target.id !== "menu-open" && $(e.target).closest("#menu-open").length === 0 && $(e.target).closest("#m-menu").length === 0) {
            toggle_menu()
        }
    })   
    $(".has-sub").click(function() {
        $(this).toggleClass("open")
    })
})