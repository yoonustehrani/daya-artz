$(document).ready(function() {
    function toggle_menu() {
        let is_open, menu_el = $(".menu-container").length > 0 ? $(".menu-container") : $(".user-area-sidebar")
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
        // $("body").toggleClass("over-h")
        $(".fa-bars").toggleClass("op-0")
    }
    $("body").on("click", function(e) {
        let el = e.target, menu_el = $(".menu-container").length > 0 ? $(".menu-container") : $(".user-area-sidebar")
        if ((menu_el.hasClass("open") && el.id !== "m-menu" && el.id !== "menu-open" && !$(el).closest("#menu-open").length && !$(el).closest("#m-menu").length) || $(el).closest("#menu-close").length || $(el).closest("#menu-open").length || $(el).hasClass("link")) {
            toggle_menu()
        }
        if ($(el).closest(".has-sub").length && !$(el).closest(".submenu-m").length) {
            $($(el).closest("li.has-sub")).toggleClass("open")
        }
    })   
})
