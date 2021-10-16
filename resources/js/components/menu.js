$(document).ready(function() {
    let is_open, menu_el = $(".menu-container").length > 0 ? $(".menu-container") : $(".user-area-sidebar")
    function toggle_menu() {
        is_open = menu_el.hasClass("open")
        if (is_open) {
            menu_el.toggleClass("open")
            setTimeout(() => {
                menu_el.addClass("d-none")
            }, 1000);
        } else {
            menu_el.removeClass("d-none")
            setTimeout(() => {
                menu_el.toggleClass("open")
            }, 0);
        }
        $("body").toggleClass("over-h")
        $(".fa-bars").toggleClass("op-0")
    }
    $("#menu-open, #menu-close, .link").click(function() {
        toggle_menu()
    })
    $("body").on("click", function(e) {
        if (menu_el.hasClass("open") && e.target.id !== "m-menu" && e.target.id !== "menu-open" && $(e.target).closest("#menu-open").length === 0 && $(e.target).closest("#m-menu").length === 0) {
            toggle_menu()
        }
    })   
    $(".has-sub").click(function(e) {
        console.log('hey');
        $(e.target).closest(".submenu-m").length === 0 ? $(this).toggleClass("open") : null
    })
})
