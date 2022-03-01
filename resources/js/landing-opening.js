import { render } from 'react-dom'
import QuickOrder from './components/QuickOrder'

// quick order
const quickOrderElement = document.getElementById("react-quick-order")
if (quickOrderElement) {
    render(<QuickOrder reCAPTCHA_Key={quickOrderElement.getAttribute('data-recaptcha')} targetApi={quickOrderElement.getAttribute('data-post-api')}/>, quickOrderElement)
}
// menu
$(document).ready(function() {
    // this code is for handling the menu in < md sizes
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
    // this code will set the header navbar fixed according to the window height
    function setHeader() {
        var window_height = window.innerHeight, offset_top = $("body").scrollTop(), target_header = $(".header, .min-header")
        if ($(window).width() >= 768) {
            if (offset_top >= window_height && !target_header.hasClass("fixed")) {
                $(target_header).addClass("fixed")
                $("#header-nav").addClass("slideInDown")
                setTimeout(() => {
                    $("#header-nav").removeClass("slideInDown")
                }, 200);
            } else if (offset_top < window_height && target_header.hasClass("fixed")) {
                $("#header-nav").addClass("slideOutUp")
                setTimeout(() => {
                    $(target_header).removeClass("fixed")
                    $("#header-nav").removeClass("slideOutUp")
                }, 200)
            }
        } else {
            $(target_header).removeClass("fixed")
            $("#header-nav").removeClass("slideInDown slideOutUp")
        }
    }
    // we use the above code as a trigger for scroll evenets and resize window events
    $("body").on("scroll", function() {
        setHeader()
    })   
    $(window).resize(function() {
        setHeader()        
    })
})
